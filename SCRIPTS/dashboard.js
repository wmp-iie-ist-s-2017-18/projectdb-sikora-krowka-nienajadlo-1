$(document).ready(function () {

    // first login --- must fill empty fields
    if ($("#firstName").val() === "" || $("lastName").val() === "" || $("position").val() || $("number").val() === "") {

        if ($("#firstName").val() === "") $("#firstName").css("box-shadow", " 0px 0px 5px 0px rgba(255,0,0,0.86)");
        if ($("#lastName").val() === "") $("#lastName").css("box-shadow", " 0px 0px 5px 0px rgba(255,0,0,0.86)");
        if ($("#position").val() === "") $("#position").css("box-shadow", " 0px 0px 5px 0px rgba(255,0,0,0.86)");
        if ($("#number").val() === "") $("#number").css("box-shadow", " 0px 0px 5px 0px rgba(255,0,0,0.86)");
        $("#dashboardSettingsNav").click();
        $("#dashboardHomeNav").add("#dashboardProjectsNav").add("#dashboardTeamNav").add("#adminSQL").hide();
    }


    // logout
    $("#signOut").click(function () {
        $(location).attr('href', '../PHP/session_destroy.php');
        alert("Signed out!");
    });

    //  GET cleaning after refreshing
    if (performance.navigation.type == 1) {
        window.location.href = "dashboard.php?main";
    }

    // GET methods
    $("#dashboardHomeNav").click(function () {
        window.history.pushState("", "", '?main');
    });
    // GET methods
    $("#dashboardProjectsNav").click(function () {
        window.history.pushState("", "", '?projects');
    });
    // GET methods
    $("#dashboardSQLNav").click(function () {
        window.history.pushState("", "", '?SQLpanel');
    });
    // GET methods
    $("#dashboardSettingsNav").click(function () {
        window.history.pushState("", "", '?settings');
    });
    // GET methods
    $("#dashboardTeamNav").click(function () {
        window.history.pushState("", "", '?team');
    });
    $("#signOut").click(function () {
        window.history.pushState("", "", '?signed_out');
    });

});