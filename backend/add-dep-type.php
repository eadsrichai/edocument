<?php

    include_once('db.php');

    $sql1 = "SELECT id_dep FROM dep WHERE id_dep = ?";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("s", $id_dep);
    $id_dep = $_GET['id_dep'];
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION["error2"] = "รหัสแผนก $id_dep  ซ้ำ";
        $stmt->close();  
        $conn->close();
        header( "location: index.php?menu=32" );
        exit(0);

    }else {
    $sql2 = "INSERT INTO dep(id_dep,name_dep)
            VALUES(?,?)";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("ss",$id_dep,$name_dep);

    $id_dep = $_GET['id_dep'];
    $name_dep = $_GET['name_dep'];

    $stmt->execute();
    $stmt->close();  
    $conn->close();

    header( "location: index.php?menu=3" );
    exit(0);
    }
?>