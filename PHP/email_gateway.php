<?php

  session_start();
  $code = $_SESSION['token'];
  $email = $_SESSION['email'];
  $subject = "Activation code.";
  $messages= "Hello! Your account was succesfully created. Here is your activation code: $code";

  if( mail($email, $subject, $messages) ) {
    echo "Success!";
  } else {
    echo "Something is wrong!";
  }

?>