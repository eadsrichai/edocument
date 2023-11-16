<div><p class="header-data">ค้นหาข้อมูลเอกสารทั้งหมด</p></div>
    <hr>


<div>
    <div class="">
        <form action="index.php" method="GET">
            <input type="hidden" value="5" name="menu" />

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
                <td>ชื่อไฟล์</td>
            </tr>


        <?php 
    include_once('db.php');
 
$result = null;
if(isset($_GET['submit']) && ($_GET['submit'] == "SearchByName")) {
    $namedoc = $_GET['namedoc'];
    $sql1 = "SELECT  * FROM sender_user,doc,type_doc,user
        WHERE   doc.id_doc = sender_user.id_doc
        AND     doc.id_type = type_doc.id_type
        AND sender_user.id_user =  user.id_user 
        AND     doc.name_doc like '%$namedoc%'";

    $result = $conn->query($sql1);
}else if(isset($_GET['submit']) && ($_GET['submit'] == "SearchByDate")){
    $mydate = $_GET['mydate'];
    $sql2 = "SELECT  * FROM sender_user,doc,type_doc,user
    WHERE   doc.id_doc = sender_user.id_doc
    AND     doc.id_type = type_doc.id_type
    AND sender_user.id_user =  user.id_user 
    AND     date_sender LIKE '$mydate%'";
    $result = $conn->query($sql2);
}else if(isset($_GET['submit']) && ($_GET['submit'] == "SearchByUser")){
    $fname_user = $_GET['fname_user'];
    $sql3 = "SELECT  * FROM sender_user,doc,type_doc,user
    WHERE   doc.id_doc = sender_user.id_doc
    AND     doc.id_type = type_doc.id_type
    AND	sender_user.id_user = user.id_user
    AND     fname_user LIKE '$fname_user'";
    $result = $conn->query($sql3);
}else {
    
    $sql4 = "SELECT  * FROM sender_user,doc,type_doc,user
    WHERE   doc.id_doc = sender_user.id_doc
    AND     doc.id_type = type_doc.id_type
    AND sender_user.id_user =  user.id_user ";
    $result = $conn->query($sql4);
}
    while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php  echo $row['id_doc']; ?></td>
                <td><?php  echo $row['name_doc']; ?></td>
                <td><?php  echo $row['detail_doc']; ?></td>
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
</div>

