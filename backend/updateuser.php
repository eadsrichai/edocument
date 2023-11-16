<?php
include_once('db.php');

    $sql = "UPDATE user SET status_user=? WHERE id_user =?";
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $status_user,$id_user);
    $status_user = $_GET['status'];
    $id_user= $_GET['id_user'];
    
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header( "location: index.php?menu=1" );
    exit(0);
?>