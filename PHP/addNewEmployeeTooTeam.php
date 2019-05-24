<?php
    session_start();
    include 'connection.php';

    try {
        $conn = new PDO($db_dsn, $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $LeaderID = $_POST['sellist1'];
        $currentTeam = $_GET['currentTeamID'];

        

            $stmt = $conn->prepare("INSERT INTO `team_employee`( `employee_ID`, `team_ID`) VALUES ('$LeaderID','$currentTeam')"); 
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