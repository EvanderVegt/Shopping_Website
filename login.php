<html>
    <head>
        <link rel =" stylesheet" href="logincss.css"/>
        <link rel =" stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="menu">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand" title="PHP Computer store Home " style="padding-top: 12px ;font-family: Georgia ">PHP Developers Store</a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" ><span class="glyphicon glyphicon-user"style="padding-top: 10px"></span> Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"style="padding-top: 10px"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style="padding-top: 150px">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form method="POST">
                            <div class="form-group">
                                <h2>Sign in</h2>
                            </div>
                            <div class="form-group">
                                <strong>Email Adrress</strong>
                                <input id="signinEmail" type="email" maxlength="50" class="form-control">
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <span class="right"><a href="#">Forgot your password?</a></span>
                                <input id="signinPassword" type="password" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group" style="padding-top: 12px;">
                                <button id="signinSubmit" type="submit" class="btn btn-success btn-block">Sign in</button>
                            </div>
                            <div class="form-group divider">
                                <hr class="left"><small>New to site?</small><hr class="right">
                            </div>
                            <p class="form-group"><a href="#" class="btn btn-info btn-block">Create an account</a></p>
                            <p class="form-group">By signing in you are agreeing to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>