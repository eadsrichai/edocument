<?php
include_once('db.php');
   $id_type = $_GET['id_type'];
    $id = $_GET['id_type'];
    $sql = "DELETE FROM type_doc WHERE id_type =?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $id_type);
    $id_type = $id;

    $stmt->execute();
    $stmt->close();
    $conn->close();
    header( "location: index.php?menu=2" );
    exit(0);
?>