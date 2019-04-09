<?php

    $email = $_POST['resetEmail'];
    $reset_code = rand(1000000000, 9999999999);
    session_start();
    $_SESSION['reset_code'] = $reset_code;

    // email gateway
    $subject = "Password reset code.";
    $messages= "Your password reset code: $reset_code";

    if( mail($email, $subject, $messages) ) {
        header("Location:../index.php?reset=1");
    } else {
        header("Location:../index.php?reset=0");
    }

?>