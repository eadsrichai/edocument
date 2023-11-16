<?php
    $u = $_GET['u_user'];
    $p = $_GET['p_user'];
    include_once('db.php');
    $sql = "SELECT u.u_user, u.p_user, u.fname_user, u.lname_user, r.name_role 
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
        $_SESSION["u"] = $u;
        $_SESSION["p"] = $p;
        $_SESSION["fname_user"] = $mem["fname_user"];
        $_SESSION["lname_user"] = $mem["lname_user"];
        $_SESSION["name_role"] = $mem["name_role"];
        header( "location: backend/index.php" );    
        exit(0);
    }else {
        session_start();
        $_SESSION['error'] = "Username or Password ไม่ถูกต้อง";
        
        header("Location: login.php");
        exit(0);
           
    }
?>

