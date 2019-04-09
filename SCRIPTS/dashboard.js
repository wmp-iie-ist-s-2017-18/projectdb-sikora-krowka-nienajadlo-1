$(document).ready(function () {

    // first login --- must fill empty fields
    if ($("#firstName").val() === "" || $("lastName").val() === "" || $("position").val() || $("number").val() === "") {

        if ($("#firstName").val() === "") $("#firstName").css("box-shadow", " 0px 0px 5px 0px rgba(255,0,0,0.86)");
        if ($("#lastName").val() === "") $("#lastName").css("box-shadow", " 0px 0px 5px 0px rgba(255,0,0,0.86)");
        if ($("#position").val() === "") $("#position").css("box-shadow", " 0px 0px 5px 0px rgba(255,0,0,0.86)");
        if ($("#number").val() === "") $("#number").css("box-shadow", " 0px 0px 5px 0px rgba(255,0,0,0.86)");
        if ($("#pesel").val() === "") $("#pesel").css("box-shadow", " 0px 0px 5px 0px rgba(255,0,0,0.86)");

        $("#dashboardSettingsNav").click();
        $("#dashboardHomeNav").add("#dashboardProjectsNav").add("#dashboardTeamNav").add("#adminSQL").hide();
    }


    // logout
    $("#signOut").click(function () {
        $(location).attr('href', '../PHP/session_destroy.php');
        alert("Signed out!");
    });

});