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

const sidePanelToggler = document.getElementsByClassName('sidepanel-toggler')[0];
sidePanelToggler.addEventListener('click', function() {
    let sidePanelWidth = document.getElementsByClassName('sidepanel')[0];
    sidePanelWidth = sidePanelWidth.clientWidth;
    let sidePanelMarginLeft = document.getElementsByClassName('sidepanel')[0];
    sidePanelMarginLeft = sidePanelMarginLeft.currentStyle || window.getComputedStyle(sidePanelMarginLeft);
    sidePanelMarginLeft = parseInt(sidePanelMarginLeft.marginLeft, 10);
    let width = (sidePanelMarginLeft >= 0 ) ? sidePanelWidth * -1 : 0;
    let circleWidth = (width < 0) ? -width : sidePanelWidth - 15;
    console.log({width, circleWidth, sidePanelWidth, sidePanelMarginLeft})
    $('.sidepanel').animate({
        marginLeft: width
    });
    $('.sidepanel .sidepanel__container').animate({
        marginLeft: width
    });
    $('.sidepanel-toggler').animate({
        left:circleWidth
    },function() {
        document.querySelector('.fa-chevron-left').classList.toggle('hide');
        document.querySelector('.fa-chevron-right').classList.toggle('hide');
    });
  });

const xx = document.getElementsByClassName('sidepanel')[0];
const xxx = document.getElementById('page-container');
console.log(xx.clientHeight, xxx.clientHeight);