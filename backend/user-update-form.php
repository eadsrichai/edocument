<?php
include_once('db.php');
$sql = "SELECT  * FROM user,role
        WHERE user.id_role = role.id_role";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>

<div><p class="header-data">การจัดการผู้ใช้</p></div>
<hr>
    <div >
        <table>
        <thead>
            <tr>
                <td>รหัสผู้ใช้งาน</td>
                <td>ชื่อผู้ใช้</td>
                <td>Admin</td>
                <td>User</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
            <?php
            while ($row = $result->fetch_assoc()) { ?>
                <form action="user-update.php" method="GET">
                    <tr>
                        <?php $id_user = $row['id_user']; ?>
                        <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
                        <td><?php echo $row['id_user'] ?></td>
                        <td><?php echo $row['u_user'] ?></td>
                        <!-- <td><?php echo $row['id_role'] ?></td> -->
                        <?php $id_role = $row['id_role'];
                        if ($id_role == "1") { ?>
                            <td><input type="radio" name="id_role" checked value="1"></td>
                            <td><input type="radio" name="id_role" value="2"></td>
                        <?php
                        } else { ?>
                            <td><input type="radio" name="id_role" value="1"></td>
                            <td><input type="radio" name="id_role" checked value="2"></td>
                        <?php
                        }
                        ?>
                        <td><input type="submit" name="save" value="บันทึก"></td>
                    </tr>
                </form>
        <?php
            }
        }
        ?>
        </table>
        <hr>
    </div>