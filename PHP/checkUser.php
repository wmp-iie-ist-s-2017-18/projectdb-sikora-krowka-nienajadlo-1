<?php

    include 'connection.php';
    session_start();
    $connection_status = false;

    // try to connect with database
    try {
        $dbh = new PDO($db_dsn, $db_username, $db_password);
        $connection_status = true;
        print("Connection estabilished");
    } 

    // exception
    catch (PDOException $e) {
        print("Error!: " . $e->getMessage() . "<br/>");
        $connection_status = false;
        die();
    }

    if($connection_status){
        try{
            // database prepared statements
            $check = $dbh->prepare("SELECT * FROM employee WHERE email = :log_email;");
            $check->bindParam(':log_email', $_SESSION['email']);
            $check->execute();
            print("<br> Query executed!");

            $result = $check->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);

            $_SESSION['id'] = $result[0];
            $_SESSION['fname'] = $result[1];
            $_SESSION['lname'] = $result[2];
            $_SESSION['login'] = $result[3];
            $_SESSION['email'] = $result[4];
            $_SESSION['position'] = $result[6];
            $_SESSION['number'] = $result[9];

            header("Location: ../SUBPAGES/dashboard.php?success=1");
        }
        catch(PDOException $e){
            print("Can't execute this query!");
        }
    }

?>