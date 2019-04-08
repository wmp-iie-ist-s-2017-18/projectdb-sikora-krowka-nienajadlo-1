<?php
    session_start();
    include 'connection.php';

    // form variables initialization and declaration
    $email = $_SESSION["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $position = $_POST["position"];
    $tnumber = $_POST["number"];


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
            $update = $dbh->prepare("UPDATE `employee` SET `first_Name`=:fname, `last_Name`=:lname,
              `position`=:position, `tel_number`=:tnumber WHERE email=:email");
            $update->bindParam(':lname', $lname);
            $update->bindParam(':fname', $fname);
            $update->bindParam(':position', $position);
            $update->bindParam(':tnumber', $tnumber);
            $update->bindParam(':email', $email);
            $update->execute();
            print("<br> Query executed!");
            header("Location:../SUBPAGES/dashboard.php?activated=true");
        }
        catch(PDOException $e){
            print("Can't execute this query!");
        }
    }
?>


