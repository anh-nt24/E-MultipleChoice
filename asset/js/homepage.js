function addActiveClass(id) {
    const classesToRemove = document.querySelectorAll('.sr-only');
    classesToRemove.forEach(cls => {
        cls.remove();
    })
    const activeElement = document.querySelectorAll('li.nav-item.active')[0];
    activeElement.classList.remove('active');

    var point = document.getElementById(id);
    point.classList.add('active');
    var subChild = point.children[0];
    subChild.innerHTML += '<span class="sr-only">(current)</span>';
}

document.getElementById('homepage-tab').addEventListener('click', ()=> {
    addActiveClass('homepage-tab');
});

document.getElementById('achiev-tab').addEventListener('click', () => {
    addActiveClass('achiev-tab');
    const getHomePage = document.getElementById('homepage-tab');
    const pageChildren = getHomePage.children;
    if (pageChildren[0].tagName === "A") {
        pageChildren[0].style.borderRadius = "7px 0 0 7px";
    }
})

window.addEventListener('hashchange', () => {
    var url = window.location.href.split('#');
    if (url[url.length-1] == 'manage') {
        document.querySelector('#manage').style.display = 'block';
        document.querySelector('#homepage').style.display = 'none';
    }
    else {
        document.querySelector('#manage').style.display = 'none';
        document.querySelector('#homepage').style.display = 'block';
    }
})

const sidePanelToggler = document.getElementsByClassName('sidepanel-toggler')[0];
sidePanelToggler.addEventListener('click', function() {
    let sidePanelWidth = document.getElementsByClassName('sidepanel')[0];
    sidePanelWidth = sidePanelWidth.clientWidth;
    let sidePanelMarginLeft = document.getElementsByClassName('sidepanel')[0];
    sidePanelMarginLeft = sidePanelMarginLeft.currentStyle || window.getComputedStyle(sidePanelMarginLeft);
    sidePanelMarginLeft = parseInt(sidePanelMarginLeft.marginLeft, 10);
    let width = (sidePanelMarginLeft >= 0 ) ? sidePanelWidth * -1 : 0;
    let circleWidth = (width < 0) ? -width : sidePanelWidth - 15;
    // let circleWidth = (width < 0) ? width : sidePanelWidth + 1000;
    console.log({width, circleWidth, sidePanelWidth, sidePanelMarginLeft})
    $('.sidepanel').animate({
        marginLeft: width
    });
    $('.sidepanel .sidepanel__container').animate({
        marginLeft: width
    });
    $('.sidepanel-toggler').animate({
        marginLeft: -1,
        left:circleWidth
    },function() {
        document.querySelector('.fa-chevron-left').classList.toggle('hide');
        document.querySelector('.fa-chevron-right').classList.toggle('hide');
    });
});

document.querySelector('.quiz-create__btn').addEventListener('click', () => {
    window.location.href = '?action=create';
})



const loadHistory = () => {
    const history = document.querySelector('#homepage__history-area__slider');
    var c = document.cookie;
    if (!c.includes('history') || c.includes('history=;')) {
        let html = `
        <div class="row">
            <h5><i>You have not opened any quiz recently</i></h5>
        </div>
        `;
        history.innerHTML = html;
    }
    else {

        const history_cookies = getCookie('history');
        const renderHistory = async () => {
            let html = `
                <div class="row">
            `;
            const id = history_cookies.map(e => e[0]);
            const time = history_cookies.map(e => e[1]);

            const data = await $.ajax({
                url: 'client/model/HistoryModel.php',
                type: 'post',
                dataType: 'json',
                data: ({id})
            });
            // $quizName, $isPublic, $isVailable, $corNum, $numques
            for (let i=0;i<data[0].length; ++i) {
                const rate = Math.round(data[3][i]*100/data[4][i]);
                let class_item = 'rate-100';
                if (rate == 0) class_item = 'rate-0';
                else if (rate != 100) class_item = 'rate-99';
                html += `
                    <div onclick="review('${data[5][i]}', '${data[2][i]}')" style="cursor: pointer" class="no-link quiz-item col-xl-3 col-lg-4 col-md-4 col-sm-4 col-4">
                        <div class="zoom d-block quiz-item__card">
                            <img class="quiz-item__card__img" src="asset/img/quiz-package.png" alt="">
                            <ul class="extra-info d-flex justify-content-between quiz-item__card__list">
                                <li>${data[1][i] == 1 ? 'Public' : 'Private'}</li>
                                <li></li>
                            </ul>
                            <h6 class="quiz-item__card__name">${data[0][i]}</h6>
                            <p class="quiz-item__card__complete-rate ${class_item}"> ${rate}%</p>
                            <p class="pt-1"></p>
                        </div>
                    </div>
                `
            }
            html += `
                </div>
                <a id="loadmore">Load More</a>
            `
            history.innerHTML = html;
            slide();
            const timeElements = document.querySelectorAll('.quiz-item__card__list li:last-child');
            Array.from(timeElements).forEach((element, idx) => {
                element.innerHTML = timeSince(time[idx]);
            });
            setInterval(() => {
                Array.from(timeElements).forEach((element, idx)=> {
                    element.innerHTML = timeSince(time[idx]);
                });
            }, 60000);

        }
        renderHistory();
    }
}

