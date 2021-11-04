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

<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="bootstrap/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="bootstrap/js/DT_bootstrap.js"></script>

<body>

<div>
    <?php
    require_once 'views/header.php';
    ?>
</div>
<br>
<div>
    <article><h3>Information of order <?php echo $orderDetail['order_id']?></article>
    <p><b>Name:</b> <?php echo $orderDetail['name']?></p>
    <p><b>Phone:</b> <?php echo $orderDetail['phone']?></p>
    <p><b>Address:</b> <?php echo $orderDetail['address']?></p>
    <p><b>Method:</b> <?php echo $orderDetail['method']?></p>
    <p><b>Total:</b> $<?php echo $orderDetail['total']?></p>
    <p><b>Status:</b> <?php echo $orderDetail['status']?></p>
</div>
<br> <br>
<div class="container">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th >Product ID</th>
            <th> Product Name</th>
            <th> Size</th>
            <th> Color </th>
            <th> Quantity</th>
            <th> Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ((array) $details as $detail) {?>
            <tr >
                <td><?php echo $detail['product_id'] ?></td>
                <td><?php echo $detail['name'] ?></td>
                <td><?php echo $detail['size'] ?></td>
                <td><?php echo $detail['color'] ?></td>
                <td><?php echo $detail['quantity'] ?></td>
                <td>$<?php echo $detail['totalPrice'] ?></td>
            </tr>

        <?php }?>
        </tbody>
    </table>
</div>


</body>
</html>