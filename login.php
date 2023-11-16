<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="frontend.css">
</head>
<body>
    <?php session_start();?>
    <div>
        <p class="welcome">ระบบส่งเอกสารออนไลน์</p>
    </div>
    <div class="login">
        <form action="chkLogin.php" method="GET">
            <?php if( isset($_SESSION['error'])){ ?>
                <label style="color:red;"><?php  echo $_SESSION['error']; ?></label><br>
            <?php }   $_SESSION['error'] = null;?>
            <label>Username</label>
            <input type="text"  value="" name="u_user"/> <br>
            <label>Password</label>
            <input type="password" value="" name="p_user"/><br>
            <input type="submit" value="Login" name="Login"/>
        </form>
    </div>
</body>
</html>

