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


<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0123456789</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
                    </div>
                    <div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
        <body>

    <div>
        <?php
        ?>
        <div class="banner" style="padding:30px; text-align:center;">
        <div class="banner-content">
    <h1>SHOPDONGHO.COM </h1>
    <h2>Chào mừng bạn đến với trang website đồng hồ số 1 Hà Nội! </h2>
    
</div>
</div>
    </div>
    </div>
            
            <div class="product-box-container">
                    <?php foreach ($products as $product) { ?>
                        <div class="col-md-4 product">

                                <a href="index.php?controller=productController&pid=<?php echo $product['product_id'] ?>&action=index">
       
                                    <img src="<?php echo $product['image'] ?>" alt="" height="150" />
                                </a>
                                    <div class="product-title">
                                            <h2><?php echo $product['name'] ?></h2>
                                        </div>
                                        <div class="product-price">
                                            <p>Price:<?php echo $product['price'] ?>VND</<p>
                                        </div>
                                    </div>

                                <?php } ?>
                                </div>


                                <br><br><br><br><br><br><br><br>

                            </div>
                            </footer>
                        </div>
</body>


</html>
<style>


.product-price{
    padding-bottom: 60px;
}
.product img {
    box-shadow: 1px 1px 1px black;
    height: 300px;
    width:70%;
}
.product-price{
   position:absoulte;
   bottom:100px;
   right:15px;
   color:Olive ;
   font-size:18px;
}

h2{
  font-font-family: 'La Belle Aurore', cursive;
  
  font-size: 30px;
  color: DimGray ;
  padding-bottom: 10%;
}
  h1{
      font-size: 100px;
    margin-top: 100px;      
    font-family:'Vast Shadow',  cursive, sans-serif;
    color: darkred   ;
    text-align: center;
    
   }
    p {
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        color: black;

    }
</style>

