<?php

    session_start();

    $newsTitle = $_POST['newsTitle'];
    $newsContent = $_POST['newsContent'];

    include 'connection.php';

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
            $insertNews = $dbh->prepare("INSERT INTO `news`(`news_content`, `company_ID`, `news_title`) VALUES (".$newsContent.",".$_SESSION['company_id'].",".$newsTitle.")");
            $insertNews->execute();
            print("<br> Query executed!");

            // header("Location: ../SUBPAGES/dashboard.php?news_added");
        }
        catch(PDOException $e){
            print("Can't execute this query!");
        }
    }

?>