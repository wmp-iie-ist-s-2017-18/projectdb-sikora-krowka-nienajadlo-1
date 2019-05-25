<?php
    session_start();
    include 'connection.php';

    try {
        $conn = new PDO($db_dsn, $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $teamName = $_POST['addTeamName'];
        $LeaderID =  $_SESSION['id'];

        $stmt = $conn->prepare("INSERT INTO `team`( `name`, `leader_ID`) VALUES ('$teamName','$LeaderID')"); 
        $stmt->execute();


        $check = $conn->prepare("SELECT team_ID FROM team WHERE `name` = '$teamName'");
            $check->execute();

            $result = $check->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);

            $actualTeamID = $result[0];

            $stmt = $conn->prepare("INSERT INTO `team_employee`( `employee_ID`, `team_ID`) VALUES ('$LeaderID','$actualTeamID')"); 
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