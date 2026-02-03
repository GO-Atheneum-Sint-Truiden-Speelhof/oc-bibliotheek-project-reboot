<?php
    include("server/functions.php");
    include("server/scripts.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $existingBook = getBookByISBN($_POST['isbn']);
        $row = $existingBook;
        $file = showqrcode($_POST['isbn'], $_POST['titel']);
        if($file){
            addBook($file);
            header("Location: index.php?status=success");
        }
    }
    header("Location: index.php?status=error");
?>
