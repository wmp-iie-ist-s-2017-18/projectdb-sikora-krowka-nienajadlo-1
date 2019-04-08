
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
        // $stmt = $dbh->prepare("SELECT * FROM project"); 
        $stmt = $dbh->prepare('SELECT p.name , p.state , p.start ,p.finish , p.description , t.name  
        AS teamName FROM project p ,team t WHERE p.team_ID = t.team_ID'); 
        $stmt->execute();
        $employeeArray = array();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach($stmt->fetchAll()as $k=>$v) {
        //    echo ' <div class="tab-pane container  active" id="'.$v['name'].'">
        //                     <h4> '.$v['name'].'</h4>
        //                     <h6>'.$v['state'].'</h6>
        //                     <h6>'.$v['start'].'</h6>
        //                     <h6>'.$v['finish'].'</h6>
        //                     <h6>'.$v['team_ID'].'</h6>
        //                 </div>';

                        echo ' <div class="tab-pane container" id="'.$v['name'].'">
                            <h4> '.$v['name'].'</h4>
                            <h6>'.$v['state'].'</h6>
                            <h6>'.$v['start'].'</h6>
                            <h6>'.$v['finish'].'</h6>
                            <h6>'.$v['teamName'].'</h6>
                        </div>';
        }
    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}
?>
