<?php
    include 'connection.php';
    $reset_email = $_POST['resetEmail'];

    $connection_status = false;

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
            // database prepared statements
            $reset_select = $dbh->prepare("SELECT * FROM employee WHERE email = :reset_email;" );
            $reset_select->bindParam(':reset_email', $reset_email);
            $reset_select->execute();
            $result = $reset_select->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
            $count = $reset_select->rowCount();

            if($count == 1){
                $reset_code = rand(1000000000, 9999999999);
                session_start();
                $_SESSION['reset_code'] = $reset_code;
                $_SESSION['reset_email'] = $reset_email;
                // email gateway
                $subject = "Password reset code.";
                $messages = "<h2 style='text-align:center'>Reset your password</h1></br>";
                $messages .= "<h3 style='text-align:center'>Your reset code: <span style='color:orange; border: 1px solid orange; border-radius: 6px; display: inline-block; padding: 3px;'> $reset_code</span></h2>";
                $messages .= "<h3 style='text-align:center'>If it was't you just ignore this message.</h3>";
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
                if( mail($reset_email, $subject, $messages, $headers) ) {
                    header("Location:../index.php?reset=1");
                } else {
                    header("Location:../index.php?reset=0");
                }
            
            }

            else{
                header("Location:../index.php?reset=0");
            }

        }
        catch(PDOException $e){
            header("Location:../index.php?reset=0");
        }
    }
?>