<?php
 session_start();
 if(isset($_SESSION['u']) 
      && $_SESSION['u'] != null 
      && isset($_SESSION['p']) 
      && $_SESSION['p'] != null){

          include_once('../backend/db.php');
          if($_GET['p_memOld'] == $_SESSION['p']){
            $sql = "UPDATE user SET p_user = ?   WHERE u_user = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $p_user,$u_user);
            $p_user = $_GET['p_memNew'];
            $u_user = $_SESSION['u'];
        
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header( "location: logout.php" );
            exit(0);
          }else {
            echo "รหัสผ่านเดิมไม่ถูกต้อง";
            header( "location: index.php?menu=12" );
            exit(0);
          }

 }else {
      header( "location: login.php" );
      exit(0);
 }


    
     


?>