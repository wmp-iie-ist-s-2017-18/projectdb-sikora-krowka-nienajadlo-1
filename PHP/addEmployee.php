
<?php
    include 'connection.php';

    try {
        $conn = new PDO($db_dsn, $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $email = $_POST['logRegEmail'];
        $password = $_POST['logRegPassword'];
        $activation_code = rand(1000000000, 9999999999);

        // password hashing with default salt
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO `employee`( `password`, `email`, `activation_code`) VALUES ('$hash','$email', '$activation_code')"); 
        $stmt->execute();
      
        // email gateway
        $subject = "Activation code.";
        $messages = "<h2 style='text-align:center'>Welcome!</h1></br>";
        $messages .= "<h2 style='text-align:center'>Thank you for choosing our service!</h1></br>";
        $messages .= "<h3 style='text-align:center'>Your activation code: <span style='color:green; border: 1px solid green; border-radius: 6px; display: inline-block; padding: 3px;'> $activation_code</span></h2>";
        $messages .= "<h3 style='text-align:center'>If it was't you just ignore this message.</h3>";
        echo "ok";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
        if( mail($email, $subject, $messages, $headers)){
            header("Location:../index.php?register=1");
        } else {
            header("Location:../index.php?register=0");
        }

    }
        
    catch(PDOException $e)
        {
            // print("Error!: " . $e->getMessage() . "<br/>");
            $connection_status = false;
            die();
            header("Location:../index.php?register=0");
        }
        
?>


