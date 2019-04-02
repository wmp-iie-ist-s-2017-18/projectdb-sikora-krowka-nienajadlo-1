<meta charset="UTF-8">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ProjectMeneger3";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_REQUEST['logEmail'];
    $password = $_REQUEST['logPassword'];

    $stmt = $conn->prepare("SELECT Employee_ID FROM employee WHERE email = '$email'"); 
    $stmt->execute();
    $result = $stmt->fech();
    echo $result["Employee_ID"];
    }
    
catch(PDOException $e)
    {
        
    echo "Connection failed: " . $e->getMessage();
    }
    // header("Location:../index.html");
    
?>