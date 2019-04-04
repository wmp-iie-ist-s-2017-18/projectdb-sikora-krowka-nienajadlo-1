
<?php
    include 'connection.php';

    try {
        $conn = new PDO($db_dsn, $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = $_POST['logRegEmail'];
        $login = $_POST['logRegLogin'];
        $password = $_POST['logRegPassword'];
        $stmt = $conn->prepare("INSERT INTO `employee`(`login`, `password`, `email`) VALUES ('$login','$password','$email')"); 
        $stmt->execute();
    }
        
    catch(PDOException $e)
        {
            print("Error!: " . $e->getMessage() . "<br/>");
            $connection_status = false;
            die();
        }
        header("Location:../index.html?register=1");
        
        // echo "<script> alert('Account created successfully')</script>";
        
?>


