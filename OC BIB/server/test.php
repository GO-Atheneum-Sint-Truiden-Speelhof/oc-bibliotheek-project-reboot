<?php
$db = new mysqli("localhost","root","","oc_bib");
$qry = "SELECT Count(*) FROM `book` WHERE `ISBN` = ?";
        $stmt = $db->prepare($qry);
        $stmt->bind_param("i", $ISBN);
        $stmt->execute();
        $result = $stmt->get_result();
        $db -> close();
        print_r($result->fetch_array());
?>