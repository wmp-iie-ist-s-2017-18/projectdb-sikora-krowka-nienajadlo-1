$(document).ready(function () {
    $("#signOut").click(function () {
        $(location).attr('href', '../index.php');
        alert("Signed out!");
    });
});