<?php 

// qr_generate.php
    function showqrcode() {
    $ini = parse_ini_file("../config/config.ini");
    if(isset($_POST['url'])) {
        require '../phpqrcode/beautiful-qr-code.php';

        $text = $_POST['url'];
        $backgroundColor = 'ffffff';
        $primaryColor = '013009';
        $secondaryColor = 'ca3301';
        $scale = 3; // Higher scale, higher quality and slower speed

        $file = $ini['output_dir']."qr_".preg_replace('/[^A-Za-z0-9]/', '_', $_POST['naam']).".png";
        echo "<img src='".$file."' alt='QR Code'>";
        
        generateBeautifulQRCode($text, $backgroundColor, $primaryColor, $secondaryColor, $scale, $file);
    }
    else{
        echo "<img src='../images/other/placeholder.png' alt='QR Code'>";
    } 
    }
?>