<?php
session_start();
include 'server/functions.php';

?>

<!DOctype html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="./opmaak/opmaak.css">
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <?php include 'includes/nav.php'; ?>
            <div class="login">
                <h1>Login</h1>
                <form action="login.php" method="post" class="form login-form">
                    <label class="form-label" for="username">Username</label>
                    <div class="form-group">
                        <svg class="form-icon-left" width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        <input class="form-input" type="text" name="username" placeholder="Username" id="username" required>
                    </div>
                    <label class="form-label" for="password">Password</label>
                    <div class="form-group mar-bot-5">
                        <svg class="form-icon-left" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 448 512">
                            <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                        <input class="form-input" type="password" name="password" placeholder="Password" id="password" required>
                    </div>                
                    <div class="col">
                        <input type="submit" name="login" class="btn-outline-dark btn-lg" value="Log in">
                    </div>				
                </form>
                <?php
                    if (isset($_POST['username']) && isset($_POST['password'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $hash = getPasswordByUsername($username);

                        //voorlopige inlog username: admin , wachtwoord: admin123

                        if (password_verify($password, $hash)) {
                            $_SESSION['loggedin'] = true;
                            $_SESSION['username'] = $username;
                            header('Location: index.php');
                            exit();
                        } else {
                            
                            header('Location: login.php');
                            echo "alert('Incorrect username or password. Please try again.')";
                            exit();
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>
<style>
    h1{
        text-align: center;
    }
    .login{
        border: solid gray 1px;
        width:25%;
        border-radius: 2px;
        margin: 120px auto;
        background: white;
        padding: 50px;
        text-align: center;
    }
    .col{
        margin: 10px auto;
    }
</style>