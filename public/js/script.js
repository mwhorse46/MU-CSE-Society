//function for opening side menu
function openSideBar() {
    document.getElementById("Side-bar").style.width = "300px";
}

//function for closing side menu
function closeSideBar() {
    document.getElementById("Side-bar").style.width = "0%";
}

//changing background opacity of top menu bar
[red, green, blue] = [33, 40, 61];
navBar = document.getElementById("Nav-bar");
window.addEventListener('scroll', () => {
    hh = document.documentElement.clientHeight;
    bb = h * 0.3;
    nav = h * 0.11;
    p = Math.min(1.0, (window.scrollY || window.pageYOffset) / (bb-nav));
    [r, g, b, o] = [red, green, blue, p];
    navBar.style.background = `rgba(${r}, ${g}, ${b}, ${o})`;
});

//calculating screen height and nav bar height
h = document.documentElement.clientHeight;
nav = h * 0.11;
//changing scroll position on clicking menu
$('.abt').click(function(e){
    e.preventDefault();
    var p = $('#About').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.nws').click(function(e){
    e.preventDefault();
    var p = $('#News').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.evnt').click(function(e){
    e.preventDefault();
    var p = $('#Events').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.glry').click(function(e){
    e.preventDefault();
    var p = $('#Gallery').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.cmte').click(function(e){
    e.preventDefault();
    var p = $('#Committee').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.cntct').click(function(e){
    e.preventDefault();
    var p = $('#Contact').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
