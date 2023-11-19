<?php
    include_once('../backend/db.php');
    $id_doc = $_GET['id_doc'];
    $id_user = $_GET['id_user'];
    $id_user_re = $_GET['id_user_re'];

    $sql = "DELETE  FROM sender_user 
            WHERE id_doc = '$id_doc'
            AND  id_user = '$id_user'
            AND  id_user_re = '$id_user_re'";



    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: index.php?menu=1");
    exit(0);

?>