//  SCROLL BAR
window.onscroll = function() {
    var scrolling = document.body.scrollTop || document.documentElement.scrollTop;
    var getHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (scrolling / getHeight) * 100;
    document.getElementById("myBar").style.width = scrolled + "%";
};