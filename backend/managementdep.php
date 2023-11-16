<?php  
    include_once('db.php');
    $sql = "SELECT  * FROM dep";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>

<div>
<div><p class="header-data">การจัดการหน่วยงานต่าง ๆ</p></div>
<hr>
    <table>
    <thead>
        <tr>
            <td>รหัสหน่วยงาน</td>
            <td style="text-align:left;">ชื่อหน่วยงาน</td>
            <td colspan="2">การจัดการ</td>
            <td></td>
        </tr>
    </thead>
        <?php
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <?php $id_dep = $row['id_dep'];  ?>
                <td><?php  echo $id_dep; ?></td>
                <input type="hidden" name="id_dep" value="<?php echo $id_dep;?>"/>
                <td style="text-align:left;"><?php  echo $row['name_dep'] ?></td>
                <td><a href="index.php?menu=31&id_dep=<?php echo $id_dep; ?>">Update</a></td>
                <td><a href="dep-delete.php?id_dep=<?php echo $id_dep; ?>">Delete</a></td>
            </tr>
        <?php
        }
    }
?>
    </table>
</div>
<hr>
<div>
    <a href="index.php?menu=32">เพิ่มหน่วยงาน</a>
</div>
