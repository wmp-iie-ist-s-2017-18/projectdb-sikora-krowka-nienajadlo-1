<?php 
    include 'connection.php';
    session_start();
    $code = $_POST['code'];
    $connection_status = false;

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

            $check = $dbh->prepare("SELECT * FROM employee WHERE email = :log_email AND activation_code = :code;" );
            $check->bindParam(':log_email', $_SESSION['email']);
            $check->bindParam(':code', $code);
            $check->execute();
            $result = $check->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
            $count = $check->rowCount();

            if($count == 1){

                $confirm = $dbh->prepare("UPDATE `employee` SET `activated`=1 WHERE activation_code=:code AND email=:email");
                $confirm->bindParam(':email', $_SESSION['email']);
                $confirm->bindParam(':code', $code);
                $confirm->execute();
                header("Location:../SUBPAGES/dashboard.php?activated=true");
            
            }

            else{
                header("Location:../SUBPAGES/activation.php?activated=false");
            }
        }
        catch(PDOException $e){
            header("Location:../SUBPAGES/activation.php?activated=false");
        }
    }

?>