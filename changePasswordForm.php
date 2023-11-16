<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chang  Password</title>
</head>
<body>
    <?php    include_once('header.html');       ?>
    <form action="changePassword.php" method="GET">
        <label>รหัสผ่านเดิม</label>
        <input type="text" value="" name="p_memOld"/><br>
        <label>รหัสผ่านใหม่</label>
        <input type="text" value="" name="p_memNew"/><br>
        <input type="submit" value="เปลี่ยนรหัสผ่าน" name="changPassword" />
    </form>
</body>
</html>