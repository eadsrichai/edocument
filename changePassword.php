<?php
 session_start();
 if(isset($_SESSION['u']) 
      && $_SESSION['u'] != null 
      && isset($_SESSION['p']) 
      && $_SESSION['p'] != null){

          include_once('db.php');
          if($_GET['p_memOld'] == $_SESSION['p']){
            $sql = "UPDATE member SET p_mem = ?   WHERE u_mem = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $p_mem,$u_mem);
            $p_mem = $_GET['p_memNew'];
            $u_mem = $_SESSION['u'];
        
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header( "location: logout.php" );
            exit(0);
          }else {
            echo "รหัสผ่านเดิมไม่ถูกต้อง";
            header( "location: changePasswordForm.php" );
            exit(0);
          }

 }else {
      header( "location: login.php" );
      exit(0);
 }


    
     


?>