<?php


include 'connection.php';

// form variables initialization and declaration
    $log_email = $_POST["logEmail"];
    $log_password = $_POST["logPassword"];

// try to connect with database
try {
    $dbh = new PDO($db_dsn, $db_username, $db_password);
    $connection_status = true;
    print("Connection estabilished");
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
        $logIn = $dbh->prepare("SELECT * FROM Employee WHERE email = :log_email;" );
        $logIn->bindParam(':log_email', $log_email);
        // $logIn->bindParam(':log_password', $log_password);
        $logIn->execute();
        print("<br> Query executed!");

        $result = $logIn->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);

        // print($result[0]) -- id
        // print($result[1]) -- first name
        // print($result[2]) -- last name
        // print($result[3]) -- login
        // print($result[4]) -- email
        // print($result[6]) -- position
        // print($result[5]) -- password
        
        $count = $logIn->rowCount();

        if($count == 1){

            if(password_verify($log_password, $result[5])){
                // header("Location: ../SUBPAGES/dashboard.php?succes=1");

                session_start();

                $_SESSION['id'] = $result[0];
                $_SESSION['fname'] = $result[1];
                $_SESSION['lname'] = $result[2];
                $_SESSION['login'] = $result[3];
                $_SESSION['email'] = $result[4];
                $_SESSION['position'] = $result[6];

     
                header("Location: ../SUBPAGES/dashboard.php?success=1");

            }     
            else{
                header("Location: ../index.php?success=0");
            }

            
        }

        else{
            header("Location: ../index.php?success=0");
        }

    }
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}

?>