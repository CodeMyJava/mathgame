<?php
    session_start();
    extract($_POST);
    $_SESSION["email"] = $email;
    $_SESSION["pwd"] = $password;
    $incorrectLogin = "<p>Email or password is incorrect.<br /> Please input the email: 'a@a.a'<br /> Please input the password: 'aaa'</p>";
    
    if ($email == "a@a.a" && $password == "aaa") {
        header("Location:index.php");
        die();
    } else { 
        header("Location:login.php?msg=$incorrectLogin");
        die();
    }
?>