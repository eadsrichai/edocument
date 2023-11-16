<?php
include_once('db.php');
$sql = "SELECT  * FROM user
    LEFT JOIN role
    ON  user.id_role = role.id_role";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>

<div><p class="header-data">การจัดการกลุ่มผู้ใช้</p></div>
<hr>

    <div >
        <table>
        <thead>
            <tr>
                <td>รหัสผู้ใช้งาน</td>
                <td>Username</td>
                <td>กลุ่มผู้ใช้งาน</td>
                <td>อนุญาต</td>
                <td>ระงับการใช้งาน</td>
                <td></td>
            </tr>
        </thead>
            <?php
            while ($row = $result->fetch_assoc()) { ?>
                <form action="updateuser.php" method="GET">
                    <tr>
                        <?php $id_user = $row['id_user']; ?>
                        <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
                        <td><?php echo $row['id_user'] ?></td>
                        <td><?php echo $row['u_user'] ?></td>
                        <td><?php echo $row['name_role'] ?></td>
                        <?php $status = $row['status_user'];
                        if ($status == "1") { ?>
                            <td><input type="radio" name="status" checked value="1"></td>
                            <td><input type="radio" name="status" value="0"></td>
                        <?php
                        } else { ?>
                            <td><input type="radio" name="status" value="1"></td>
                            <td><input type="radio" name="status" checked value="0"></td>
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