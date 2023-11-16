<?php
    include_once('db.php');
   
    $sql = "SELECT * FROM dep";
    $stmt = $conn->prepare($sql);
   
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
            <form action="" method="GET">
                <label>รหัสประเภทเอกสาร</label>
                <input type="text" size="5" readonly value="<?php echo $row['id_dep']; ?>" name="id_dep" /><br>
                <label>ชื่อประเภทเอกสาร</label>
                <input type="text" value="<?php echo $row['name_dep'];  ?>" name="name_dep" /> <br>
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
