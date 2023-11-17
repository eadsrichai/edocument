<?php
//session_start();
// if(!empty($_SESSION['idstu'])){
  include('../backend/db.php');
  // $id_user = $_SESSION['4'];
  
  $file1 = $_SESSION['file1'];
  
  $fileupload1='';
  if($_SESSION['fileupload1'] == 'fileupload1'){
    $fileupload1 = $_SESSION['fileupload1'];
  }else if($_SESSION['fileupload2']== 'fileupload2'){
    $fileupload1 = $_SESSION['fileupload2'];
  }
  echo "<br>".$fileupload1."<br>";
 
  $sql1 = "INSERT INTO sender_user(id_user,id_user_re,id_dep,id_doc,date_sender,status_read)
          VALUES('5','4','9','2',current_timestamp(),'0')";

$sql2 = "INSERT INTO doc(id_doc,name_doc,detail_doc,id_type,file)
         VALUES('4','$name_doc','$detail_doc','$id_type','$file1')";

  
if ($conn->query($sql1) === TRUE && $conn->query($sql2) == TRUE) {
    echo "Record updated successfully";
    //include('sentsms.php');
  } else {
    echo "Error updating record: " . $conn->error;
  }
  $conn->close();
  
   echo "updatefile";
   
  header("location:index.php?menu=1");
  exit;
  // header('refresh:0; url=index.php');
  // exit(0);
?>
