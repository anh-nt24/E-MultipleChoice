// function setCookie(cname, cvalue, exdays) {
//     const d = new Date();
//     d.setTime(d.getTime() + (exdays*24*60*60*1000));
//     let expires = "expires="+ d.toUTCString();
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
// }

// // Delete cookie
// function deleteCookie(cname) {
//     const d = new Date();
//     d.setTime(d.getTime() + (24*60*60*1000));
//     let expires = "expires="+ d.toUTCString();
//     document.cookie = cname + "=;" + expires + ";path=/";
// }

// // Read cookie
// function getCookie(cname) {
//     let name = cname + "=";
//     let decodedCookie = decodeURIComponent(document.cookie);
//     let ca = decodedCookie.split(';');
//     for(let i = 0; i <ca.length; i++) {
//         let c = ca[i];
//         while (c.charAt(0) == ' ') {
//             c = c.substring(1);
//         }
//         if (c.indexOf(name) == 0) {
//             return c.substring(name.length, c.length);
//         }
//     }
//     return "";
// }

// function acceptCookieConsent(){
//     deleteCookie('user_cookie_consent');
//     setCookie('user_cookie_consent', 1, 30);
//     document.getElementById("cookieNotice").style.display = "none";
// }

// let cookie_consent = getCookie("user_cookie_consent");
// if(cookie_consent != ""){
//     document.getElementById("cookieNotice").style.display = "none";
// }else{
//     document.getElementById("cookieNotice").style.display = "block";
// }




$(document).ready(() => {
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
        console.log('href changed');
        if (url[url.length-1] == 'achievements') {
            document.querySelector('#achievements').style.display = 'block';
            document.querySelector('#homepage').style.display = 'none';
        }
        else if (url[url.length-1] == 'homepage') {
            document.querySelector('#achievements').style.display = 'none';
            document.querySelector('#homepage').style.display = 'block';
        }
    });

    const sidePanelToggler = document.querySelector('.sidepanel-toggler');
    sidePanelToggler.addEventListener('click', function() {
        let sidePanelWidth = document.getElementsByClassName('sidepanel')[0];
        sidePanelWidth = sidePanelWidth.clientWidth;
        let sidePanelMarginLeft = document.getElementsByClassName('sidepanel')[0];
        sidePanelMarginLeft = sidePanelMarginLeft.currentStyle || window.getComputedStyle(sidePanelMarginLeft);
        sidePanelMarginLeft = parseInt(sidePanelMarginLeft.marginLeft, 10);
        let width = (sidePanelMarginLeft >= 0 ) ? sidePanelWidth * -1 : 0;
        let circleWidth = (width < 0) ? -width : sidePanelWidth - 15;
        // let circleWidth = (width < 0) ? width : sidePanelWidth + 1000;
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
        window.location.replace('App.php?action=create');
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
    
    var quizItem = document.querySelectorAll('.quiz-item');
    var qs = [], correct = [], taken = [], time = [], inTime = [];
    quizItem.forEach((item) => {
        qs.push(parseInt(item.getAttribute('qs')));
        correct.push(parseInt(item.getAttribute('cor')));
        taken.push(parseInt(item.getAttribute('taken')));
        time.push(parseInt(item.getAttribute('time')));
        inTime.push(parseFloat(item.getAttribute('intime')));
    });
    
    var quizCardList = document.querySelectorAll('.quiz-item__card__list');
    quizCardList.forEach((item, idx) => {
        item.innerHTML = `<li>${qs[idx]} Qs</li><li>${kFormatter(taken[idx])} taken</li>`;
    });
    
    const completeRate = document.querySelectorAll('.quiz-item__card__complete-rate');
    completeRate.forEach((item, idx) => {
        const rate = correct[idx]*100/qs[idx];
        item.innerHTML = Math.round(rate*100)/100 + '%';
        if (rate == 100) item.classList.add('rate-100');
        else if (rate == 0) item.classList.add('rate-0');
        else item.classList.add('rate-99');
    });
    
    quizItem.forEach((item, idx) => {
        item.addEventListener('click', () => {
            const name = document.querySelectorAll('.quiz-item__card__name')[idx].textContent;
    
            document.querySelector('#history-area__modal .modal-body__quiz-name').innerHTML = name;
    
            const corElement = $('#history-area__modal .modal-body__correct-num .progress-bar');
            corElement.attr('style', `width: ${correct[idx]*100/qs[idx]}%`);
            corElement.text(correct[idx] + '/' + qs[idx]);
    
            const inCorElement = $('#history-area__modal .modal-body__incorrect-num .progress-bar');
            inCorElement.attr('style', `width: ${(qs[idx]-correct[idx])*100/qs[idx]}%`);
            inCorElement.text((qs[idx]-correct[idx]) + '/' + qs[idx]);
    
            const timeQuiz = $('#history-area__modal .modal-body__quiz-time .progress-bar');
            timeQuiz.attr('style', `width: ${(inTime[idx])*100/time[idx]}%`);
            timeQuiz.text(inTime[idx] + '/' + time[idx] + ' min(s)');
        })
    })
    
    var rcmItem = document.querySelectorAll('.rcm-item');
    var qs2 = [], taken2 = [], time2 = [], difficult = [];
    rcmItem.forEach((item) => {
        qs2.push(parseInt(item.getAttribute('qs')));
        taken2.push(parseInt(item.getAttribute('taken')));
        time2.push(parseInt(item.getAttribute('time')));
        difficult.push(item.getAttribute('diff'));
    });
    
    var rcmCardList = document.querySelectorAll('.rcm-item__card__list');
    rcmCardList.forEach((item, idx) => {
        item.innerHTML = `<li>${qs2[idx]} Qs</li><li>${kFormatter(taken2[idx])} taken</li>`;
    });
    
    rcmItem.forEach((item, idx) => {
        item.addEventListener('click', () => {
            const name = document.querySelectorAll('.rcm-item__card__name')[idx].textContent;
    
            document.querySelector('#recommend-area__modal .modal-body__quiz-name').innerHTML = name;
    
            $('#recommend-area__modal .modal-body__ques-num').text('Question: ' + qs2[idx]);
    
            $('#recommend-area__modal .modal-body__time').text('Time: ' + time2[idx] + 'min(s)');
    
            let level = 30;
            if (difficult[idx] == 'medium') level = 60;
            else if (difficult[idx] == 'difficult') level = 100; 
            const diff = $('#recommend-area__modal .modal-body__quiz-difficult .progress-bar');
            diff.attr('style', `width: ${level}%`);
            diff.text(difficult[idx]);
        })
    })
    
});



