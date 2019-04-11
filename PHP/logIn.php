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
        $logIn = $dbh->prepare("SELECT * FROM employee WHERE email = :log_email;" );
        $logIn->bindParam(':log_email', $log_email);
        // $logIn->bindParam(':log_password', $log_password);
        $logIn->execute();
        print("<br> Query executed!");

        $result = $logIn->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);

        // print($result[0]) ;  ID
        // print($result[1]) ; fname
        // print($result[2]) ; lname
        // print($result[4]) ; password
        // print($result[3]) ; 
        // print($result[5]) ;
        
        $count = $logIn->rowCount();

        if($count == 1){

            if(password_verify($log_password, $result[4])){
                // header("Location: ../SUBPAGES/dashboard.php?succes=1");

                session_start();

                $_SESSION['id'] = $result[0];
                $_SESSION['fname'] = $result[1];
                $_SESSION['lname'] = $result[2];
                $_SESSION['email'] = $result[3];
                $_SESSION['position'] = $result[5];

                

                if($result[7] == 0){
                    header("Location: ../SUBPAGES/activation.php");
                }
                else{
                    header("Location: ../SUBPAGES/dashboard.php?success=1");
                }
                
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