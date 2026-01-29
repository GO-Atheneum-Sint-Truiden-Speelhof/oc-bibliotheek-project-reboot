<?php
 function connectDB() {     
    $ini = parse_ini_file("../config/config.ini");
    $db = new mysqli($ini['db_host'], $ini['db_user'], $ini['db_pass'], $ini['db_name']);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    return $db;
    }
    function addBook(){
        $db = connectDB();
        $qry = "INSERT INTO `book`(`Title`, `Author`, `Summary`, `ISBN`, `RentedOut`, `Cover`, `QR`, `Genre`, `Pages`, `Age`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($qry);
        $title = escape_string(htmlspecialchars($_POST['Title']));
        $stmt->bind_param("ssssisssis", $_POST['titel'], $_POST['auteur'], $_POST['summary'], $_POST['isbn'], $_POST['RentedOut'], $_POST['cover'], $_POST['QR'], $_POST['genre'], $_POST['pages'], $_POST['Age']);
        $stmt->execute();
    }
    function getBookByISBN($ISBN){
        $db = connectDB();
        $qry = "SELECT * FROM `book` WHERE `ISBN` = ?";
        $stmt = $db->prepare($qry);
        $stmt->bind_param("i", $ISBN);
        $stmt->execute();
        $result = $stmt->get_result();
        $db -> close();
        return $result->fetch_assoc();
    }