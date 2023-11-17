<div >
    <ul class="nav">
         <li><a href="index.php?menu=10">หน้าหลัก</a></li>
         <li><a href="index.php?menu=11">แก้ไขข้อมูลส่วนตัว</a></li>
         <li><a href="index.php?menu=12">เปลี่ยนรหัสผ่าน</a></li>
         <li style="float:right"><a href="../backend/logout.php">Logout</a></li>
     </ul>
     
</div>
<div style="color: red;float: right;">
    <?php  echo " ". $_SESSION['fname_user'] . " online"  ?>
</div>