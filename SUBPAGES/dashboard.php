<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project Manager - Manage Your Projects!</title>

    <!-- meta section -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- link section -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="../IMG/vs.png" />

    <!-- scripts section -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- php scripts -->
    <?php
        error_reporting(E_ERROR | E_PARSE);
        session_start();

        include '../PHP/connection.php';
        session_start();
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
                $check = $dbh->prepare("SELECT * FROM employee WHERE email = :log_email;");
                $check->bindParam(':log_email', $_SESSION['email']);
                $check->execute();
    
                $tresult = $check->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
 
            }
            catch(PDOException $e){
                print("Can't execute this query!");
            }
        }
 
    ?>

</head>

<body>
    <!-- dashboard navigation -->
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="dashNav navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="dashboard.php?main">
            <img class="logLogo" src="../img/vs.png" alt="Logo">
            <span class="logLogoDesc">Project Manager</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="userPanel navbar-nav ml-auto nav" role="tablist">
                <li class="nav-item">
                    <a id="dashboardHomeNav" class="nav-link active" data-toggle="tab"
                        href="#dashboardHome">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a id="dashboardProjectsNav" class="nav-link" data-toggle="tab"
                        href="#dashboardProjects">Projects</a>
                </li>
                <li class="nav-item">
                    <a id="dashboardTeamNav" class="nav-link" data-toggle="tab" href="#dashboardTeam">Team</a>
                </li>
                <li class="nav-item" id="adminSQL">
                    <a id="dashboardSQLNav" class="nav-link" data-toggle="tab" href="#dashboardSQL">SQL</a>
                </li>
                <li class="nav-item">
                    <a id="dashboardSettingsNav" class="nav-link" data-toggle="tab" href="#dashboardSettings"><i
                            class="fas fa-user-cog"></i></a>
                </li>
                <li class="nav-item">
                    <a id="signOut" class="nav-link" data-toggle="tab" href="#dashboardSettings"><i
                            class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- dashboard main -->
    <main id="dashboardMain">
        <div class="tab-content">
            <div id="dashboardHome" class="container tab-pane active">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Dashboard</h1>
                        <p class="lead">This is dashboard main page.</p>
                    </div>
                </div>
            </div>

            <div id="dashboardProjects" class="container tab-pane fade">
                <div class="row projectsPage">
                    <div class="col-3 col-lg-2 ">
                        <nav class="navbar bg-ligh navbar-light projectsNav">
                            <h6>Select Project:</h1>
                                </br>
                                <ul class="navbar-nav nav" role="tablist">
                                    <?php include '../PHP/showProjects.php' ?>
                                </ul>

                        </nav>
                    </div>
                    <div class="col-9 col-lg-10 tab-content">
                        <?php include '../PHP/projectInfo.php' ?>
                    </div>
                </div>
            </div>


            <div id="dashboardTeam" class="container tab-pane fade">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Team</h1>
                        <p class="lead">This is Team subpage.</p>
                    </div>
                </div>
            </div>
            <div id="dashboardSettings" class="container tab-pane fade">
                <div class="settingsJumbotron jumbotron jumbotron-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-sm-center col-sm-12 col-md-5">
                                <h1 class="display-4">
                                    Settings
                                </h1>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <form action="../PHP/updateUser.php" method="POST">
                                    <div class="form-group">
                                        <label for="firstName">First name</label>
                                        <input type="text" name="fname" class="form-control"
                                            placeholder="Your first name." id="firstName"
                                            value="<?php echo $tresult[1];?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last name:</label>
                                        <input type="text" id="lastName" name="lname" class="form-control"
                                            placeholder="Your last name." value="<?php echo $tresult[2]; ?>" required>
                                    </div>
                                    <div class=" form-group">
                                        <label for="email">Email adress:</label>
                                        <input type="text" id="email" name="email" class="form-control" id="email"
                                            placeholder="Your email adress." value="<?php echo $tresult[3]; ?>"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position:</label>
                                        <input type="text" id="position" name="position" class="form-control"
                                            placeholder="Your position in company." value="<?php echo $tresult[5]; ?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="number">Telephone number:</label>
                                        <input type="text" name="number" class="form-control" id="number"
                                            placeholder="Your telephone number." value="<?php echo $tresult[7]; ?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="companyName">Company:</label>
                                        <input type="text" name="companyName" class="form-control" id="updateCompany"
                                            placeholder="Company name." value="<?php echo $tresult[9]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="updatePassword">Password:</label>
                                        <input type="password" name="updatePassword" class="form-control"
                                            id="updatePassword" placeholder="Your password." required>
                                        <small id="upPasswordText" class="leads" style="display:none">Wrong
                                            password or incorrect data!</small>
                                    </div>
                                    <small id="emailHelp" class="leads" style="display:none">Successfully
                                        updated!</small>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dashboardSQL" class="container tab-pane fade">
                <div class="container resultContainer scrollbar-primary">
                    <?php 
                    if (isset($_GET['sql']) && $_GET['sql'] == 1) {
                        echo '<script>
                        $("#dashboardSQLNav").click(); </script>';
                        echo($_SESSION['resultTable']);
                    }
                    ?>
                </div>
                <form action="../PHP/adminSQL.php" method="get">
                    <div class="form-group">

                        <label for="SQLComandLine">
                            <p class="lead">SQL Command line</p>
                        </label>
                        <textarea type="text" class="form-control" rows="5" id="SQLComandLine"
                            name="SQLComandLine"></textarea>
                        <!-- <input type="text" class="form-control" name="SQLComandLine" placeholder="Enter username"> -->
                    </div>
                    <button type="submit" class="btn btn-primary">Ready</button>
                </form>

            </div>
        </div>
    </main>

    <!-- dashboard footer -->
    <footer class="dashboardFooter">
        <p>Project Manager - All rights reserved &copy;</p>
    </footer>

    <?php
        //register form 
        if (isset($_GET['sql']) && $_GET['sql'] == 0) {
            echo("<script>$('#dashboardSQLNav').click();</script>");
            echo("<script>$('#SQLComandLine').css('border', '1px solid red');</script>");
        }

        else if (isset($_GET['sql']) && $_GET['sql'] == 1) {
            echo("<script>$('#dashboardSQLNav').click();</script>");
            echo("<script>$('#SQLComandLine').css('border', '1px solid green');</script>");
        }

        if (!isset($_GET['sql'])) {
            echo("<script>$('#SQLComandLine').css('border', '1px solid royalblue');
                $('.resultContainer').css('display', 'none');
            </script>");
        }
        else if(isset($_GET['sql']) && $_GET['sql'] == 1){
            echo("<script>$('#dashboardSQLNav').click();</script>"); 
        }
        
        if (isset($_GET['updated']) && $_GET['updated'] == 1) {
            echo("<script>$('#dashboardSettingsNav').click();</script>");
            echo("<script>$('#emailHelp').css('color', 'green');</script>");
            echo("<script>$('#emailHelp').fadeIn(900);</script>");
        }
        else if (isset($_GET['updated']) && $_GET['updated'] == 0) {
            echo("<script>$('#dashboardSettingsNav').click();</script>");
            echo("<script>$('#upPasswordText').css('color', 'red');</script>");
            echo("<script>$('#upPasswordText').fadeIn(900);</script>");
        }
    ?>

    <script src="../SCRIPTS/dashboard.js"></script>
    <!-- <script src="../SCRIPTS/timer.js"></script> -->

</body>