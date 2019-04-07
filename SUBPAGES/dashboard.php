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

</head>

<body>
    <!-- dashboard navigation -->
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="dashNav navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="dashboard.html">
            <img class="logLogo" src="../img/vs.png" alt="Logo">
            <span class="logLogoDesc">Project Manager</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="userPanel navbar-nav ml-auto nav" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#dashboardHome">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#dashboardProjects">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#dashboardTeam">Team</a>
                </li>
                <li class="nav-item" id="adminSQL">
                    <a class="nav-link" id="adminHrefSQL" data-toggle="tab" href="#dashboardSQL">SQL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#dashboardSettings"><i class="fas fa-user-cog"></i></a>
                </li>
                <li class="nav-item" id="signOut">
                    <a class="nav-link" data-toggle="tab"><i class="fas fa-sign-out-alt"></i></a>
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
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Projects</h1>
                        <p class="lead">This is Projects subpage.</p>
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
                                <form>
                                    <div class="form-group">
                                        <label for="firstName">First name</label>
                                        <input type="text" class="form-control" placeholder="Your first name."
                                            id="firstName">
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email
                                            with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last name:</label>
                                        <input type="text" id="lastName" class="form-control"
                                            placeholder="Your last name.">
                                    </div>
                                    <div class=" form-group">
                                        <label for="email">Email adress:</label>
                                        <input type="text" id="lastName" class="form-control" id="email"
                                            placeholder="Your email adress.">
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position:</label>
                                        <input type="text" id="position" class="form-control" id="password"
                                            placeholder="Your position in company.">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" id="lastName" class="form-control" id="password"
                                            placeholder="Your new password.">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dashboardSQL" class="container tab-pane fade">
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
            echo("<script>$('#adminHrefSQL').click();</script>");
            echo("<script>$('#SQLComandLine').css('border', '1px dashed red');</script>");
        }
        else if(isset($_GET['sql']) && $_GET['sql'] == 1){
            echo("<script>$('#adminHrefSQL').click();</script>"); 
        }
    ?>

    <script src="../SCRIPTS/dashboard.js"></script>

</body>

</html>