loadHistory();



const rcmSys = () => {
    const kFormatter = (num) => Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + 'k' : Math.sign(num)*Math.abs(num)

    var quizItemRcm = document.querySelectorAll('.homepage__recommend-area .rcm-item');
    var qsRcm = [], takenRcm = [], timeRcm = [], diffRcm = [];
    quizItemRcm.forEach((item) => {
        qsRcm.push(parseInt(item.getAttribute('qs')));
        takenRcm.push(parseInt(item.getAttribute('taken')));
        timeRcm.push(parseInt(item.getAttribute('time')));
        diffRcm.push(item.getAttribute('diff'));
    });

    var rcmCardList = document.querySelectorAll('.rcm-item__card__list');
    rcmCardList.forEach((item, idx) => {
        item.innerHTML = `<li>${qsRcm[idx]} Qs</li><li>${kFormatter(takenRcm[idx])} taken</li>`;
    });

    quizItemRcm.forEach((item, idx) => {
        item.addEventListener('click', () => {
            const name = document.querySelectorAll('.rcm-item__card__name')[idx].textContent;

            document.querySelector('#recommend-area__modal .modal-body__quiz-name').innerHTML = name;

            $('#recommend-area__modal .modal-body__ques-num').text('Question: ' + qsRcm[idx]);

            $('#recommend-area__modal .modal-body__time').text('Time: ' + timeRcm[idx] + 'min(s)');

            const diff = $('#recommend-area__modal .modal-body__quiz-difficult .progress-bar');
            diff.attr('style', `width: ${diffRcm[idx]}%`);
            diff.text(diffRcm[idx]+'%');
        })
    });

}





$(window).resize(() => {
    slide();
});

const slide = () => {
    var screen =$(window).width();
    var slideNum = 4;
    if (screen < 1200) {
        slideNum = 3;
    }
    const slideItem = $("#homepage__history-area__slider .quiz-item");
    slideItem.hide();
    slideItem.slice(0,slideNum).show();
    $("#loadmore").on("click", function(e) {
        e.preventDefault();
        $("#homepage__history-area__slider .quiz-item:hidden").slice(0,slideNum).slideDown();
        if($("#homepage__history-area__slider .quiz-item:hidden").length == 0) {
            $("#loadmore").addClass('hide').text("Hide");
        }
        $("#loadmore.hide").on("click", function(e) {
            e.preventDefault();
            $("#homepage__history-area__slider .quiz-item").slice(slideNum).hide();
        });
    });
}


const review = (id, av) => {
    if (av == 'Available') {
        window.location.href = `?action=review&id=${window.btoa(id)}`;
    }
    else {
        alert('This quiz is not available!');
    }
}

const redo = (id) => {
    window.location.replace(`?action=quiz&token=${id}`);
}



// LOAD LIBRARY
const library = document.querySelector('ul.library__content');
const library_cookies = getCookie('library');

const renderLibrary = async () => {
    let html = '';
    for (const e of library_cookies) {
        const id = e[0];
        const data = await $.ajax({
            url: 'client/model/LibraryModel.php',
            type: 'post',
            dataType: 'json',
            data: ({id})
        });
        if (data[0] == null) {
            continue;
        }
        const name = data[0];
        const duration = data[1];
        const level = data[2];
        html += `
                <li>
                    <a href="?action=quiz&token=${window.btoa(id)}">
                        <img src="asset/img/lib.png" alt="">
                        <div class="library__content__info zoom">
                            <span class="quiz-name">${name}</span>
                            <br>
                            <ul class="d-flex justify-content-between nopadding extra-info">
                                <li>
                                    <span class="quiz-time">Duration: ${duration}</span>
                                </li>
                                <li>
                                    <span class="quiz-level">Difficulty: ${level}</span>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>
        `;
    }
    library.innerHTML = html;
}

renderLibrary();


const viewdetails = (id) => {
    window.location.href = `?action=udtq&id=${window.btoa(id)}`;
}

const deleteQuiz = (id) => {
    if (confirm("Do you really want to delete this quiz?")) {
        $.ajax({
            url: 'client/model/Delete.php',
            type: 'post',
            dataType: 'json',
            data: ({id}),
            success: (status) => {
                if (status == 200) {
                    alert('Deleted');
                    window.location.reload();
                }
            }
        })
    }
}

const url = window.location.href.split('#');
if (url[url.length-1] == 'manage') {
    document.querySelector('#manage').style.display = 'block';
    document.querySelector('#homepage').style.display = 'none';
}
else {
    document.querySelector('#manage').style.display = 'none';
    document.querySelector('#homepage').style.display = 'block';
}