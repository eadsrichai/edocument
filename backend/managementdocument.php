<?php  
    include_once('db.php');
    $sql = "SELECT  * FROM type_doc";

    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
<div>
    <div><p class="header-data">การจัดการประเภทเอกสาร</p></div>
    <hr>
    <table>
    <thead>
        <tr >
            <td>รหัสประเภทเอกสาร</td>
            <td style="text-align:start">ชื่อเอกสาร</td>
            <td colspan="2">การจัดการ</td>
            <td></td>
        </tr>
    </thead>
        <?php
while($row = $result->fetch_assoc()) { ?>
     
            <tr>
                <?php $id_type = $row['id_type'];  ?>
                <td><?php  echo $id_type; ?></td>
                <input type="hidden" name="id_type" value="<?php echo $id_type;?>"/>
                <td style="text-align:start"><?php  echo $row['name_type'] ?></td>
                <td><a href="index.php?menu=22&id_type=<?php echo $id_type; ?>">Update</a></td>
                <td><a href="type-del.php?id_type=<?php echo $id_type; ?>">Delete</a></td>
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
