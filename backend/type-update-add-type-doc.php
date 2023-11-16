<?php
    include_once('db.php');
    $id = $_GET['id_type'];
    $sql = "SELECT * FROM type_doc WHERE id_type =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_type);
    $id_type = $id;
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div>
            <form action="type-update.php" method="GET">
                <label>รหัสประเภทเอกสาร</label>
                <input type="text" size="5" readonly value="<?php echo $row['id_type']; ?>" name="id_type" /><br>
                <label>ชื่อประเภทเอกสาร</label>
                <input type="text" value="<?php echo $row['name_type'];  ?>" name="name_type" /> <br>
                <input type="submit" value="save" name="save" />
            </form>
        </div>
    </body>
   

<?php
    }
$stmt->close();
$conn->close();
    // header( "location: index.php?menu=2" );
    // exit(0);
?>

    </html>
