//function for opening side menu
function openSideBar() {
    document.getElementById("Side-bar").style.width = "300px";
}

//function for closing side menu
function closeSideBar() {
    document.getElementById("Side-bar").style.width = "0%";
}

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


//function for opening pop-up Role Add form
function openRoleAddForm() {
    document.getElementById("ROLE").value = "";
    document.getElementById("RANK").value = "";
    document.getElementById("BtnAdd").value = "Add";
    document.roleForm.action = "/admin/insertRole";
    document.getElementById("Popup-Overlay").style.visibility = "visible";
    document.getElementById("Popup-Overlay").style.opacity = 1;
    document.getElementById("RoleForm").style.display = "block";
}

//function for opening pop-up Role Edit form
function openRoleEditForm(id, role, rank) {
    document.getElementById("ID").value = id;
    document.getElementById("ROLE").value = role;
    document.getElementById("RANK").value = rank;
    document.getElementById("BtnAdd").value = "Update";
    document.roleForm.action = "/admin/updateRole";
    document.getElementById("Popup-Overlay").style.visibility = "visible";
    document.getElementById("Popup-Overlay").style.opacity = 1;
    document.getElementById("RoleForm").style.display = "block";
}

//function for closing pop-up Role form
function closeRoleForm() {
    document.getElementById("Popup-Overlay").style.opacity = 0;
    document.getElementById("Popup-Overlay").style.visibility = "hidden";
    document.getElementById("RoleForm").style.display = "none";
}

//function for opening pop-up Album Add form
function openAlbumAddForm() {
    document.getElementById("albumName").value = "";
    document.getElementById("BtnAdd").value = "Create";
    document.albumForm.action = "/admin/insertAlbum";
    document.getElementById("Popup-Overlay").style.visibility = "visible";
    document.getElementById("Popup-Overlay").style.opacity = 1;
    document.getElementById("AlbumForm").style.display = "block";
}

//function for opening pop-up Album Edit form
function openAlbumEditForm(id, name) {
    document.getElementById("ID").value = id;
    document.getElementById("albumName").value = name;
    document.getElementById("BtnAdd").value = "Update";
    document.albumForm.action = "/admin/updateAlbum";
    document.getElementById("Popup-Overlay").style.visibility = "visible";
    document.getElementById("Popup-Overlay").style.opacity = 1;
    document.getElementById("AlbumForm").style.display = "block";
}

//function for closing pop-up Album form
function closeAlbumForm() {
    document.getElementById("Popup-Overlay").style.opacity = 0;
    document.getElementById("Popup-Overlay").style.visibility = "hidden";
    document.getElementById("AlbumForm").style.display = "none";
}

//function for opening pop-up Photos Add form
function openPhotoAddForm() {
    document.getElementById("Image").value = "";
    document.getElementById("Caption").value = "";
    document.getElementById("BtnAdd").value = "Save";
    document.photosForm.action = "/admin/gallery/insertPhoto";
    document.getElementById("Popup-Overlay").style.visibility = "visible";
    document.getElementById("Popup-Overlay").style.opacity = 1;
    document.getElementById("PhotosForm").style.display = "block";
}

//function for opening pop-up Photos Edit form
function openPhotoEditForm(id, caption) {
    document.getElementById("IDC").value = id;
    document.getElementById("CaptionC").value = caption;
    document.photosFormC.action = "/admin/gallery/updatePhoto";
    document.getElementById("Popup-OverlayC").style.visibility = "visible";
    document.getElementById("Popup-OverlayC").style.opacity = 1;
    document.getElementById("PhotosFormC").style.display = "block";
}

//function for closing pop-up Photos form
function closePhotosForm() {
    document.getElementById("Popup-Overlay").style.opacity = 0;
    document.getElementById("Popup-Overlay").style.visibility = "hidden";
    document.getElementById("PhotosForm").style.display = "none";
}

//function for closing pop-up Photos Caption form
function closePhotosFormC() {
    document.getElementById("Popup-OverlayC").style.opacity = 0;
    document.getElementById("Popup-OverlayC").style.visibility = "hidden";
    document.getElementById("PhotosFormC").style.display = "none";
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

//show or hide members according to selected period
$(document).ready(function () {
    $(".column-member").hide();
    $(".2019").show();

    //listen to dropdown for change
    $("#Period-Select").change(function () {
        $(".column-member").hide();
        $('.' + $(this).val()).show();
    });
});