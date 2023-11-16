<?php  
    include_once('db.php');
    $sql = "SELECT  * FROM sender_user,doc,type_doc,user
    WHERE sender_user.id_doc = doc.id_doc
    AND doc.id_type = type_doc.id_type
    AND sender_user.id_user =  user.id_user ";
    $result = $conn->query($sql);
    ?>
    <div><p class="header-data">แสดงเอกสารทั้งหมด</p></div>
    <hr>
    <div>
    <table style="width:100%">
    <tr>
        <thead>
            <td>รหัสเอกสาร</td>
            <td>ชื่อเอกสาร</td>
            <td>ประเภทเอกสาร</td>
            <td>ชื่อผู้ส่ง</td>
            <td>วันที่ส่ง</td>
            <td>ชื่อไฟล์</td>
        </thead>
    </tr>
        <?php
    while($row = $result->fetch_assoc()) { ?>   
            <tr>
                <td><?php  echo $row['id_doc']; ?></td>
                <td><?php  echo $row['name_doc']; ?></td>
                <td><?php  echo $row['name_type']; ?></td>
                <td><?php  echo $row['fname_user']; ?></td>
                <td><?php  echo $row['date_sender']; ?></td>
                <td><a href="data/<?php  echo $row['file']; ?>"><?php  echo $row['file']; ?></a></td>
            </tr>
        <?php
        }
    
    ?>
    </table>
    </div>
<hr>

