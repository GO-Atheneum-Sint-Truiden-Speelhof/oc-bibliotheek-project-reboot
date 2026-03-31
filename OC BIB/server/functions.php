<?php
    function connectDB() {     
    $ini = parse_ini_file("db.ini");
    $db = new mysqli($ini['host'], $ini['username'], $ini['password'], $ini['databasename']);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    return $db;
    }
    function addBook($file){
        $db = connectDB();
        $qry = "INSERT INTO `book`(`Title`, `Author`, `Summary`, `ISBN`, `RentedOut`, `Cover`, `QR`, `Genre`, `Pages`, `Age`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($qry);
        $title = escape_string(htmlspecialchars($_POST['titel']));
        $stmt->bind_param("ssssisssis", $_POST['titel'], $_POST['auteur'], $_POST['summary'], $_POST['isbn'], "false", $_POST['cover'], $file, $_POST['genre'], $_POST['Pages'], 10);
        $stmt->execute();
    }
    function getBookByISBN($ISBN){
        $db = connectDB();
        $qry = "SELECT Count(*) FROM `book` WHERE `ISBN` = ?";
        $stmt = $db->prepare($qry);
        $stmt->bind_param("i", $ISBN);
        $stmt->execute();
        $result = $stmt->get_result();
        $db -> close();
        return $result->fetch_row()[0];
    }

    function getPasswordByUsername($username){
        $db = connectDB();
        $qry = "SELECT `Password` FROM `user` WHERE `Username` = ?";
        $stmt = $db->prepare($qry);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $result->num_rows === 0 ? die("Gebruiker niet gevonden of wachtwoord incorrect") : null;
        $db -> close();
        return $result->fetch_row()[0];
    }
?>