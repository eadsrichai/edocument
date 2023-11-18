<div class="header">
    <p>ส่งเอกสารให้ผู้ใช้งานคนอื่น</p>
</div>
<hr>
<div>
    <form action="index.php?menu=2" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label>ประเภทเอกสาร</label></td>
                <td>
                    <select name="id_type">
                <?php 
                    include_once('../backend/db.php');
                    $sql = "SELECT  * FROM type_doc";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['id_type']  ?>"><?php echo $row['name_type'] ?></option>
                    <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>เรื่อง</label></td>
                <td><input type="text" value="" name="name_doc" />
                </td>
            </tr>
            <tr>
                <td><label>รายละเอียด</label></td>
                <td><input type="text" value="" name="detail_doc" /></td>
            </tr>
            <tr>
                <td><label>เลือกไฟล์ที่ต้องการส่ง</label></td>
                <td><input type="file" value="fileToUpload" name="fileToUpload" /></td>
            </tr>
            <tr>
                <td><label>เลือกผู้ใช้ที่ต้องการส่ง</label></td>
                <td>
                <select name="id_dep_re" multiple>
                <?php 
                    include_once('../backend/db.php');
                    $sql = "SELECT  * FROM dep";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['id_dep']  ?>"><?php echo $row['name_dep'] ?></option>
                    <?php } ?>
                    </select>
                </td>
                <tr>
                    <td><input type="submit" value="ส่งไฟล์" name="upload" /></td>
                </tr>
                

        </table>
    </form>

</div>
<br>
<hr>
<?php
if (isset($_POST['upload']) && $_POST['upload'] == "ส่งไฟล์") {
    $id_type = $_POST['id_type'];
    $name_doc = $_POST['name_doc'];
    $detail_doc = $_POST['detail_doc'];
    $id_user = $_SESSION['id_user'];
    $id_dep_re = $_POST['id_dep_re'];


    if ($_FILES['fileToUpload']['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file: " . $_FILES['fileToUpload']['error'];
        exit;
    }

    // Get file information
    $fileName = $_FILES['fileToUpload']['name'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileType = $_FILES['fileToUpload']['type'];

    // Check allowed file types
    $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
    if (!in_array($fileType, $allowedFileTypes)) {
        echo "Invalid file type";
        exit;
    }

    // Check file size limit
    $maxSize = 1024 * 1024 * 5; // 5MB
    if ($fileSize > $maxSize) {
        echo "File is too large";
        exit;
    }

    // Generate a unique filename
    $uniqueFileName = uniqid() . '_' . $fileName;

    // Upload the file to the uploads directory
    $uploadDir = '../backend/data/';
    if (!move_uploaded_file($fileTmpName, $uploadDir . $uniqueFileName)) {
        echo "Failed to upload file";
        exit;
    }

    include_once('../backend/db.php');

    $sql1 = "INSERT INTO doc(name_doc,detail_doc,id_type,file)
    VALUES('$name_doc','$detail_doc','$id_type','$uniqueFileName')";


    $stmt = $conn->prepare($sql1);
  
    // $stmt->bind_param("sss", $uniqueFileName, $fileType, $fileSize);
    if (!$stmt->execute()) {
        echo "Error inserting data into database: " . $stmt->error;
        exit;
    }

    $id_doc = "";
    $sql2 = "SELECT MAX(id_doc) as docmax FROM doc";
    $result = $conn->query($sql2);
    if($row = $result->fetch_assoc()) {
        $id_doc = $row['docmax'];
    }

    echo $id_doc;

    // $sql22 = "SELECT   user.id_user,user.fname_user,dep.name_dep
    // FROM user,dep
    // WHERE user.id_dep = dep.id_dep
    // AND user.id_dep   LIKE '$id_dep_re'";

    // $result = $conn->query($sql22);
    
    // while($row = $result->fetch_assoc()) {
    //     $id_user = $row['id_user'];
    //     echo $id_user;
    // }
    

    $sql3 = "INSERT INTO sender_dep(id_user,id_dep_re,id_doc,date_send,status_read,status_send)
    VALUES('$id_user','$id_dep_re','$id_doc',current_timestamp(),'0','0')";

    $stmt = $conn->prepare($sql3);
    if (!$stmt->execute()) {
        echo "Error inserting data into database: " . $stmt->error;
        exit;
    }

    // Close the database connection
    // $conn->close();

    // Success message
    echo "File uploaded successfully";
}
?>
<div>
    <table style="width: 80%;">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อเรื่อง</th>
                <th>วันที่ส่ง</th>
                <th>ประเภท</th>
                <th>ผู้รับ</th>
                <th>สถานะ</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

<?php
// include_once('../backend/db.php');
$id_user = $_SESSION['id_user'];
echo $id_user;
$sql = "SELECT  sender_dep.id_dep_re,sender_dep.date_send,
sender_dep.status_read,dep.name_dep,
type_doc.name_type ,doc.name_doc
FROM user,sender_dep,type_doc,doc,dep
WHERE  sender_dep.id_dep_re = dep.id_dep
AND   sender_dep.id_doc = doc.id_doc
AND    doc.id_type = type_doc.id_type
AND    sender_dep.id_user = user.id_user
AND    sender_dep.id_user LIKE  '$id_user'";


$result = $conn->query($sql);
$i = 1;

while ($row = $result->fetch_assoc()) {

?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['name_doc']; ?></td>
                <td><?php echo $row['date_send']; ?></td>
                <td><?php echo $row['name_type']; ?></td>
                <td><?php echo $row['name_dep']; ?></td>
                <td><?php if ($row['status_read'] == '0') {
                            echo "ยังไม่อ่าน";
                        } else {
                            echo "อ่านแล้ว";
                        }; ?></td>
                <td><a href="">ยกเลิกการส่ง</a></td>
                <td><a href="">แก้ไขการส่ง</a></td>
            </tr>
       


<?php
}

?>
 </tbody>
    </table>
</div>