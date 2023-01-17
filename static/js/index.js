function isQueried(selector, all = false) {
    return all ? document.querySelectorAll(selector) : document.querySelector(selector);
}

const sections = isQueried('.time-line-container', true);
const timeline = isQueried('.timeline');
const line = isQueried('.drawn-line');
const defaultLine = isQueried('.default-line');
let prevScrollY = window.scrollY;
let up, down;
let full = false;
let empty = false;
let point = 0;
const targetY = window.innerHeight * 0.8;

//  SCROLLING
window.onscroll = function() {
    // for scroll bar
    var hasScrolled = document.body.scrollTop || document.documentElement.scrollTop;
    var pageHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrollingRatio = (hasScrolled / pageHeight) * 100;
    document.getElementById("scrollBar").style.width = scrollingRatio + "%";

    // for timeline scrolling
    const {scrollY} = window;
    up = scrollY < prevScrollY;
    down = !up;
    const timelineRect = timeline.getBoundingClientRect();
    const dist = targetY - timelineRect.top;

    if (down && !full || down && empty) {
        point = Math.max(point, dist);
        line.style.bottom = `calc(100% - ${point}px)`;
        empty = false;
    }
    else if (up && !empty || up && full) {
        point = Math.min(point, dist);
        line.style.bottom = `calc(100% - ${point}px)`;
        full = false;
    }

    if ((dist > timeline.offsetHeigpointht || dist > 750) && !full) {
        full = true;
        line.style.bottom = '0px';
    }
    else if (dist < 50 && !empty) {
        empty = true;
    }
    prevScrollY = window.scrollY;
};


// APPEARANCE ANIMATION
const observer = new IntersectionObserver((e) => {
    e.forEach((i) => {
        i.target.classList.toggle('show-ani', i.isIntersecting);
    });
})

const hidden = document.querySelectorAll('.hidden');
hidden.forEach((i)=> {
    observer.observe(i);
    var lastScrollTop = 0;
    window.addEventListener("scroll", function(){
        var st = window.pageYOffset || document.documentElement.scrollTop;
        if (st < lastScrollTop){
            if (i.classList.contains('show-ani') &&i.classList.contains('hidden') ) {
                i.classList.remove('hidden');
            }
        }
        else {
            i.classList.add('hidden');
        }
        lastScrollTop = st <= 0 ? 0 : st; // for Mobile or negative scrolling
    }, false);
});


// CLICK TO MOVE TO PAGE SECTIONS
function clickToMove(sectionID, dest) {
    $(sectionID).click(function() {
        $('html, body').animate({
            scrollTop: $(dest).offset().top - 60
        }, 700);

    });
}

clickToMove("#contact-src", "#contact");
clickToMove("#feature-src", "#features");
clickToMove("#intro-src", "#introduction");


// ADD ELEMENT
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

$(window).bind('scroll', function() {
    if($(window).scrollTop() >= $('#introduction').offset().top - 70) {
        addActiveClass('intro-src');
    }

    if($(window).scrollTop() >= $('#features').offset().top - 70) {
        addActiveClass('feature-src');
    }

    if($(window).scrollTop() >= $('#contact').offset().top - 70) {
        addActiveClass('contact-src');
    }
});


// SHOW PASSWORD OR NOT
function showPassFunc(id) {
    const showPassword = document.querySelector(id);
    const demoShowPassword = document.querySelectorAll('.demo-show-password');
    showPassword.onclick = () => {
        if (showPassword.checked) {
            demoShowPassword.forEach((d) => {
                d.style.backgroundImage = 'url("./resource/img/show-password.webp")';
                d.type = 'text';
            })
        }
        else {
            demoShowPassword.forEach((d) => {
                d.style.backgroundImage = 'url("./resource/img/hide-password.webp")';
                d.type = 'password';
            })
        }
    }
}

showPassFunc('#show-password-in');
showPassFunc('#show-password-up');

function openFormReset(id) {
    signInBtn = document.querySelector(id);
    const key = id.split('-')[1];
    signInBtn.addEventListener('click',function() {
        const demoShowPassword = document.querySelectorAll('.demo-show-password');
        demoShowPassword.forEach((d) => {
            d.style.backgroundImage = 'url("./resource/img/hide-password.webp")';
            d.type = 'password';
        })
        const showPassword = document.querySelector('#show-password-'+key);
        showPassword.checked = false;
    })
}

openFormReset('.sign-in');
openFormReset('.sign-up');


// SWITCH BETWEEN SIGN IN AND SIGN UP
const signUp = document.querySelector("#switch-to-sign-up");
signUp.addEventListener('click', function() {
    const btn = document.getElementsByClassName('sign-form-close');
    btn[0].click();
})

const signIn = document.querySelector("#switch-to-sign-in");
signIn.addEventListener('click', function() {
    const btn = document.getElementsByClassName('sign-form-close');
    btn[1].click();
})