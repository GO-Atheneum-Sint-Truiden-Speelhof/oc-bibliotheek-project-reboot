<?php
 function connectDB() {     
    $ini = parse_ini_file("../config/config.ini");
    $db = new mysqli($ini['host'], $ini['username'], $ini['password'], $ini['databasename']);
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
        $stmt->bind_param("ssssisssis", $_POST['Title'], $_POST['Author'], $_POST['Summary'], $_POST['ISBN'], $_POST['RentedOut'], $_POST['Cover'], $_POST['QR'], $_POST['Genre'], $_POST['Pages'], $_POST['Age']);
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
        return $result;
    }