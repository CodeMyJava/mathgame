<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Math Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center"><h1>Please login to play!</h1>
                <h2>Please try to guess the login credentials. <br /> If you get it wrong the correct login credential will be provided</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
            <?php
                if (isset($_GET["msg"])) {
                echo $_GET["msg"];    
                } 
            ?>
            </div>
        </div>
        <form class="form-horizontal" role="form" action="validate.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Email: </label>
                <div class="col-sm-4">
                    <input type="text" required="true" class="form-control" id="email" name="email" placeholder="Email" size="8" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="pwd">Password:</label>
                <div class="col-sm-4">
                    <input type="text" required="true" class="form-control" id="password" name="password" placeholder="Password" size="8" />
                </div>
            </div>
            <div class="row">
            <div class="col-sm-4 col-sm-offset-5">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
        </form>
    </div> 
</body>
</html>