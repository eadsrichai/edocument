<?php session_start(); 
if(isset($_SESSION['u']) 
&& $_SESSION['u'] != null 
&& isset($_SESSION['p']) 
&& $_SESSION['p'] != null){
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssuser.css">
    <title>ระบบส่งเอกสารออนไลน์</title>
</head>

<body>
    <section id="page">
        <header>
            <?php include_once('menu-top.php'); ?>
            
        </header>
        <nav>
            <?php include_once('menu-left.html'); ?>
        </nav>
        <main>
            <?php include_once('main-data.php'); ?>
        </main>
        <footer>
            <?php include_once('footer.html'); ?>
        </footer>
    </section>
</body>

</html>


<?php } ?>