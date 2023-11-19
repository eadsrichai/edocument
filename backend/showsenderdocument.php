<div class="header-data">
    <p>ข้อมูลการส่งเอกสารทั้งหมด</p>
</div>
<hr>
<?php
     include_once('../backend/db.php');
     $sql = "SELECT  *
             FROM sender_user,user,doc,type_doc
             WHERE 	sender_user.id_user = user.id_user
             AND    sender_user.id_doc = doc.id_doc
             AND    doc.id_type = type_doc.id_type";
            // --  AND	sender_user.id_user LIKE '$id_user'";

    $result = $conn->query($sql);
    ?>
    <table style="width:100%">
            <tr>
                <td>รหัสเอกสาร</td>
                <td>ชื่อเอกสาร</td>
                <td>รายละเอียดเอกสาร</td>
                <td>ประเภทเอกสาร</td>
                <td>ชื่อผู้ส่ง</td>
                <td>วันที่ส่ง</td>
                <!-- <td>ชื่อผู้รับ</td> -->
                <td>สถานะ</td>
                <td>วันที่อ่าน</td>
            </tr>
    
    <?php
    while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php  echo $row['id_doc']; ?></td>
                <td><a href="../backend/data/<?php  echo $row['file']; ?>"><?php  echo $row['name_doc']; ?></a></td>
                <td><?php  echo $row['detail_doc']; ?></td>
                <td><?php  echo $row['name_type']; ?></td>
                <td><?php  echo $row['fname_user']; ?></td>
                <td><?php  echo $row['date_send']; ?></td>
                <!-- <td><?php echo $row['fname_user']; ?></td> -->
                    <?php $status = $row['status_read']; 
                      if($status == "0"){ ?>
                <td style="color: red;"><?php echo "ยังไม่อ่าน" ?></td>    <?php } else { ?>
                <td style="color: green;"><?php  echo "อ่านแล้ว" ?></td>  <?php } ?>
                
                <td><?php echo $row['date_read']; ?></td>

            </tr>
            <?php
    } ?>
        </table>
    </div>
    <hr>
</div>