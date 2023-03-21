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
    console.log(url)
    if (url[url.length-1] == 'achievements') {
        document.querySelector('#achievements').style.display = 'block';
        document.querySelector('#homepage').style.display = 'none';
    }
    else {
        document.querySelector('#achievements').style.display = 'none';
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
    window.location.href = '../QuizCreate/index.html';
})

var carouselWidth = $('.carousel-inner')[0].scrollWidth;
var cardWidth = $('.carousel-item').width();
var scrollPos = 0;

function slideNext(id) {
    scrollPos = (scrollPos < carouselWidth-cardWidth*4 - 70) ? scrollPos + cardWidth + 15: 0;
    $(`#${id} .carousel-inner`).animate({scrollLeft: scrollPos}, 600);
};

function slidePrev(id) {
    scrollPos = (scrollPos > 0 ) ? scrollPos - cardWidth - 15 : carouselWidth-cardWidth*4-70;
    $(`#${id} .carousel-inner`).animate({scrollLeft: scrollPos}, 600);
}

$('#homepage__history-area__slider .carousel-control-next').on('click', () => {
    slideNext('homepage__history-area__slider');
});

$('#homepage__history-area__slider .carousel-control-prev').on('click', () => {
    slidePrev('homepage__history-area__slider');
});

$('#homepage__recommend-area__slider .carousel-control-next').on('click', () => {
    slideNext('homepage__recommend-area__slider');
});

$('#homepage__recommend-area__slider .carousel-control-prev').on('click', () => {
    slidePrev('homepage__recommend-area__slider');
})

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



var quizItemHist = document.querySelectorAll('.homepage__history-area .quiz-item');
var qsHist = [], stateHist = [], timeHist = [], inTime = [], corHist = [];
quizItemHist.forEach((item) => {
    qsHist.push(parseInt(item.getAttribute('qs')));
    stateHist.push(item.getAttribute('taken'));
    timeHist.push(parseInt(item.getAttribute('time')));
    inTime.push(parseInt(item.getAttribute('intime')));
    corHist.push(parseInt(item.getAttribute('cor')));
});

var histCardList = document.querySelectorAll('.quiz-item__card__list');
histCardList.forEach((item, idx) => {
    item.innerHTML = `<li>${qsHist[idx]} Qs</li><li>${stateHist[idx]}</li>`;
});

quizItemHist.forEach((item, idx) => {
    item.addEventListener('click', () => {
        const name = document.querySelectorAll('.quiz-item__card__name')[idx].textContent;

        document.querySelector('#history-area__modal .modal-body__quiz-name').innerHTML = name;

        const corElement = $('#history-area__modal .modal-body__correct-num .progress-bar');
        corElement.attr('style', `width: ${corHist[idx]*100/qsHist[idx]}%`);
        corElement.text(corHist[idx] + '/' + qsHist[idx]);

        const inCorElement = $('#history-area__modal .modal-body__incorrect-num .progress-bar');
        inCorElement.attr('style', `width: ${(qsHist[idx]-corHist[idx])*100/qsHist[idx]}%`);
        inCorElement.text((qsHist[idx]-corHist[idx]) + '/' + qsHist[idx]);

        const timeQuiz = $('#history-area__modal .modal-body__quiz-time .progress-bar');
        timeQuiz.attr('style', `width: ${(inTime[idx])*100/timeHist[idx]}%`);
        timeQuiz.text(inTime[idx] + '/' + timeHist[idx] + ' min(s)');
    })
});


var quizCardHist = document.querySelectorAll('.homepage__history-area .quiz-item__card__list');
quizCardHist.forEach((item, idx) => {
    item.innerHTML = `<li>${qsHist[idx]} Qs</li><li>${stateHist[idx]}</li>`;
});

const completeRate = document.querySelectorAll('.quiz-item__card__complete-rate');
completeRate.forEach((item, idx) => {
    const rate = corHist[idx]*100/qsHist[idx];
    item.innerHTML = Math.round(rate*100)/100 + '%';
    if (rate == 100) item.classList.add('rate-100');
    else if (rate == 0) item.classList.add('rate-0');
    else item.classList.add('rate-99');
});

var slideNum = 4;
$(window).resize(() => {
    var screen =$(window).width();
    if (screen < 1200) {
        slideNum = 3;
    }
    else {
        slideNum = 4;
    }
    slide()
});

const slide = () => {
    const slideItem = $("#homepage__history-area__slider .quiz-item")
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
