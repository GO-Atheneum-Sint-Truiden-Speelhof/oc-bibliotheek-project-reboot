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
        $rentedOut = 0;
        $age = 10;
        $stmt->bind_param("ssssisssii", $_POST['titel'], $_POST['auteur'], $_POST['summary'], $_POST['isbn'], $rentedOut, $_POST['cover'], $file, $_POST['genre'], $_POST['pages'], $age);
        $stmt->execute();
        $db->close();
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
        //returns either 1 (if there is a book with the given ISBN) or 0 (if there is no book with the given ISBN)
    }

    function getPasswordByUsername($username) {
        $db = connectDB();
        $qry = "SELECT `Password` FROM `user` WHERE `Username` = ?";
        $stmt = $db->prepare($qry);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            $db->close();
            die("Gebruiker niet gevonden of wachtwoord incorrect");
        }
        $row = $result->fetch_row();
        $db->close();
        return password_hash($row[0], PASSWORD_DEFAULT);
        //returns the hashed password for the given username, or an error message if the user is not found
    }
    
?>