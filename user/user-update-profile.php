<?php
include_once('../backend/db.php');

    $sql = "UPDATE user SET fname_user=?, lname_user=?, email_user=? 
            WHERE id_user =?";
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssss", $fname_user,$lname_user,$email_user,$id_user);
    $fname_user = $_GET['fname_user'];
    $lname_user= $_GET['lname_user'];
    $email_user= $_GET['email_user'];
    $id_user= $_GET['id_user'];
    
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header( "location: index.php?menu=11" );
    exit(0);
?>