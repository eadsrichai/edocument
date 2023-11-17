<?php

header('Content-Type: text/html; charset=utf-8');
$_SESSION['fileupload1']="";
$_SESSION['fileupload2']="";
$_SESSION['errors'] = null;
// $_SESSION['tel']=$_POST['tel'];  

//กำหนดประเภทของไฟล์ว่าไฟล์ประเภทใดบ้างที่อนุญาตให้ upload มาที่ Server
$File_Type_Allow = array("application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                        "application/vnd.ms-excel","application/pdf","image/png","image/jpg",
                        "image/jpeg"); 
// กำหนดชื่อโฟลเดอร์ในการ upload file                      
$Upload_Dir = "../backend/data";

//กำหนดขนาดไฟล์ที่ ใหญ่ที่สุดที่อนุญาตให้ upload มาที่ Server มีหน่วยเป็น byte
$Max_File_Size = 200000000; 

function validate_form($file_input,$file_size,$file_type) { //เป็น function ที่เอาไว้ตรวจสอบว่าไฟล์ที่ผู้ใช้ upload ตรงตามเงื่อนไขหรือเปล่า
   global $Max_File_Size,$File_Type_Allow;
   if ($file_input = null) {
      $error = "ไม่มี file ให้ Upload";
   } elseif ($file_size > $Max_File_Size) {
      $error = "ขนาดไฟล์ใหญ่กว่า $Max_File_Size ไบต์";
   } elseif (!check_type($file_type,$File_Type_Allow)) {
      $error = "ไฟล์ประเภทนี้ ไม่อนุญาตให้ Upload <strong>อัพโหลดได้เฉพาะไฟล์นามสกุล .pdf, .png, ,jpeg, jpg เท่านั้น</strong>";
   } else {
      $error = false;
   }
   return $error;
}

//เป็น ฟังก์ชัน ที่ตรวจสอบว่า ไฟล์ที่ upload อยู่ในประเภทที่อนุญาตหรือเปล่า
function check_type($type_check) { 
   global $File_Type_Allow;
   for ($i=0;$i<count($File_Type_Allow);$i++) {
      if ($File_Type_Allow[$i] == $type_check) {
         return true;
      }
   }
   return false;
}

// ฟังก์ชั่นแยกชื่อไฟล์และนามสกุลออกมาเก็บไว้ในตัวแปรอาร์เรย์ $tmp
function splitEx($f){
   $tmp = (explode('.',$f));           //ทำการแยกชื่อไฟล์ และ นามสกุลออกมา
   $tmp[0] = "11111";       // ตัวแปรอาร์เรย์ tmp[0] = รหัสบัตรประชาชน
   $currentDateTime = date('dmYHis');  // วันเดือนปีเวลาปัจจุบัน
   $netTmp = $tmp[0].$currentDateTime.'.'.$tmp[1]; // นำตัวแปร tmp[0] รวมเวลา จุด และนามสกุลไฟล์เข้าด้วยกัน
   return $netTmp;   // ส่งค่า ชื่อและนามสกุลไฟล์กลับไปยังจุดเรียกใช้
 }

//  if ( $_FILES['file']['error']) {
//     $_SESSION['errors'][] = 'ไม่มีไฟล์ :'.$_FILES['file']['error'];
//     header('location:errors.php');
//     exit(0);
//  }

if($_FILES['file']['name']){
	$error_msg = validate_form($_FILES['file']['name'],$_FILES['file']["size"],$_FILES['file']["type"]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
	if ($error_msg) {
     $_SESSION['errors'][] = $error_msg;
      header('location:errors.php');
      exit(0);
	} else {
      $newFile = splitEx($_FILES['file']['name']);
     
      if (copy($_FILES['file']['tmp_name'],$Upload_Dir."/".$newFile)) { //ทำการ copy ไฟล์มาที่ Server
        
         $_SESSION['file1']=$newFile;
         
         include('updatefile.php');
	      } else {
            $_SESSION['errors'][] = 'ไฟล์ Upload มีปัญหา'.$newFile.''.$_FILES['file']['error'];
            
	   }
	}
}

?>
