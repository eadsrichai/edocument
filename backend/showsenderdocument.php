<?php  
    include_once('db.php');
    $sql = "SELECT  * FROM sender_user,doc,type_doc
    WHERE sender_user.id_doc = doc.id_doc
    AND doc.id_type = type_doc.id_type";
    $result = $conn->query($sql);
    ?>
    <div>
    <table style="width:100%">
        <tr>
            <td>รหัสเอกสาร</td>
            <td>ชื่อเอกสาร</td>
            <td>ประเภทเอกสาร</td>
            <td>ชื่อไฟล์</td>
        </tr>
        <?php
    while($row = $result->fetch_assoc()) { ?>   
            <tr>
                <td><?php  echo $row['id_doc']; ?></td>
                <td><?php  echo $row['name_doc']; ?></td>
                <td><?php  echo $row['name_type']; ?></td>
                <td><a href="data/<?php  echo $row['file']; ?>"><?php  echo $row['file']; ?></a></td>
            </tr>
        <?php
        }
    
    ?>
    </table>
    </div>
<hr>

