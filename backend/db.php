<?php

try {
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $db = "user1";

    $conn = new mysqli($servername, $username, $password, $db);
    mysqli_set_charset($conn,"utf8mb4");
    // echo "connect database success";
}catch(Exception $e){
  echo "database not connect";

}


?>