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

<body>
    <div>
    
        <br>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
               
                    <h1>Update Profile</h1>
                    <form class="update" method="post" action="index.php?controller=updateProfileController&action=update"
                          oninput='pass2.setCustomValidity(pass2.value != pass1.value ? "Passwords do not match." : "")'>
                         <div class="form-group">
                             <label>Name:</label>
                            <input type="name" class="form-control" name="name" value="<?php echo $user['name'] ?>">

                        </div>

                        <div class="form-group">
                             <label>Email:</label>
                            <input type="@email" class="form-control" name="email" value="<?php echo $user['email'] ?>">
                        </div>
                        <div class="form-group">
                             <label>Password:</label>
                            <input type="password" class="form-control" name="password" value="<?php echo $user['password'] ?>">
                        </div>
                        <div class="form-group">
                             <label>New Password:</label>
                            <input type="password" class="form-control" class='pass1' name="pass1" pattern=".{6,}">
                        </div>
                        <div class="form-group">
                             <label>Re-enter password:</label>
                            <input type="password" class="form-control" class='pass2' name="pass2" pattern=".{6,}">
                        </div>
                        <div class="form-group">
                             <label>Address:</label>
                            <input type="address" class="form-control" name="address" value="<?php echo $user['address'] ?>">
                        </div>
                        <div class="form-group">
                             <label>Contact:</label>
                            <input type="contact" class="form-control" name="contact" value="<?php echo $user['contact'] ?>"  pattern="[0-9]{10}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary updateprofilebtn" value="Update">
                        </div> 
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <footer class="footer">
            <div class="container">

            </div>
        </footer>
    </div>
</body>

</html>