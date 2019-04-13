
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
        $stmt = $dbh->prepare("Select p.project_ID, p.name ,p.state , p.start ,p.finish ,p.description ,t.name  
        AS teamName  FROM project p, team_employee te ,team t where te.employee_ID = ".$_SESSION['id']." AND te.team_ID = p.team_ID GROUP BY p.name"); 
        $stmt->execute();
        $employeeArray = array();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach($stmt->fetchAll()as $k=>$v) {
                        echo ' <div class="tab-pane container" id="'.preg_replace('/\s+/', '', $v['name']).'">
                            <h4> '.$v['name'].'</h4>
                            <h6>'.$v['state'].'</h6>
                            <h6>'.$v['start'].'</h6>
                            <h6>'.$v['finish'].'</h6>
                            <h6>'.$v['teamName'].'</h6>
                            <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Project Chat</h4>
                            </div>
                            <div class="card-body">';
                            $stmtChat = $dbh->prepare("Select c.Chat_ID , c.message , e.first_Name  FROM projectchat c ,employee e WHERE project_ID = ".$v['project_ID']." AND e.employee_ID = c.employee_ID ORDER BY c.Chat_ID"); 
                            $stmtChat->execute();
                            
                            foreach($stmtChat->fetchAll()as $j=>$z) {
                               echo '<p class="card-text">'.$z['first_Name'].': '.$z['message'].'</p>';

                            }
                            
                            echo '
                            <form class="form-inline" action="../PHP/sendPRojectMessage.php?currentProjectID='.$v['project_ID'].'"  method="POST">
                                <input type="text" class="form-control" id="messageText" placeholder="Enter messsage" name="messageText">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                            
                            </div>
                            </div></div>';
        }
    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}


?>
