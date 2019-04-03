<?php

include 'connection.php';

// form variables initialization and declaration
    $log_email = $_POST["logEmail"];
    $log_password = $_POST["logPassword"];

// try to connect with database
try {
    $dbh = new PDO('mysql:host=localhost;dbname=projectmanager', $db_user, $db_password);
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
        $logIn = $dbh->prepare("SELECT * FROM Employee WHERE email = :log_email AND password = :log_password");
        $logIn->bindParam(':log_email', $log_email);
        $logIn->bindParam(':log_password', $log_password);
        $logIn->execute();
        print("<br> Query executed!");
        header("Location: dashboard.php");
    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}

?>