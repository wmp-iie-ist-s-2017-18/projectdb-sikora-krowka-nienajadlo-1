
<?php
session_start();
include 'connection.php';
$projectMessage = $_POST["messageText"];
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

if($connection_status){
    $currentTeam = $_GET['currentTeamID'];
    try{
        $stmt = $dbh->prepare("INSERT INTO projectchat (team_ID, employee_ID, message) 
        VALUES (".$currentTeam.",".$_SESSION['id'].",'".$projectMessage."')"); 
        $stmt->execute();
        header("Location:../SUBPAGES/dashboard.php?sendmessage=".$currentTeam."");
        
        }
    
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}
?>
