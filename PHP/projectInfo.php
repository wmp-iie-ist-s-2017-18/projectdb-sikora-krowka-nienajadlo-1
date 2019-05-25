
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
        $stmt = $dbh->prepare("Select p.project_ID, p.name ,p.state , p.start ,p.finish, p.budget ,p.description ,t.name  
        AS teamName  FROM project p, team_employee te ,team t where te.employee_ID = ".$_SESSION['id']." AND te.team_ID = p.team_ID GROUP BY p.name"); 
        $stmt->execute();
        $employeeArray = array();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach($stmt->fetchAll()as $k=>$v) {
                        echo ' <div class="tab-pane container" id="'.preg_replace('/\s+/', '', $v['name']).'">
                            <h1 class="display-4" style="text-align: center">'.$v['name'].'</h1>
                            <h6 class="lead" style="padding: 1vh 2px;"><span style="font-size: 1.2rem; font-weight: bold;">Status: </span> '.$v['state'].'</h6>
                            <h6 class="lead" style="padding: 1vh 2px;"><span style="font-size: 1.2rem; font-weight: bold;">Start: </span>'.$v['start'].'</h6>
                            <h6 class="lead" style="padding: 1vh 2px;"><span style="font-size: 1.2rem; font-weight: bold;">Finish: </span> '.$v['finish'].'</h6>
                            <h6 class="lead" style="padding: 1vh 2px;"><span style="font-size: 1.2rem; font-weight: bold;">Budget: </span>'.$v['budget'].'$</h6>
                            <h6 class="lead" style="padding: 1vh 2px;"><span style="font-size: 1.2rem; font-weight: bold;">Team: </span>'.$v['teamName'].'</h6>
                            <h6 class="lead" style="padding: 1vh 2px;"><span style="font-size: 1.2rem; font-weight: bold;">Description: </span>'.$v['description'].'</h6>
                            </div>';
        }
    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}


?>
