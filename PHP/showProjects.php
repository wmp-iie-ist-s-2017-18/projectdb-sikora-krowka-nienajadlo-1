
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
        $stmt = $dbh->prepare("SELECT name FROM project"); 
        $stmt->execute();
        $employeeArray = array();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach($stmt->fetchAll()as $k=>$v) {
            echo '<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#'.$v['name'].'">'.$v['name'].'</a></li>';
            
        }
    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}
?>
