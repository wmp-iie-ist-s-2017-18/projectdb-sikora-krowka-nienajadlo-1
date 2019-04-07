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
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#dashboardEmployee">Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#dashboardSettings">Settings</a>
                </li>
                <li class="nav-item" id="adminSQL">
                    <a class="nav-link" id="adminHrefSQL" data-toggle="tab" href="#dashboardSQL">SQL</a>
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
            <?php
    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "projectmanager";
    $db_dsn = "mysql:host=$db_servername;dbname=$db_name;charset=utf8mb4";

try {
    $pdo = new PDO($db_dsn, $db_username, $db_password);
 
    $sql = 'SELECT *
               FROM project
              ';
 
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $db_name :" . $e->getMessage());
}
?>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Projekty</h1>
                        <p class="lead">This is Projects subpage.</p>
                        <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>State</th>
						<th>Start</th>
						<th>Finish</th>
						<th>Team_id</th>
						<th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['project_ID']) ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['state']); ?></td>
							<td><?php echo htmlspecialchars($row['start']) ?></td>
							<td><?php echo htmlspecialchars($row['finish']) ?></td>
							<td><?php echo htmlspecialchars($row['team_ID']) ?></td>
							<td><?php echo htmlspecialchars($row['description']) ?></td>
						
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>






                    </div>
                </div>
            </div>
            <div id="dashboardTeam" class="container tab-pane fade">
            <?php
    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "projectmanager";
    $db_dsn = "mysql:host=$db_servername;dbname=$db_name;charset=utf8mb4";

try {
    $pdo = new PDO($db_dsn, $db_username, $db_password);
 
    $sql = 'SELECT *
               FROM team
              ';
 
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $db_name :" . $e->getMessage());
}
?>	
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Zespoły</h1>
                        <p class="lead">This is Team subpage.</p>
                        <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
						<th>ID lidera</th>
                        <th>Name</th>
                        <th>id teamu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                       <td><?php echo htmlspecialchars($row['leader_ID']) ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['team_ID']); ?></td>
						
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>






                    </div>
                </div>
            </div>
            <div id="dashboardEmployee" class="container tab-pane fade">
            <?php
    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "projectmanager";
    $db_dsn = "mysql:host=$db_servername;dbname=$db_name;charset=utf8mb4";

try {
    $pdo = new PDO($db_dsn, $db_username, $db_password);
 
    $sql = 'SELECT *
               FROM employee
              ';
 
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $db_name :" . $e->getMessage());
}
?>	   
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Pracownicy</h1>
                        <p class="lead">This is Team subpage.</p>
                       
                        <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imie</th>
                        <th>Nazwisko</th>
						<th>login</th>
						<th>email</th>
						<th>password</th>
						<th>position</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['employee_ID']) ?></td>
                            <td><?php echo htmlspecialchars($row['first_Name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_Name']); ?></td>
							<td><?php echo htmlspecialchars($row['login']) ?></td>
							<td><?php echo htmlspecialchars($row['email']) ?></td>
							<td><?php echo htmlspecialchars($row['password']) ?></td>
							<td><?php echo htmlspecialchars($row['position']) ?></td>
						
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
                    </div>
                </div>
            </div>
            <div id="dashboardSettings" class="container tab-pane fade">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Settings</h1>
                        <p class="lead">This is Settings subpage.</p>
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

    <script>
        var url = $(location).attr('href');
        const sql_query = "sql=1";
        const sql_query_error = "sql=0";

        if (url.indexOf(sql_query) >= 1) {
            $("#adminHrefSQL").click();
        }
        if (url.indexOf(sql_query_error) >= 1) {
            $("#adminHrefSQL").click();
            $("#SQLComandLine").css("border", "1px dashed red");
        }
    </script>

    <script src="../SCRIPTS/dashboard.js"></script>

</body>

</html>