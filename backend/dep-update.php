<?php
    include_once('db.php');
    $sql = "UPDATE dep SET name_dep=? WHERE id_dep =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name_dep,$id_dep);
    $id_dep = $_GET['id_dep'];
    $name_dep= $_GET['name_dep'];
    
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    header( "location: index.php?menu=3" );
    exit(0);
?>