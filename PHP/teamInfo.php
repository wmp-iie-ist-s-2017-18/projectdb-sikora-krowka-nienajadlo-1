
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
        $stmt = $dbh->prepare("SELECT t.name ,t.team_ID, t.leader_ID,
        (SELECT e.first_Name FROM employee e WHERE e.employee_ID=t.leader_ID) as LeaderFirst , 
        (SELECT e.last_Name FROM employee e WHERE e.employee_ID=t.leader_ID) as LeaderLast 
        FROM employee e, team t,team_employee te WHERE e.employee_ID =".$_SESSION['id']." 
        AND te.employee_ID = e.employee_ID AND te.team_ID = t.team_ID"); 
        $stmt->execute();
        $employeeArray = array();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach($stmt->fetchAll()as $k=>$v) {
            echo ' <div class="tab-pane container" id="team'.$v['team_ID'].'">
                            <h4 style="text-align: center" class="display-4"> '.$v['name'].'</h4>';
                            if ($v['leader_ID'] == $_SESSION['id']) {
                                echo '<h6 style="text-align: center; font-size: 2rem; font-weight: normal;"> You are the leader of this team</h6>
                                <button class="btn btn-outline-primary"  style="margin: 10px auto; justify-self: center;" data-toggle="modal" data-target="#addEmployeeModal'.$v['team_ID'].'">Add employee</button>';
                            }
                            else{
                                echo '<h6style="text-align: center">Leader: '.$v['LeaderFirst'].' '.$v['LeaderLast'].'</h6>';
                            }
                           echo '<div class="card">
                            <div class="card-header" id="messageHead'.$v['team_ID'].'"  data-toggle="collapse" data-target="#collapse'.$v['team_ID'].'">
                            <h4 class="card-title">Team Chat</h4>
                            </div>
                            <div class="tester  collapse " id="collapse'.$v['team_ID'].'">
                            <div class="card-body chatField">';

                            
                            $stmtChat = $dbh->prepare("Select c.Chat_ID , c.message , e.first_Name  
                            FROM projectchat c ,employee e 
                            WHERE team_ID = ".$v['team_ID']." 
                            AND e.employee_ID = c.employee_ID ORDER BY c.Chat_ID"); 
                            $stmtChat->execute();
                            
                            foreach($stmtChat->fetchAll()as $j=>$z) {
                               echo '<p class="card-text"><h6>'.$z['first_Name'].':</h6>'.$z['message'].'</p>';

                            }
                            
                            echo '
                            </div>
                         <div class="card-footer">
                            <form class="form-inline" action="../PHP/sendProjectMessage.php?currentTeamID='.$v['team_ID'].'"  method="POST">
                                <input type="text" class="form-control" placeholder="Enter messsage" name="messageText" autocomplete="off">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>
                            </form>
                            
                            </div></div>
                            </div></div>';

                            echo '<div class="modal" id="addEmployeeModal'.$v['team_ID'].'">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Employee</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">

                                        <form action="../PHP/addNewEmployeeTooTeam.php?currentTeamID='.$v['team_ID'].'" method="POST">
                                            <div class="form-group">
                                                <label for="sel1">Select employee:</label>
                                                <select class="form-control" id="sel1" name="sellist1">';
                                                     include 'possibleEmployee.php';
                                               echo  '</select>
                                                <br>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Cancel</button>
                                    </div>

                                </div>
                            </div>
                        </div>';

        }
    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}


?>
