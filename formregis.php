<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regis</title>
    <link rel="stylesheet" href="frontend.css">
</head>
<body>
    <div>
        <p class="welcome">ระบบส่งเอกสารออนไลน์</p>
    </div>
    <div>
        <form action="regis.php" method="GET">
            
            <label>Username</label>
            <input type="text" value="" name="u_user" /><br>
            <label>Password</label>
            <input type="text" value="" name="p_user" /><br>
            <label>คำนำหน้า</label>
            <select name="pre_user">
                <option selected value="นาย">นาย</option>
                <option value="นางสาว">นางสาว</option>
                <option value="นาง">นาง</option>
            </select>
            <label>ชื่อ</label>
            <input type="text" value="" name="fname_user" />
            <label>นามสกุล</label>
            <input type="text" value="" name="lname_user" /><br>
            <label>email</label>
            <input type="text" value="" name="email_user" /><br>
            <label>Tel</label>
            <input type="text" value="" name="tel_user" /><br>
            <label>แผนก</label>
             <?php include_once('backend/db.php'); 
                $sql = "SELECT *  FROM   dep";
                $stmt = $conn->prepare($sql); 
                $stmt->execute();
                $result = $stmt->get_result();
                ?>
            <select name="id_dep">
                <?php while($row = $result->fetch_assoc()){ ?>
                <option selected value="<?php echo $row['id_dep']; ?>">
                <?php  echo $row['name_dep']; ?></option>
                <?php } ?>
            </select>
           
            <br>
            <input type="submit" value="ลงทะเบียน" name="regis" />
        </form>
    </div>
</body>
</html>