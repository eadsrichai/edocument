<?php

try {
    $servername = "localhost";
    $username = "user1";
    $password = "asdf";
    $db = "user1";

    $conn = new mysqli($servername, $username, $password, $db);
    mysqli_set_charset($conn,"utf8mb4");
    // echo "connect database success";
}catch(Exception $e){
  echo "database not connect";

}


?>