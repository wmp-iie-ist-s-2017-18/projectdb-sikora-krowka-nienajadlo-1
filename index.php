<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project Manager - Manage Your Projects!</title>

    <!-- meta section -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- link section -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="IMG/vs.png" />

    <!-- scripts section -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- php code -->

    
</head>

<body>

    <!-- log page navigation -->
    <div id="logWrapper" class="wrapper">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark logNav">
            <a class="navbar-brand" href="index.php">
                <img class="logLogo" src="img/vs.png" alt="Logo">
                <span class="logLogoDesc">Project Manager</span>
            </a>

            <!-- right buttons -->
            <div class="logRight">
                <!-- bootstrap modal login (displayed after click SignIn) -->
                <button type="button" class="btn btn-success buttonCheck logButton" id="signIn" data-toggle="modal"
                    data-target="#logLogIn">Sign in</button>
                <!-- bootstrap modal register (displayed after click signUp) -->
                <button type="button" class="btn btn-primary buttonCheck logButton" id="signUp" data-toggle="modal"
                    data-target="#logRegister">Sign
                    up</button>
            </div>
        </nav>



        <main>
            <!-- Bootstrap carousel -->
            <div id="logCarousel" class="carousel slide relationJoinUs" data-ride="carousel">
                <div class="carousel-inner">

                    <!-- carousel item  -->
                    <div class="carousel-item active">
                        <img src="img/startup.jpg" alt="workplace">
                        <div class="carousel-caption logCarouselDesc">
                            <h3>Great place to work</h3>
                            <p>
                                We have well-adjusted workplaces so that time spent at work will be comfortable.</p>
                        </div>
                    </div>

                    <!-- carousel item  -->
                    <div class="carousel-item">
                        <img src="img/workplace.jpg" alt="Team">
                        <div class="carousel-caption logCarouselDesc">
                            <h3>Join a great team.</h3>
                            <p>In our company we have great teams. Choose which one You wont to join.</p>
                        </div>
                    </div>

                    <!-- carousel item  -->
                    <div class="carousel-item">
                        <img src="img/conference.jpg" alt="New York">
                        <div class="carousel-caption logCarouselDesc">
                            <h3>Experienced leaders</h3>
                            <p>If You join us You will work with experienced leaders who will help You make your
                                project
                                faster.</p>
                        </div>
                    </div>
                </div>
                <!-- Join us button -->
                <div id="joinUs" data-toggle="modal" data-target="#logRegister">
                    <p>
                        Join us right now!
                    </p>
                </div>
            </div>
        </main>

    </div>

    <!-- registration form -->
    <div class="modal fade" id="logRegister" tabindex="-1" role="dialog" aria-labelledby="Register Panel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title center-text logRegisterTitle" id="exampleModalLongTitle">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <form action="PHP/addEmployee.php" method="POST">

                            <div class="form-group">
                                <label for="logRegEmail">Email:</label>
                                <input type="email" name="logRegEmail" class="form-control" placeholder="Email"
                                    id="logRegEmail" autocomplete="off" required>
                                <div id="logRegEmailText"></div>
                            </div>
                            <div class="form-group">
                                <label for="logRegPassword">Password:</label>
                                <input type="password" name="logRegPassword" autocomplete="off" class="form-control" placeholder="Password"
                                    id="logRegPassword" required>
                                <div id="logRegPasswordText"></div>
                            </div>
                            <div class="form-group">
                                <label for="logRegRepeat">Repeat Password:</label>
                                <input type="password" class="form-control" autocomplete="off" placeholder="Repeat a password"
                                    id="logRegRepeat" required>
                                <div id="logRegRepeatText"></div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="logRegSubmit">Ready</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Log in panel -->
    <div class="modal fade" id="logLogIn" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="logModal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Sign In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="loggingForm" action="PHP/logIn.php" method="post">
                        <div class="container">
                            <div class="form-group">
                                <label for="logEmail">Email:</label>
                                <input type="email" class="form-control" name="logEmail" autocomplete="off" placeholder="Email"
                                    id="logEmail" required>
                                <div id="logEmailText"></div>
                            </div>
                            <div class="form-group">
                                <label for="logPassword">Password:</label>
                                <input type="password" class="form-control" name="logPassword" autocomplete="off" placeholder="Password"
                                    id="logPassword" required>
                                <div id="logPasswordText"></div>
                                <div id="logLoader">Wrong email or password!</div>
                            </div>
                            <div class="form-group">
                                <a class="forgetPass" data-toggle="modal" data-dismiss="modal" data-target="#reset" href="index.php?reset=1">Reset Password</a>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="logSignInButton" class="btn btn-primary">
                        Sign in
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- RESET PASSWORD MODAL -->
    <div class="modal fade" id="reset" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="resetForm" action="PHP/reset.php" method="post">
                        <div class="container">
                            <div class="form-group">
                                <label for="reset">Email:</label>
                                <input type="email" class="form-control" name="resetEmail" autocomplete="off" placeholder="Email"
                                    id="resetEmail" required>
                                <div id="resetEmailText"></div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="resetButton" class="btn btn-success">
                        Reset
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- insert reset code - modal -->

    <div class="modal fade" id="insertReset" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="PHP/reset_code.php" method="post">
                        <div class="container">
                            <div class="form-group">
                                <label for="reset_code">Reset code:</label>
                                <input type="text" class="form-control" name="reset_code" autocomplete="off" placeholder="Reset code"
                                    required>
                                <div id="resetCodeInfo"></div>
                            </div>
                            <div class="form-group">
                                <label for="resetPassword">Reset code:</label>
                                <input type="password" id="resetPassword" class="form-control" name="resetPassword" autocomplete="off" placeholder="New password"
                                    required>
                                <div id="resetPasswordText"></div>
                            </div>
                            <div class="form-group">
                                <label for="repeatResetPassword">Reset code:</label>
                                <input type="password" id="repeatResetPassword" class="form-control" name="repeatResetPassword" autocomplete="off" placeholder="Repeat new password"
                                    required>
                                <div id="resetRepeatPasswordText"></div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="resetConfirm" class="btn btn-warning">
                        Reset
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
</div>


    <?php
        //register form 
        if (isset($_GET['register']) && $_GET['register'] == 1) {
            echo("<script>$(document).ready(function(){alert('Successfully registered!');});</script>");
        }
        else if(isset($_GET['register']) && $_GET['register'] == 0){
            echo("<script>$('#signUp').click();</script>"); 
            echo("<script>$('#logRegRepeatText').html('Can\'t use this email adress or login! Try again.').css('color', 'red');</script>"); 
        }

        //sign in form
        else if (isset($_GET['success']) && $_GET['success'] == 0) {
            echo("<script>$('#signIn').click();</script>");
            echo("<script>$('#logPasswordText').html('Wrong email or password!');</script>");
            echo("<script>$('#logPasswordText').css('color','red');</script>");
        }

        // reset password modal showing
        if (isset($_GET['reset']) && $_GET['reset'] == 1) {
            
            echo("<script>$('#insertReset').modal('show');</script>");
            session_start();
        }
        else if (isset($_GET['reset']) && $_GET['reset'] == 0) {
            
            echo("<script>$('#reset').modal('show');</script>");
            print("<script>$(document).ready(function(){\$('#resetEmailText').css('color','red');});</script>");
            print("<script>$(document).ready(function(){\$('#resetEmailText').html('This email don\'t exist in database!');});</script>");

        }

        // reset password modal message - wrong code
        if (isset($_GET['reset_failed'])) {
 
           echo("<script>$('#insertReset').modal('show');</script>");
           print("<script>$(document).ready(function(){\$('#resetCodeInfo').css('color','red');});</script>");
           print("<script>$(document).ready(function(){\$('#resetCodeInfo').html('Wrong code!');});</script>");

        }

        
        // reset password modal message - success
        else if (isset($_GET['reset_successfully'])) {

            echo("<script>alert('Your password was succesfully reseted!');</script>");
 
        }

    ?>

    <!-- external scripts -->
    <script src="SCRIPTS/logpanel.js"></script>
</body>

</html>