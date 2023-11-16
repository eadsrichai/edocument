<?php
    include_once('db.php');
    $sql = "UPDATE type_doc SET name_type=? WHERE id_type =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name_type,$id_type);
    $id_type = $_GET['id_type'];
    $name_type= $_GET['name_type'];
    
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    header( "location: index.php?menu=2" );
    exit(0);
?>