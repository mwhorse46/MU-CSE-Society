//changing background opacity of top menu bar
[red, green, blue] = [33, 40, 61];
navBar = document.getElementById("Nav-bar");
window.addEventListener('scroll', () => {
    hh = document.documentElement.clientHeight;
    bb = h * 0.3;
    nav = h * 0.11;
    p = Math.min(1.0, (window.scrollY || window.pageYOffset) / (bb - nav));
    [r, g, b, o] = [red, green, blue, p];
    navBar.style.background = `rgba(${r}, ${g}, ${b}, ${o})`;
});