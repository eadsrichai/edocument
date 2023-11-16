<?php  
    include_once('db.php');
    $sql = "SELECT  * FROM dep";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
<div>
<div><p class="header-data">การจัดการหน่วยงานต่าง ๆ</p></div>
    <table>
    <thead>
        <tr>
            <td>รหัสแผนก</td>
            <td>ชื่อแผนก</td>
            <td colspan="2">การจัดการ</td>
            <td></td>
        </tr>
    </thead>
        <?php
while($row = $result->fetch_assoc()) { ?>
        <form action="type-update.php" method="GET">
            <tr>
                <?php $id_dep = $row['id_dep'];  ?>
                <td><?php  echo $id_dep; ?></td>
                <input type="hidden" name="id_dep"  value="<?php echo $id_dep;?>"/>
                <td><?php  echo $row['name_dep'] ?></td>
                <td><a href="index.php?menu=22&id_dep=<?php echo $id_dep; ?>">Update</a></td>
                <td ><a href="typedoc.php?id_dep=<?php echo $id_dep; ?>">Delete</a></td>
            </tr>
        </form>
        <?php
}
?>
    </table>
</div>
<hr>
<div>
<?php 
session_start();
if( isset($_SESSION['error2'])){ ?>
                <label style="color:red;">
                    <?php  echo $_SESSION['error2']; ?>
                </label><br>
                <?php 
}   
$_SESSION['error2'] = null;?>
</div>

<div>
<form action="add-dep-type.php" method="GET">
        <label>รหัสแผนก</label>
        <input type="text" value="" name="id_dep" /><br>
        <label>ชื่อแผนก</label>
        <input type="text" value="" name="name_dep" /><br>
        <input type="submit" value="บันทึก"  name="Save" />
    </form>
</div>

<?php  }  ?>