
<div class="header">
    <p>การแสดงข้อมูลในกล่องเอกสารเข้า</p>
</div>
<hr>
<div>
    <div class="">
        <form action="index.php" method="GET">
            <input type="hidden" value="4" name="menu" />

            <input type="text" value="" name="namedoc" placeholder="ค้นหาโดย ชื่อเรื่อง" />
            <input type="submit" value="SearchByName" name="submit" />

            <input type="date" value="" name="mydate" placeholder="ค้นหาโดย วันเดือนปี " />
            <input type="submit" value="SearchByDate" name="submit" />

            <input type="text" value="" name="fname_user" placeholder="ค้นหาโดย ชื่อผู้ส่ง" />
            <input type="submit" value="SearchByUser" name="submit" />

        </form>
    </div>
<hr>


    <div>

    
    <table style="width:100%">
            <tr>
                <td>รหัสเอกสาร</td>
                <td>ชื่อเอกสาร</td>
                <td>รายละเอียดเอกสาร</td>
                <td>ประเภทเอกสาร</td>
                <td>ชื่อผู้ส่ง</td>
                <td>วันที่ส่ง</td>
                <td>สถานะ</td>
                <td>วันที่อ่าน</td>
                <td>download</td>
              
            </tr>


        <?php 
    include_once('../backend/db.php');
 
$result = null;
$id_user = $_SESSION['id_user'];

if(isset($_GET['submit']) && ($_GET['submit'] == "SearchByName")) {
    $namedoc = $_GET['namedoc'];
    $sql1 = "SELECT  user.fname_user,doc.id_doc,doc.name_doc,doc.detail_doc,doc.file,type_doc.name_type,
    sender_user.id_user_re,sender_user.status_read,sender_user.date_send,sender_user.date_read
     FROM user,sender_user,doc,type_doc
     WHERE user.id_user = sender_user.id_user
     AND sender_user.id_doc = doc.id_doc
     AND doc.id_type = type_doc.id_type
     AND sender_user.id_user_re like '$id_user'
     AND doc.name_doc like '%$namedoc%'";
    
    $result = $conn->query($sql1);
    
}else if(isset($_GET['submit']) && ($_GET['submit'] == "SearchByDate")){
    $mydate = $_GET['mydate'];
    $sql2 = "SELECT  user.fname_user,doc.id_doc,doc.name_doc,doc.detail_doc,doc.file,type_doc.name_type,
    sender_user.id_user_re,sender_user.status_read,sender_user.date_send,sender_user.date_read
     FROM user,sender_user,doc,type_doc
     WHERE user.id_user = sender_user.id_user
     AND sender_user.id_doc = doc.id_doc
     AND doc.id_type = type_doc.id_type
     AND sender_user.id_user_re like '$id_user'
     AND  sender_user.date_send LIKE '$mydate%'";

    $result = $conn->query($sql2);
}else if(isset($_GET['submit']) && ($_GET['submit'] == "SearchByUser")){
    $fname_user = $_GET['fname_user'];

    $sql3 = "SELECT  user.fname_user,doc.id_doc,doc.name_doc,doc.detail_doc,doc.file,type_doc.name_type,
    sender_user.id_user_re,sender_user.status_read,sender_user.date_send,sender_user.date_read
     FROM user,sender_user,doc,type_doc
     WHERE user.id_user = sender_user.id_user
     AND sender_user.id_doc = doc.id_doc
     AND doc.id_type = type_doc.id_type
     AND sender_user.id_user_re like '$id_user'
     AND user.fname_user like '%$fname_user%'";


    $result = $conn->query($sql3);
}else {


    $sql5 = "SELECT  user.fname_user,doc.id_doc,doc.name_doc,doc.detail_doc,doc.file,type_doc.name_type,
     sender_user.id_user_re,sender_user.status_read,sender_user.date_send,sender_user.date_read
      FROM user,sender_user,doc,type_doc
      WHERE user.id_user = sender_user.id_user
      AND sender_user.id_doc = doc.id_doc
      AND doc.id_type = type_doc.id_type
      AND sender_user.id_user_re like '$id_user'";

    $result = $conn->query($sql5);
}
    while($row = $result->fetch_assoc()) { ?>
            <tr>
                <?php $status = $row['status_read'];  ?>
                <td><?php  echo $row['id_doc']; ?></td>
                <?php if($status == "0") { ?>
                <td><a href="update-status-read-file.php?id_doc=<?php echo $row['id_doc']; ?>&file=<?php echo $row['file']; ?>"><?php  echo $row['name_doc']; ?></a></td>
                <?php  }else { ?>
                    <td><a href="../backend/data/<?php echo $row['file']; ?>"><?php  echo $row['name_doc']; ?></a></td>
                <?php } ?>
                <td><?php  echo $row['detail_doc']; ?></td>
                <td><?php  echo $row['name_type']; ?></td>
                <td><?php  echo $row['fname_user']; ?></td>
                <td><?php  echo $row['date_send']; ?></td>
                <?php if($status == "0"){ ?>
                <td style="color: red;"><?php echo "ยังไม่อ่าน" ?></td>
                <?php } else { ?>
                <td style="color: green;"><?php  echo "อ่านแล้ว" ?></td>
                <?php } ?>

                <td><?php echo $row['date_read']; ?></td>
                <?php if($status == "0") { ?>
                <td><a href="update-status-read-file.php?id_doc=<?php echo $row['id_doc']; ?>&file=<?php echo $row['file']; ?>" download>download</a></td>
                <?php  }else { ?>
                    <td><a href="../backend/data/<?php echo $row['file']; ?>">download</a></td>
                <?php } ?>
            </tr>
            <?php
    }


    ?>
        </table>
    </div>
    <hr>
</div>

