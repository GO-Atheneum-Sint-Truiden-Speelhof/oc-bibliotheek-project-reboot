<?php 
include_once("functions.php");

// qr_generate.php
    function showqrcode($isbn, $naam) {
        $ini = parse_ini_file("config.ini");

        require(realpath(dirname(__FILE__).'/../phpqrcode/beautiful-qr-code.php'));
        $backgroundColor = 'ffffff';
        $primaryColor = '013009';
        $secondaryColor = 'ca3301';
        $scale = 3; // Higher scale, higher quality and slower speed

        $file = $ini['output_dir']."qr_".preg_replace('/[^A-Za-z0-9]/', '_', $naam).".png";
        
        // bestaat isbn al? Hoeveel boeken?
        $aantalBoeken = getBookByISBN($isbn);
        $isbn .= "_".($aantalBoeken+1);
        generateBeautifulQRCode($isbn, $backgroundColor, $primaryColor, $secondaryColor, $scale, $file);
        if (file_exists($file)) {
            echo "link naar de qr code: ".$file;
            return $file; // bestand bestaat al
        }
        else {
            return false; // bestand bestaat niet
        }
    }
?>