<?php
include 'connection.php';
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
    try{
        $stmt = $dbh->prepare("Select first_Name ,last_Name,employee_ID FROM employee where employee_ID != ".$_SESSION['id']); 
        $stmt->execute();
        $employeeArray = array();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll()as $k=>$v) {
            echo '<option>'.$v['employee_ID'].' '.$v['first_Name'].' '.$v['last_Name'].'</option>';
            
        }
    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}
?>