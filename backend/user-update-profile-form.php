<?php  
    
    $id_user = $_SESSION['id_user'];
    include_once('db.php');
    $sql = "SELECT * FROM user WHERE id_user like '$id_user'";
    $result = $conn->query($sql);
if ($row = $result->fetch_assoc()) {
    ?>
<div>
<div><p class="header-data">การแก้ไขข้อมูลส่วนตัว</p></div>
    <hr>

    <table>
    <thead>
        <tr>
            <td>รหัสผู้ใช้</td>
            <td>ชื่อผู้ใช้</td>
            <td>นามสกุล</td>
            <td>อีเมล์</td>
        </tr>
    </thead>
        <?php
// while($row = $result->fetch_assoc()) { ?>
        <form action="user-update-profile.php" method="GET">
            <tr>
                <?php $id_user = $row['id_user'];  ?>
                <td><?php  echo $id_user; ?></td>
                <input type="hidden" name="id_user"  value="<?php echo $id_user;?>"/>
                <td><input type="text" value="<?php  echo $row['fname_user']; ?>" name="fname_user" /></td>
                <td><input type="text" value="<?php  echo $row['lname_user']; ?>" name="lname_user" /></td>
                <td><input type="text" value="<?php  echo $row['email_user']; ?>" name="email_user" /></td>
                <td><input type="submit" value="Update" name="update" /></td>
            </tr>
        </form>
        <?php
}
// }
?>
    </table>
</div>
<hr>

