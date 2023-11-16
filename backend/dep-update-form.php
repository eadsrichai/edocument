<?php
    include_once('db.php');

    $sql = "SELECT * FROM dep WHERE id_dep =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_dep);
    $id_dep = $_GET['id_dep'];
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
    <div><p class="header-data">การจัดการหน่วยงานต่าง ๆ</p></div>
<hr>
        <div>
            <form action="dep-update.php" method="GET">
                <label>รหัสหน่วยงาน</label>
                <input type="text" size="5" readonly value="<?php echo $row['id_dep']; ?>" name="id_dep" /><br>
                <label>ชื่อหน่วยงาน</label>
                <input type="text" value="<?php echo $row['name_dep'];  ?>" name="name_dep" /> <br>
                <input type="submit" value="save" name="save" />
            </form>
        </div>
    </body>
<?php
    }
    $stmt->close();
    $conn->close();
    ?>

    </html>
