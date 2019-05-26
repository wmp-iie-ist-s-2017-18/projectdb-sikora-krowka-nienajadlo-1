<?php
    session_start();
    include 'connection.php';

    try {
        $conn = new PDO($db_dsn, $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $projectName = $_POST['addProjectName'];
        $projectDescription = $_POST['projectDescription'];
        $projectTeam = $_POST['selectTeam'];
        $projectBudget = $_POST['budget'];
        $projectfinishDate = $_POST['finishDate'];
        $LeaderID =  $_SESSION['id'];
        $now = date("Y-m-d");

        $stmt = $conn->prepare("INSERT INTO `project`( `name`,`start`, `finish`,`team_ID`, `description`,`budget`) 
        VALUES ('$projectName','$now','$projectfinishDate','$projectTeam','$projectDescription','$projectBudget')"); 
        $stmt->execute();


    
      

        header("Location: ../SUBPAGES/dashboard.php");
    }
        
    catch(PDOException $e)
        {
            print("Error!: " . $e->getMessage() . "<br/>");
            $connection_status = false;
            die();
            header("Location:../index.php");
        }
        
?>