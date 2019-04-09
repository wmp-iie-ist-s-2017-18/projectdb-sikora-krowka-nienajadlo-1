<?php
    include 'connection.php';
    session_start();
    $reset_email = $_SESSION['reset_email'];
    $connection_status = false;
    $reset_password = password_hash($_POST['resetPassword'], PASSWORD_BCRYPT);
    // try to connect with database
    try {
        $dbh = new PDO($db_dsn, $db_username, $db_password);
        $connection_status = true;
    } 

    // exception
    catch (PDOException $e) {
        print("Error!: " . $e->getMessage() . "<br/>");
        $connection_status = false;
        die();
    }
    
    

    if($_POST['reset_code'] == $_SESSION['reset_code']){

        try{
            // database prepared statements
            $update = $dbh->prepare("UPDATE `employee` SET `password`=:reset_password WHERE email=:reset_email;");
            $update->bindParam(':reset_password', $reset_password);
            $update->bindParam(':reset_email', $reset_email);
            $update->execute();
            session_destroy();
            header("Location:../index.php?reset_succesfully");
        }

        catch(PDOException $e){
            header("Location:../index.php?reset_failed");
        }
        
    }
    else{
        header("Location:../index.php?reset_failed");
    }

?>