<?php
        include 'connection.php';
        session_start();
        $connection_status = false;
    
        // try to connect with database
        try {
            $dbh = new PDO($db_dsn, $db_username, $db_password);
            $connection_status = true;
            // print("Connection estabilished");
        } 
    
        // exception
        catch (PDOException $e) {
            // print("Error!: " . $e->getMessage() . "<br/>");
            $connection_status = false;
            die();
        }
    
        if($connection_status){
            try{
                // database prepared statements
                $findCompanies = $dbh->prepare("SELECT * FROM company");
                $findCompanies ->bindParam(':log_email', $_SESSION['email']);
                $findCompanies ->execute();
                // $result = $findCompanies ->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
                $result = $findCompanies->setFetchMode(PDO::FETCH_ASSOC);
                print('<option disabled selected value="">Select your company</option>');
                foreach($findCompanies->fetchAll()as $k=>$v) {
                   print('<option>'.$v["company_name"].'</option>');
                }

                // header("Location: ../SUBPAGES/dashboard.php?success=1");
            }
            catch(PDOException $e){
                print("Can't execute this query!");
            }
        }
?>