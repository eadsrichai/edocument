<?php  
    include_once('db.php');
    $sql = "SELECT  * FROM type_doc";

    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
<div>
    <table>
    <thead>
        <tr>
            <td>รหัสประเภทเอกสาร</td>
            <td>ชื่อเอกสาร</td>
            <td colspan="2">การจัดการ</td>
            <td></td>
        </tr>
    </thead>
        <?php
while($row = $result->fetch_assoc()) { ?>
        <form action="type-update.php" method="GET">
            <tr>
                <?php $id_type = $row['id_type'];  ?>
                <td><?php  echo $id_type; ?></td>
                <input type="hidden" name="id_type"  value="<?php echo $id_type;?>"/>
                <td><?php  echo $row['name_type'] ?></td>
                <td><a href="index.php?menu=22&id_type=<?php echo $id_type; ?>">Update</a></td>
                <td ><a href="typedoc.php?id_type=<?php echo $id_type; ?>">Delete</a></td>
            </tr>
        </form>
        <?php
}
}
?>
    </table>
</div>
<hr>
<div>
<form action="adddocumenttype.php" method="GET">
        <label>ชื่อประเภทเอกสาร</label>
        <input type="text" value="" name="name_type" />
        <input type="submit" value="บันทึก"  name="Save" />
    </form>
</div>
<div>
    <a href="index.php?menu=21">เพิ่มประเภทเอกสาร</a>
</div>
