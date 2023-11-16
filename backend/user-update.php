<?php
include_once('db.php');

    $sql = "UPDATE user SET id_role=? WHERE id_user =?";
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $id_role,$id_user);
    $id_role = $_GET['id_role'];
    $id_user= $_GET['id_user'];
    
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header( "location: index.php?menu=11" );
    exit(0);
?>