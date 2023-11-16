<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาเอกสาร</title>
</head>
<body>
    <div class="section-container-data">
        <form action="index.php" method="GET">
         <label>ค้นหาข้อมูล</label>
         <input type="text" value="" name="name"  placeholder="ค้นหาโดย ชื่อเรื่อง หรือ วันเดือนปี หรือผู้ส่ง"/>
         <input type="hidden" value="5" name="menu"/>
         <input type="submit" value="ค้นหา" name="search" />
        </form>
    </div>

    <div>
    <?php 
    if(isset($_GET['search'])){
        $namedoc = $_GET['name'];
        
        

    include_once('db.php');
    $sql = "SELECT  * FROM sender_user
    LEFT JOIN doc
    ON doc.id_doc = sender_user.id_doc
    LEFT JOIN  type_doc
    ON doc.id_type = type_doc.id_type
  

    WHERE name_doc like '%$namedoc%'
    -- OR date_sender like '2023'

    ";

    $result = $conn->query($sql);
   
    ?>
    <div>
    <hr>
    <table style="width:100%">
        <tr>
            <td>รหัสเอกสาร</td>
            <td>ชื่อเอกสาร</td>
            <td>รายละเอียดเอกสาร</td> 
            <td>ประเภทเอกสาร</td>
            <td>ชื่อไฟล์</td>
        </tr>
    
        <?php
    while($row = $result->fetch_assoc()) { ?>   
            <tr>
                <td><?php  echo $row['id_doc']; ?></td>
                <td><?php  echo $row['name_doc']; ?></td>
                <td><?php  echo $row['detail_doc']; ?></td>
                <td><?php  echo $row['name_type']; ?></td>
                <td><a href="data/<?php  echo $row['file']; ?>"><?php  echo $row['file']; ?></a></td>
            </tr>
        <?php
        }
    
    ?>
    </table>
    </div>
<hr>

<?php  } ?>


    </div>
</body>
</html>