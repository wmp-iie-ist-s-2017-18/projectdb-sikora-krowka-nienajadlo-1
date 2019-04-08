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
    
        session_start();

    ?>

</head>

<body>
    <!-- dashboard navigation -->
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="dashNav navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="dashboard.html">
            <img class="logLogo" src="../img/vs.png" alt="Logo">
            <span class="logLogoDesc">Project Manager</span>
        </a>


    </nav>

    <!-- dashboard main -->
    <main id="dashboardMain">
        <div class="jumbotron" style="text-align: center;">
            <h1 class="display-4">Activate your account!</h1>
            <p class="lead">When you are using our service you have to activate your account. We send activation code
                for your email. Insert this code here.
            </p>
            <hr class="my-4">
            <form action="../PHP/confirm.php" class="form-inline" style="justify-content: center;" method="POST">
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="sr-only">Email</label>
                    <input type="text" readonly class="form-control-plaintext" name="email" id="staticEmail2"
                        value="<?php echo $_SESSION['email'] ?>" style="width: 300px; text-align: center;">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="code" class="sr-only">Password</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="Activation code">
                </div>
                <button type="submit" class="btn btn-success mb-2">Confirm</button>
            </form>
        </div>
    </main>

    <!-- dashboard footer -->
    <footer class="dashboardFooter">
        <p>Project Manager - All rights reserved &copy;</p>
    </footer>

</body>

</html>