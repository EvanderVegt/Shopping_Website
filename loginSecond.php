<!DOCTYPE html>
<html>
    <head>
        <title> Simple_Shopping_cart</title>
        <link rel =" stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link rel =" stylesheet" href="cart.css"/>
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
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"style="padding-top: 10px"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style=" padding-top: 100px">           
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Please sign in</h3>
                            </div>
                            <div class="panel-body">
                                <form accept-charset="UTF-8" role="form">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="E-mail" name="email" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                                            </label>
                                        </div>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" style="background-color: #00547E">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
    </body>
</html>