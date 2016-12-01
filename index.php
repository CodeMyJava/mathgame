<?php session_start(); 
    if (!isset($_SESSION["email"])) {
        header("Location:login.php");
        die();
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Math Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" />
    <meta charset="utf-8" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Math Game</h1>
            </div>
        </div>
        
        <?php 
        if (isset($_POST["firstNumber"])) {
            $_SESSION["firstNumber"] = $_POST["firstNumber"];
        }
        if (isset($_POST["secondNumber"])) {
            $_SESSION["secondNumber"] = $_POST["secondNumber"];
        }
        if (isset($_POST["symbols"])) {
            $_SESSION["symbols"] = $_POST["symbols"];
        }   
        if (isset($_POST["answer"])) {
            $_SESSION["current_ans"] = $_POST["answer"];
        } 
        if (!isset($_SESSION["total"])) {
            $_SESSION["total"] = 0;
            $_SESSION["score"] = 0;
        }
        
        $signs = array('+', '-');
        $firstNumber = rand(0, 20);
        $secondNumber = rand(0, 20);
        $symbols = $signs[rand(0, 1)];
        
        if ($symbols == $signs[1]) {
            $_SESSION["current_correct"] = $firstNumber - $secondNumber;
        } else {
            $_SESSION["current_correct"] = $firstNumber + $secondNumber;
        }
        ?>
        
        <form action="index.php" method="post" class="form-horizontal" role="form">
            <div class="row text-center" style="font-size: 40px">
                <label class="col-sm-12"><?php echo $firstNumber ."". $symbols ."". $secondNumber?></label>
            </div>
            <div class="form-group">
                <input type="number" required="true" class="form-control text-center" name="answer" placeholder="Think before you answer" />
            </div>
            <div class="row text-center">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">Enter Answer</button>
                </div>
                <div class="col-sm-12">
                    <a href="logout.php" class="btn btn-danger">Log out</a>
                </div>
            </div>
            <hr style="width: 50%"/>
        </form>
        <?php 
        if (isset($_SESSION["current_ans"])) {
            $_SESSION["prev_ans"] = $_SESSION["current_ans"];
            $incorrect = "<p class='text-center'>INCORRECT <br> The answer was: " . $_SESSION["prev_correct"] ."</p>";
            $_SESSION["total"] = $_SESSION["total"] + 1;
            $correct = "<p class='text-center'>CORRECT!</p>";
            
            if (isset($_SESSION["prev_ans"])) {  
            }
            if ($_SESSION["prev_ans"] == $_SESSION["prev_correct"]) {
                $_SESSION["score"] = $_SESSION["score"] + 1;
                echo $correct;
            } else {
                echo $incorrect;
            }
        }
        $_SESSION["prev_correct"] = $_SESSION["current_correct"];
        ?>
        <div class="row">
            <div class="text-center">
                <p>Score: <?php echo $_SESSION["score"]; ?> / <?php echo $_SESSION["total"]; ?></p>
            </div>
        </div>
    </div>
</body>
</html>