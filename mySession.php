<?php
session_start();
if(isset($_SESSION['u']) 
     && $_SESSION['u'] != null 
     && isset($_SESSION['p']) 
     && $_SESSION['p'] != null){
        
    }else {
        header( "location: login.php" );
        exit(0);
   }
?>