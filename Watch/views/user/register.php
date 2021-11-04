<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ShopDongHo Website</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<div>
</div>
<div class="row">
    <div class="col-xs-4 col-xs-offset-4">

        <h1><b>Đăng Ký</b></h1>
        <p style="color:red"><?php
                if (isset($updatelog)) {
                    echo $updatelog;
                }
                ?> </p>
        <form action="index.php?controller=registerController&action=register" class="form" method="post"
              oninput='password.setCustomValidity(password.value !== repassword.value ? "Passwords do not match." : "")'>

        <div class="form-group">
            <label>Tên:</label>
            <input type="text" class="form-control" name="name" placeholder="name" required="true">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" placeholder="email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
        </div>
        <div class="form-group">
            <label>Mật Khẩu:</label>
            <input type="password" class="form-control" name="password" class='password' placeholder="password" pattern=".{6,}" >
        </div>
        <div class="form-group">
            <label>Xác nhận mât khẩu:</label>
            <input type="password" class="form-control" class='repassword' name="re-password" placeholder="re-password" pattern=".{6,}">
            </div>      
        <div class="form-group">
            <label>Số điện thoại:</label>

            <input type="tel" class="form-control" name="contact" placeholder="contact" required="true" pattern="[0-9]{10}">
        </div>
        <div class="form-group">
            <label>Địa chỉ:</label>
            <input type="text" class="form-control" name="address" placeholder="address" required="true">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Đăng Ký">
        </div>
        </form>
        
    </div>
</div>
</div>
<br><br><br><br><br><br>
<footer class="footer">
    <script>
        var checkbox = document.getElementById("toggle");
        var register = document.getElementById("register");
        register.disabled = true;
        checkbox.onchange = function() {
            register.disabled = !this.checked;
        }
    </script>
    </footer>

</html>