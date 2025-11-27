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

$ini = parse_ini_file("../server/config/config.ini");
if(isset($_POST['url'])) {
    require '../phpqrcode/beautiful-qr-code.php';

    $text = $_POST['url'];
    $backgroundColor = 'ffffff';
    $primaryColor = '013009';
    $secondaryColor = 'ca3301';
    $scale = 3; // Higher scale, higher quality and slower speed

    $file = $ini['output_dir']."qr_".preg_replace('/[^A-Za-z0-9]/', '_', $_POST['naam']).".png";
    echo $file;
generateBeautifulQRCode($text, $backgroundColor, $primaryColor, $secondaryColor, $scale, $file);
}

//$file moeten bewaren in DB met naam erbij
//Vanuit formulier.

echo "<img src='".$file."' alt='QR Code'>";
?>