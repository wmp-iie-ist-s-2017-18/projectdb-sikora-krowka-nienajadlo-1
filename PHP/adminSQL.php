<?php
include 'connection.php';

// form variables initialization and declaration
    $SQL =$_REQUEST['SQLComandLine'];

// try to connect with database
try {
    $dbh = new PDO($db_dsn, $db_username, $db_password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $connection_status = true;
    // print("Connection estabilished");
} 

// exception
catch (PDOException $e) {
    print("Error!: " . $e->getMessage() . "<br/>");
    $connection_status = false;
    die();
}

if($connection_status){
    try{
        // database prepared statements
        $stmt = $dbh->prepare($SQL);
        $stmt->execute();
        $resultTable ="";
        $fields = array_keys($stmt->fetch(PDO::FETCH_ASSOC));
        $resultTable .= '  <table class="table table-bordered"> <thead><tr>';
        foreach ($fields as $field) {
            $resultTable .= "<th>".$field."</th>";
        }
        $stmt = $dbh->prepare($SQL);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultTable .= '</tr></thead><tbody>';
        foreach($stmt->fetchAll()as $k=>$v){
            
        $resultTable .= '<tr>';
                    foreach($v as $col){
                        $resultTable .= "<td>".$col."</td>";
                    }
                    $resultTable .= '</tr>';
                }
                $resultTable .= '</tbody>';
                $resultTable .= '</table>';
                session_start();
                $_SESSION['resultTable'] = $resultTable;
                echo $resultTable;
        print("<br> Query executed!");

        header("Location: ../SUBPAGES/dashboard.php?sql=1");
    }

    catch(PDOException $e){
        // var_dump($e->getMessage());
        header("Location: ../SUBPAGES/dashboard.php?sql=0");
    }
}

?>