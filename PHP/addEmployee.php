
<?php
$servername = "localhost";
$username = "postgres";
$password = "postgres";
$dbname = "ProjectManager";

try {
    $conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_REQUEST['regEmail'];
    $login = $_REQUEST['regLogin'];
    $password = $_REQUEST['regPass'];
    $stmt = $conn->prepare('INSERT INTO public.employee ("Employee_ID" , "Email" , "Login" , "Password" )'." VALUES (4 ,'$email' ,'$login', '$password')"); 
    $stmt->execute();
    }
    
catch(PDOException $e)
    {
        
    echo "Connection failed: " . $e->getMessage();
    }
    header("Location:../index.html");
    
    // echo "<script> alert('Account creat successfully')</script>";
    
?>


