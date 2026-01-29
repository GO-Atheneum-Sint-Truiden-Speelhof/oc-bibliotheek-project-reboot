<!DOCTYPE html>
<html lang="nl">
<?php session_start(); include_once("../server/scripts.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
</head>
<body>

    <h2>Gegevens invoeren</h2>
    <form action="qr_generate.php" method="post" id="dataForm">
        <label for="naam">Naam:</label><br>
        <input type="text" name="naam" value="John Doe"><br><br>
        
        <label for="url">URL of tekst:</label><br>
        <input type="text" name="url" value="https://example.com"><br><br>
        
        <button type="submit" confirm>Genereer QR-code</button>
    </form>
    
    <hr>
    
    <h2>Resultaat</h2>
    <div id="qrcode"></div>
</body>
<?php 
    // later nog aanpassen  (voorlopig testboek)
    showqrcode(123457890, $_POST['naam']);

//$file moeten bewaren in DB met naam erbij
//Vanuit formulier.
?>