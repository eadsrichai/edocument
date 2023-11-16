
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
    <link rel="stylesheet" href="dashboard.css">
    <title>ระบบรับส่งเอกสารออนไลน์</title>
</head>

<body>
    <div class="container">
        <div> 
            <?php   include_once('top-menu.html') ?>
        </div> 

        <div class="section-container"> 
            <div class="section-container-left"> 
                <?php   include_once('left-menu.html') ?>
            </div> 
            <div class="section-container-right">    
                <div style="padding:30px"> 
                <?php
            if (isset($_GET['menu'])) {
                $menu = $_GET['menu'];
                if($menu == null){ $menu = '1';}
                    switch($menu){
                    case '1': include_once('managementuser.php'); break;
                    case '11': include_once('user-update-form.php'); break;
                    case '2': include_once('managementdocument.php'); break;
                    case '21': include_once('type-update-form1.php'); break;
                    case '22': include_once('type-update-add-type-doc.php'); break;
                    case '3': include_once('managementdep.php');  break;
                    case '31': include_once('dep-update-form.php');  break;
                    case '32': include_once('dep-add-form.php');  break;
                    case '4': include_once('showsenderdocument.php');  break;
                    case '5': include_once('searchdocument.php');  break;
                    case '6': include_once('changePasswordForm.php');  break;
                    default : 
                    }
                }
                ?>
                </div>
            </div> 
        </div> 
            
        <div class="footer">
            <?php   include_once('footer.php') ?>
        </div>
    </div>
</body>

</html>

<?php  }else {
      header( "location: ../login.php" );
      exit(0);
 } ?>