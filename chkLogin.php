<?php
    $u = $_GET['u_user'];
    $p = $_GET['p_user'];
    include_once('backend/db.php');
    $sql = "SELECT u.id_user, u.u_user, u.p_user, u.fname_user, u.lname_user, r.name_role 
            FROM   user u,role r
            WHERE u.id_role = r.id_role    
            AND   u.status_user like '1'
            AND  u.u_user =?  
            AND    u.p_user =? ";

    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ss", $u,$p);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION["id_user"] = $row["id_user"];
        $_SESSION["u"] = $u;
        $_SESSION["p"] = $p;
        $_SESSION["fname_user"] = $row["fname_user"];
        $_SESSION["lname_user"] = $row["lname_user"];
        $_SESSION["name_role"] = $row["name_role"];
        header( "location: backend/index.php?menu=5" );    
        exit(0);
    }else {
        session_start();
        $_SESSION['error'] = "Username or Password ไม่ถูกต้อง";
        
        header("Location: login.php");
        exit(0);
           
    }
?>

