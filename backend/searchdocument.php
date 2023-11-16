<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาเอกสาร</title>
</head>
<body>
    <div class="">
        <form action="index.php" method="GET">
         <label>ค้นหาข้อมูล</label>
         <input type="text" value="" name="namedoc"  placeholder="ค้นหาโดย ชื่อเรื่อง"/>
         <input type="hidden" value="5" name="menu"/>
         <input type="submit" value="SearchByName" name="submit" />
        </form>
    
        <form action="index.php" method="GET">
         <label>ค้นหาข้อมูล</label>
         <input type="date" value="" name="mydate"  placeholder="ค้นหาโดย วันเดือนปี "/>
         <input type="hidden" value="5" name="menu"/>
         <input type="submit" value="SearchByDate" name="submit" />
        </form>
    </div>



    <div>


    <?php 
    if(isset($_GET['submit']) == "SearchByName"){
        $namedoc = $_GET['namedoc'];
        echo $namedoc;
        include_once('db.php');
        $sql = "SELECT  * FROM sender_user,doc,type_doc
        WHERE   doc.id_doc = sender_user.id_doc
        AND     doc.id_type = type_doc.id_type
        AND     doc.name_doc like '%$namedoc%' ";
       
    } else if(isset($_GET['submit']) == "SearchByDate"){
        $mydate = $_GET['mydate'];
        echo $mydate;
        include_once('db.php');
        $sql = "SELECT  * FROM sender_user,doc,type_doc
        WHERE   doc.id_doc = sender_user.id_doc
        AND     doc.id_type = type_doc.id_type
        AND     date_sender = '$mydate' ";
         $result = $conn->query($sql);
    }
   
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




    </div>
</body>
</html>