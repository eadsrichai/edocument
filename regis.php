<?php

    include_once('backend/db.php');

    $sql = "INSERT INTO user(u_user,p_user,pre_user,fname_user,lname_user,email_user,tel_user,status_user,id_role,id_dep)
            VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss",$u_user,$p_user,$pre_user,$fname_user,$lname_user,$email_user,$tel_user,$status_user,$id_role,$id_dep);
    
    $u_user = $_GET['u_user'];
    $p_user = $_GET['p_user'];
    $pre_user = $_GET['pre_user'];
    $fname_user = $_GET['fname_user'];
    $lname_user = $_GET['lname_user'];
    $email_user = $_GET['email_user'];
    $tel_user = $_GET['tel_user'];
    $status_user = "0";
    $id_role = "2";
    $id_dep = $_GET['id_dep'];
  
        
    $stmt->execute(); // ทำการประมวลผลการเพิ่มข้อมูล
    $stmt->close();  //  ปิดการเชื่อมต่อ
    $conn->close();  //  ปิดการเชื่อมต่อฐานข้อมูล
    //  ย้ายตำแหน่งในการแสดงผลไปที่ regis.html และออกจากคำสั่งทั้งหมด  exit(0)
    header( "location: login.php" );
    exit(0);
?>