<?php
session_start();
include 'server/functions.php';

if (isset($_POST['user']) && isset($_POST['password'])) {
    $username = $_POST['user'];
    $password = $_POST['password'];
    $hash = getPasswordByUsername($username);
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
    echo "Hash: " . $hash . "<br>";

    // Hier zou je normaal gesproken de gebruikersgegevens controleren, bijvoorbeeld tegen een database
    // Voor dit voorbeeld gebruiken we hardcoded waarden

    //voorlopige inlog username: admin , wachtwoord: admin123

    if (password_verify($password, $hash)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        echo "Ongeldige gebruikersnaam of wachtwoord.";
    }
}

?>

<!DOctype html>
<html lang="eng">
<head>
    <meta charset="utf-8"/>
    <meta name="robots" content="all">
    <link rel="stylesheet" type="text/css" href="styles/opmaak.css">
    <title>Login</title>
</head>
<body>
    <form>
        <div class="form-outline mb-4">
            <input type="text" id="user" class="form-control"/>
            <label class="form-label" for="user">Gebruikersnaam</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="password" class="form-control"/>
            <label class="form-label" for="password">Wachtwoord</label>
        </div>

        <button type="submit">Log in</button>
</body>