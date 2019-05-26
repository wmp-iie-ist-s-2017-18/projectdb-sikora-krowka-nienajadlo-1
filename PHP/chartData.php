
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
        $stmt = $dbh->prepare("SELECT name , budget FROM project "); 
        $stmt->execute();
        echo "[";
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll()as $k=>$v) {
            echo "[ ";
            echo "'".$v["name"]."'";
            echo " , ";
            echo $v["budget"];
            echo " ],";
        }
        echo "]";
    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}
?>
