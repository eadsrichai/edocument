<?php

    include_once('db.php');

    $sql1 = "SELECT MAX(id_type) as m FROM type_doc";
    $result = $conn->query($sql1);
    $row = mysqli_fetch_array($result);
    $maxvalue = $row['m'];
    $maxvalue++;

    $sql2 = "INSERT INTO type_doc(id_type,name_type)
            VALUES(?,?)";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("ss",$id_type,$name_type);

    $id_type = $maxvalue;
    $name_type = $_GET['name_type'];

    $stmt->execute();
    $stmt->close();  
    $conn->close();

    header( "location: index.php?menu=2" );
    exit(0);
?>