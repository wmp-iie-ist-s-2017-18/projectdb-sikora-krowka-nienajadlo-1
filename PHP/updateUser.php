<?php
    session_start();
    include 'connection.php';

    // form variables initialization and declaration
    $email = $_SESSION["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $position = $_POST["position"];
    $tnumber = $_POST["number"];
    $companyName = $_POST["companyName"];
    $updatingPassword = $_POST["updatePassword"];

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
            $usercheck = $dbh->prepare("SELECT * FROM employee WHERE email = :email");
            $usercheck->bindParam(':email', $email);
            $usercheck->execute();
            $cresult = $usercheck->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);

            $company_id = $dbh->prepare("SELECT company_ID FROM company WHERE company_name = :company_name");
            $company_id->bindParam(':company_name', $companyName);
            $company_id->execute();
            $company_idResult = $company_id->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
         



            if(password_verify($updatingPassword, $cresult[4])){
                // , `company_ID`=:company 
                // database prepared statements
                $update = $dbh->prepare("UPDATE `employee` SET `first_Name`=:fname, `last_Name`=:lname,
                `position`=:position, `tel_number`=:tnumber, `company_ID`=:company WHERE email=:email;");
                $update->bindParam(':lname', $lname);
                $update->bindParam(':fname', $fname);
                $update->bindParam(':position', $position);
                $update->bindParam(':tnumber', $tnumber);
                $update->bindParam(':email', $email);
                $update->bindParam(':company',$company_idResult[0]);
                $update->execute();

                header("Location:../SUBPAGES/dashboard.php?updated=1");
            }

            else{
                header("Location:../SUBPAGES/dashboard.php?updated=0");
            }
        }
        catch(PDOException $e){
            header("Location:../SUBPAGES/dashboard.php?updated=0");
        }
    }
?>


