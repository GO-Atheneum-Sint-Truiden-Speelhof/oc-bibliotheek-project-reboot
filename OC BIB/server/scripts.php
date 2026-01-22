<?php 

// qr_generate.php
    function showqrcode($isbn, $naam) {
    $ini = parse_ini_file("../config/config.ini");

        require '../phpqrcode/beautiful-qr-code.php';

        $text = $_POST['url'];
        $backgroundColor = 'ffffff';
        $primaryColor = '013009';
        $secondaryColor = 'ca3301';
        $scale = 3; // Higher scale, higher quality and slower speed

        $file = $ini['output_dir']."qr_".preg_replace('/[^A-Za-z0-9]/', '_', $naam).".png";
        echo "<img src='".$file."' alt='QR Code'>";
        // bestaat isbn al? bestaat naam al? bestaat bestand al?
        SELECT * from book WHERE isbn = '$isbn';
        if (file_exists($file)) {
            return $file; // bestand bestaat al
        }
        else {
            return false; // bestand bestaat niet
        }
        generateBeautifulQRCode($isbn, $backgroundColor, $primaryColor, $secondaryColor, $scale, $file);
    }
?>