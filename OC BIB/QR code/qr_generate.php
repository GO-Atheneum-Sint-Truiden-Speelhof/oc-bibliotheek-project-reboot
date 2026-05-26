<!DOCTYPE html>
<html lang="nl">
<?php session_start(); include_once("../server/scripts.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <script>
        function updateQRCode(e) {
            if(e.key === "Tab") {
                e.preventDefault(); // Voorkom dat het formulier wordt verzonden
                console.log("Tab key pressed, updating QR code...");
                const url = document.querySelector('input[name="url"]').value;
                const qrcodeDiv = document.getElementById('qrcode');
                qrcodeDiv.innerHTML = '<img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' + encodeURIComponent(url) + '" alt="QR Code">';
            }
        }
    </script>

</head>
<body>
    <h2>Gegevens invoeren</h2>
    <form action="qr_generate.php" method="post" id="dataForm">
        <label for="naam">Naam:</label><br>
        <input type="text" name="naam" value="John Doe"><br><br>
        
        <label for="url">URL of tekst:</label><br>
        <input type="text" name="url" value="https://example.com" onkeydown="updateQRCode(event)"><br><br> <!-- Hier kan ook een ISBN of andere tekst worden ingevoerd gevolgd door een tab, waarna de QR-code automatisch wordt bijgewerkt.-->
        
        <button type="submit" confirm>Genereer QR-code</button>
    </form>
    
    <hr>
    
    <h2>Resultaat</h2>
    <div id="qrcode"></div>
</body>
<?php 
    // later nog aanpassen  (voorlopig testboek)
    if (isset ($_POST['naam']))
    showqrcode("test", $_POST['naam']);

//$file moeten bewaren in DB met naam erbij
//Vanuit formulier.
?>