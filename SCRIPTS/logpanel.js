$(document).ready(function () {

    // regular expression to email checker
    const emailReg = /^[a-z\d]+[\w\d.-]*@(?:[a-z\d]+[a-z\d-]+\.){1,5}[a-z]{2,6}$/i;

    // This code is for checking strength of passwords

    $('#logRegPassword').keyup(function (e) {
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");
        if (false == enoughRegex.test($(this).val())) {
            $('#logRegPasswordText').html('More Characters').css("color", "blue");
        } else if (strongRegex.test($(this).val())) {
            $('#logRegPasswordText').className = 'ok';
            $('#logRegPasswordText').html('Strong!').css("color", "Green");
        } else if (mediumRegex.test($(this).val())) {
            $('#logRegPasswordText').className = 'alert';
            $('#logRegPasswordText').html('Medium!').css("color", "orange");
        } else {
            $('#logRegPasswordText').className = 'error';
            $('#logRegPasswordText').html('Weak!').css("color", "red");
        }
        return true;
    });

    // register panel repeat password checker
    $('#logRegRepeat').keyup(function (e) {
        if ($("#logRegRepeat").val() == $("#logRegPassword").val()) {
            $("#logRegRepeatText").html("Repeated password is correct!").css("color", "Green");
        } else {
            $("#logRegRepeatText").html("Repeated password is incorrect!").css("color", "Red");
        }
    });


    // register panel format checker
    $('#logRegLogin').keyup(function (e) {
        if ($("#logRegLogin").val().length < 6) {
            $("#logRegLoginText").html("Login must be longer!").css("color", "red");
        } else {
            $("#logRegLoginText").html("Correct login format").css("color", "green");
        }
    });

    // function to check email adress format
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

    // register panel - email checker
    $('#logRegEmail').focusout(function (e) {
        if (!validateEmail($("#logRegEmail").val())) {
            $("#logRegEmailText").html("Wrong email adress!").css("color", "red");
        } else if (validateEmail($("#logRegEmail").val())) {
            $("#logRegEmailText").html("Correct email format.").css("color", "green");
        }
    });


    // login panel - email checker
    $('#logEmail').focusout(function (e) {
        if (!validateEmail($("#logEmail").val())) {
            $("#logEmailText").html("Wrong email adress!").css("color", "red");
        } else if (validateEmail($("#logEmail").val())) {
            $("#logEmailText").html(" ");
        }
    });


});