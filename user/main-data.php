<?php
    if (isset($_GET['menu'])) {    $menu = $_GET['menu'];
        if($menu == null){ $menu = '1';}
  
    switch($menu){
        case '1' : include_once('user-send-document.php'); break;
        case '2' : include_once('user-send-document-to-dep.php'); break;
        case '3' : include_once('user-send-document-to-all.php'); break;
        case '4' : include_once('user-receive-document-from-all.php'); break;
    }

}
?>