
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
        $stmt = $dbh->prepare("SELECT t.name ,t.team_ID, 
        (SELECT e.first_Name FROM employee e WHERE e.employee_ID=t.leader_ID) as LeaderFirst , 
        (SELECT e.last_Name FROM employee e WHERE e.employee_ID=t.leader_ID) as LeaderLast 
        FROM employee e, team t,team_employee te WHERE e.employee_ID =".$_SESSION['id']." 
        AND te.employee_ID = e.employee_ID AND te.team_ID = t.team_ID"); 
        $stmt->execute();
        $employeeArray = array();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach($stmt->fetchAll()as $k=>$v) {
            // echo ' <div class="tab-pane container" id="team'.preg_replace('/\s+/', '', $v['name']).'">
            echo ' <div class="tab-pane container" id="team'.$v['team_ID'].'">
                            <h4> '.$v['name'].'</h4>
                            <h6> '.$v['LeaderFirst'].' '.$v['LeaderLast'].'</h6>
                            <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Team Chat</h4>
                            </div>
                            <div class="card-body chatField">';
                            $stmtChat = $dbh->prepare("Select c.Chat_ID , c.message , e.first_Name  
                            FROM projectchat c ,employee e 
                            WHERE team_ID = ".$v['team_ID']." 
                            AND e.employee_ID = c.employee_ID ORDER BY c.Chat_ID"); 
                            $stmtChat->execute();
                            
                            foreach($stmtChat->fetchAll()as $j=>$z) {
                               echo '<p class="card-text">'.$z['first_Name'].': '.$z['message'].'</p>';

                            }
                            
                            echo '
                            </div>
                         <div class="card-footer">
                            <form class="form-inline" action="../PHP/sendProjectMessage.php?currentTeamID='.$v['team_ID'].'"  method="POST">
                                <input type="text" class="form-control" placeholder="Enter messsage" name="messageText">
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
