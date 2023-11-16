<?php  
    include_once('db.php');
    $sql = "SELECT  * FROM doc, type_doc
    WHERE doc.id_type = type_doc.id_type";

    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
<div>
    <div><p class="header-data">การจัดการเอกสาร</p></div>
    <hr>
    <table>
    <thead>
        <tr >
            <td>รหัสเอกสาร</td>
            <td style="text-align:start">ชื่อเอกสาร</td>
            <td colspan="2">การจัดการ</td>
            <td></td>
        </tr>
    </thead>
        <?php
while($row = $result->fetch_assoc()) { ?>
     
            <tr>
                <?php $id_doc = $row['id_doc'];  ?>
                <td><?php  echo $id_doc; ?></td>
                <input type="hidden" name="id_doc" value="<?php echo $id_doc;?>"/>
                <td style="text-align:start"><?php  echo $row['name_doc'] ?></td>
                <td><a href="index.php?menu=22&id_doc=<?php echo $id_doc; ?>">Update</a></td>
                <td><a href="type-del.php?id_doc=<?php echo $id_doc; ?>">Delete</a></td>
            </tr>
        
        <?php
}
}
?>
    </table>
</div>
<hr>
<div>
    <a href="index.php?menu=21">เพิ่มประเภทเอกสาร</a>
</div>
