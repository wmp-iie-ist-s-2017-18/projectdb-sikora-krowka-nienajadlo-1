
<?php
    include 'connection.php';

    try {
        $conn = new PDO($db_dsn, $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $email = $_POST['logRegEmail'];
        $login = $_POST['logRegLogin'];
        $password = $_POST['logRegPassword'];

        // password hashing with default salt
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO `employee`(`login`, `password`, `email`) VALUES ('$login','$hash','$email')"); 
        $stmt->execute();
      
        header("Location:../index.php?register=1");
    }
        
    catch(PDOException $e)
        {
            header("Location:../index.php?register=0");
            // print("Error!: " . $e->getMessage() . "<br/>");
            $connection_status = false;
            die();
        }
        
?>


