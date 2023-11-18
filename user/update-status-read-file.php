<?php
    include_once('../backend/db.php');
    $id_doc = $_GET['id_doc'];
    $file = $_GET['file'];
    $sql = "UPDATE  sender_user SET  status_read = '1' WHERE id_doc = '$id_doc'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: ../backend/data/$file");
    exit(0);

?>