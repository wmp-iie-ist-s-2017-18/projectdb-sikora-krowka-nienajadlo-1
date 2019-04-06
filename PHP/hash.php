<?php

    $password = "alaj10";
    $password2 = 'lola01'

    $hash = password_hash($password, PASSWORD_BCRYPT);

    print($hash);

    if(password_verify($password, $hash)){
        print('success');
    }

?>