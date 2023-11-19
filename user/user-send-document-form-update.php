 

<div class="header">
    <p>ส่งเอกสารให้ผู้ใช้งานคนอื่น</p>
</div>
<hr>
<div>
    <form action="user-send-document-update.php" method="POST" enctype="multipart/form-data">
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
                <?php
            include_once('../backend/db.php');
            $id_doc = $_GET['id_doc'];
            $id_user = $_GET['id_user'];
            $id_user_re = $_GET['id_user_re'];

            ?>
            
            <?php
            $sql = "SELECT * 
            FROM sender_user,user,type_doc,doc,dep 
            WHERE  sender_user.id_user_re = user.id_user
            AND     sender_user.id_doc = doc.id_doc
            AND     doc.id_type = type_doc.id_type 
            AND		user.id_dep = dep.id_dep
            AND     sender_user.id_doc LIKE '$id_doc'
            AND     sender_user.id_user LIKE '$id_user'
            AND     sender_user.id_user_re LIKE '$id_user_re'";

            $result = $conn->query($sql);
            if($row = $result->fetch_assoc()) { 
                $id_user_temp = $row['id_user'];
?>
               
                <td><label>เรื่อง</label></td>
                <td><input type="text" value="<?php echo $row['name_doc']; ?>" name="name_doc" />
                </td>
            </tr>
            <tr>
                <td><label>รายละเอียด</label></td>
                <td><input type="text" value="<?php echo $row['detail_doc']; ?>" name="detail_doc" /></td>
            </tr>
            <tr>
                <td><label>เลือกไฟล์ที่ต้องการส่ง</label></td>
                <td><input type="file" value="fileToUpload" name="fileToUpload" /></td>
            </tr>
            <tr>
                <td><label>เลือกผู้ใช้ที่ต้องการส่ง</label></td>
                <td>
                <select name="id_user_re" multiple>
                <?php 
                    include_once('../backend/db.php');
                    $sql = "SELECT  * FROM user";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        if($id_user_temp == $row['id_user']){
                ?>
                    <option selected value="<?php echo $row['id_user']  ?>"><?php echo $row['fname_user'] ?></option>
                    <?php }else { ?>
                        <option  value="<?php echo $row['id_user']  ?>"><?php echo $row['fname_user'] ?></option>
                    <?php } }?>
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
    $id_user_re = $_POST['id_user_re'];

    if($_FILES['fileToUpload']['name'] == null){

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


    $sql31 = "INSERT INTO sender_user(id_user,id_user_re,id_doc,date_send,status_read,status_send,status_dep,date_read)
    VALUES('$id_user','$id_user_re','$id_doc',(now()),'0','0','0',null)";

    $stmt = $conn->prepare($sql31);
    if (!$stmt->execute()) {
        echo "Error inserting data into database: " . $stmt->error;
        exit;
    }

    // Success message
    echo "File uploaded successfully";

}else {

    $sql = "UPDATE  doc 
            SET name_doc = '$name_doc',
                detail_doc = '$detail_doc',
                id_type = '$id_type',
            WHERE id_doc like '$id_doc'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
        }
    }
//     header("Location: index.php?menu=1");
// exit(0);
} 


?>
 </tbody>
    </table>
</div>