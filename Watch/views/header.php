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

<nav class="navbar navabar-fixed-top">
<div class="container">
        <div class="navbar-header">
             <a href="index.php" class="navbar-brand">HOME</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><div class="Search" >
                        <form action="index.php?controller=searchController&action=search" method="GET"style="padding: 14px 16px;" >
                            <table>
                                    <input type=hidden name="controller" value="searchItemController">
                                    <td><input type="text" name="keyword" placeholder="search.." > </td>
                                    <td><input type="submit" value="Search"></td>
                                </tr>
                                <div class="cntr">
                            </div>
                            </table>
                            <input type="hidden" name="action" value="search">
                        </form>
                    </div></li>
                  
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <li><a href="index.php?controller=orderController&action=myOrder"><span class="glyphicon glyphicon-log-out"></span> MY_Orders</a></li>
                    <li><a href="index.php?controller=cartController&action=list"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                    <li><a href="index.php?controller=updateProfileController&action=index"><span class="glyphicon glyphicon-cog"></span> Update Profile</a></li>
                    <li><a href="index.php?controller=loginController&action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php
                } else
                if (isset($_SESSION['admin'])){
                ?>
                    <li>
                            <li><a href="index.php?controller=registerController&action=index"><span class=" glyphicon  glyphicon-user">Add_User</a></li>
                            <li><a href="index.php?controller=userController&action=list"><span class=" glyphicon  glyphicon-user">Manage_Users</a></li>
                      </li>

                    <li>
                            <li><a href="index.php?controller=productController&action=add"><span class=" glyphicon  glyphicon-import">Add_New_Product</a></li>
                            <li><a href="index.php?controller=productController&action=list"><span class=" glyphicon  glyphicon-import">Manage_Products</a></li>
                    </li>
                    <li>
                        <a href="index.php?controller=orderController&action=list"><span class="glyphicon glyphicon-log-out"></span> Orders</a>
                    </li>
                    <li>
                        <a href="index.php?controller=loginController&action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                <?php }else{
                ?>
                    <li><a href="index.php?controller=registerController&action=index"><span class="glyphicon glyphicon-register"></span> Register </a></li>
                    <li><a href="index.php?controller=loginController&action=index"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php
                } ?>
            </ul>
        </div>
    </div>
</nav>
<style>
#myNavbar{
    margin-top: 5px; 
}
.glyphicon:hover{
    transform: 30%;
}
.navbar{
    background-color: #b5b8b2;
}
.hvr-grow:hover,
.hvr-grow:focus,
.hvr-grow:active {
    transform: scale(1.1);
}
.navbar-brand{
    display: inline-block;
    vertical-align: middle;
    transform: translateZ(0);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    backface-visibility: hidden;
    -moz-osx-font-smoothing: grayscale;
    transition-duration: 0.3s;
    transition-property: transform;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ; 
    margin-top: 5px; 
}

</style>


