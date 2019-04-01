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
    p = Math.min(1.0, (window.scrollY || window.pageYOffset) / (bb - nav));
    [r, g, b, o] = [red, green, blue, p];
    navBar.style.background = `rgba(${r}, ${g}, ${b}, ${o})`;
});

//calculating screen height and nav bar height
h = document.documentElement.clientHeight;
nav = h * 0.11;
//changing scroll position on clicking menu
$('.home').click(function (e) {
    e.preventDefault();
    var p = $('#Home').offset();
    $('body, html').animate({ 'scrollTop': p.top }, 250);
});
$('.abt').click(function (e) {
    e.preventDefault();
    var p = $('#About').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.nws').click(function (e) {
    e.preventDefault();
    var p = $('#News').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.evnt').click(function (e) {
    e.preventDefault();
    var p = $('#Events').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.glry').click(function (e) {
    e.preventDefault();
    var p = $('#Gallery').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.cmte').click(function (e) {
    e.preventDefault();
    var p = $('#Committee').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});
$('.cntct').click(function (e) {
    e.preventDefault();
    var p = $('#Contact').offset();
    $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
});


//function for opening pop-up Role form
function openRoleAddForm() {
    document.getElementById("ROLE").value = "";
    document.getElementById("RANK").value = "";
    document.getElementById("BtnAdd").value = "Add";
    document.roleForm.action = "/admin/insertRole";
    document.getElementById("RoleForm").style.display = "block";
}

//function for opening pop-up Role form
function openRoleEditForm(id, role, rank) {
    document.getElementById("ID").value = id;
    document.getElementById("ROLE").value = role;
    document.getElementById("RANK").value = rank;
    document.getElementById("BtnAdd").value = "Update";
    document.roleForm.action = "/admin/updateRole";
    document.getElementById("RoleForm").style.display = "block";
}

//function for opening pop-up Role form
function closeRoleForm() {
    document.getElementById("RoleForm").style.display = "none";
}

//collapsible function
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}

//drop down rotation
function toggle() {
    var upClass = 'rotate-up';
    var downClass = 'rotate-down';
    var toggle = document.querySelector('.toggle');

    if (~toggle.className.indexOf(downClass)) {
        toggle.className = toggle.className.replace(downClass, upClass);
    } else {
        toggle.className = toggle.className.replace(upClass, downClass);
    }
}
