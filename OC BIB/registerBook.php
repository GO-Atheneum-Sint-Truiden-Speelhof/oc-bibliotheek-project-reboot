<?php
    /*session_start();
    include("server/functions.php");
    include("server/scripts.php");
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $existingBook = getBookByISBN($_POST['isbn']);
        $row = $existingBook;
        $file = showqrcode($_POST['isbn'], $_POST['titel']);
        if($file){
            addBook($file);
            $_SESSION['status'] = 'success';
            header("Location: index.php");
            exit();
        }
        $_SESSION['status'] = 'error';
        header("Location: index.php");
        exit();
    }*/
    
    session_start();
    include("server/functions.php");
    include("server/scripts.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Validate POST data
        if (isset($_POST['isbn']) && isset($_POST['titel'])) {
            $existingBook = getBookByISBN($_POST['isbn']);
            $file = showqrcode($_POST['isbn'], $_POST['titel']);
            echo "File generated: " . $file; // Debugging output
            if ($file) {
                addBook($file);
                $_SESSION['status'] = 'success';
                header("Location: index.php");
                exit; // Stop script execution after redirect
            } else {
                // Handle QR code generation failure
                $_SESSION['status'] = 'error';
                //header("Location: index.php?qr=error");
                exit;
            }
        } else {
            // Handle missing POST data
            $_SESSION['status'] = 'error';
            header("Location: index.php?data=missing");
            exit;
        }
    } else {
        // Handle non-POST requests (if needed)
        $_SESSION['status'] = 'error';
        header("Location: index.php?method=invalid");
        exit;
    }
    
    
?>