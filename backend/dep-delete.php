<?php
    include_once('db.php');
   
    $sql = "DELETE FROM dep WHERE id_dep =?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $id_dep);
    $id_dep = $_GET['id_dep'];

    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    header( "location: index.php?menu=3" );
    exit(0);
?>