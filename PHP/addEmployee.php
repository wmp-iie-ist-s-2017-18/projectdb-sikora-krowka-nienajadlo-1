
<?php
    include 'connection.php';

    try {
        $conn = new PDO($db_dsn, $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $email = $_POST['logRegEmail'];
        $login = $_POST['logRegLogin'];
        $password = $_POST['logRegPassword'];
        $activation_code = rand(1000000000, 9999999999);

        // password hashing with default salt
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO `employee`(`login`, `password`, `email`, `activation_code`) VALUES ('$login','$hash','$email', '$activation_code')"); 
        $stmt->execute();
      
        // email gateway
        $subject = "Activation code.";
        $messages= "Hello! Your account was succesfully created. Here is your activation code: $activation_code";

        if( mail($email, $subject, $messages) ) {
            header("Location:../index.php?register=1_email=1");
        } else {
            header("Location:../index.php?register=0_email=0");
        }

    }
        
    catch(PDOException $e)
        {
            header("Location:../index.php?register=0");
            // print("Error!: " . $e->getMessage() . "<br/>");
            $connection_status = false;
            die();
        }
        
?>


