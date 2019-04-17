
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
        $stmt = $dbh->prepare("SELECT t.name , t.team_ID FROM team_employee te ,team t 
        WHERE te.employee_ID = ".$_SESSION['id']." AND te.team_ID = t.team_ID GROUP BY t.name"); 
        $stmt->execute();
        $employeeArray = array();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll()as $k=>$v) {
            // echo '<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#team'.preg_replace('/\s+/', '', $v['name']).'">'.$v['name'].'</a></li>';
            echo '<li class="nav-item"><a class="nav-link" data-toggle="tab" id="teamLink'.$v['team_ID'].'" href="#team'.$v['team_ID'].'">'.$v['name'].'</a></li>';
            
        }
    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}
?>
