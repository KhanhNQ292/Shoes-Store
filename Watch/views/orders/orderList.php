<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Catholic Uniforms Websites</title>
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
<div class="table-responsive-md">
    <form action="index.php?controller=orderController&action=list" method="post">
        <div class="active-pink-3 active-pink-4 mb-4">
            <label><input  class="form-control"  type="text" name="valueToSearch" placeholder="Value To Search"></label>
            <button type = "submit" name="search" class="btn btn-info">Search</button>
        </div>

        <p><font color = 'red'><?php if(isset($err))  echo $err;?> </font></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th >Order ID </th>
                <th> Name</th>
                <th> Phone </th>
                <th> Address </th>
                <th> Created at </th>
                <th> Total Money</th>
                <th> Payment Method</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ((array) $orderList as $order) {?>
                <tr class="update_mem<?php echo $order['order_id'] ?>">
                    <td><?php echo $order['order_id'] ?></td>
                    <td><?php echo $order['name'] ?></td>
                    <td><?php echo $order['phone'] ?></td>
                    <td><?php echo $order['address'] ?></td>
                    <td><?php echo $order['created_at'] ?></td>
                    <td><?php echo $order['total'] ?></td>
                    <td><?php echo $order['method'] ?></td>
                    <td>
                        <form action = "index.php?controller=orderController&action=updateStatus&id=<?php echo $order['order_id'] ?>" method ="POST">
                            <label>
                                <select name="status"  >
                                    <option selected disabled>_current_<?php echo $order['status']?>_</option>
                                    <option value="unprocessed">unprocessed</option>
                                    <option value="processed">processed</option>
                                    <option value="delete">delete</option>

                                </select>
                            </label>
                            <button type="submit" class="btn btn-success" href="index.php?controller=orderController&action=updateStatus&id=<?php echo$order['order_id'] ?>"> Update </button>
                        </form>
                    </td>
                    <td> <a href="index.php?controller=orderController&action=show&id=<?php echo $order['order_id']?>" class = 'btn btn-info' >View</a></td>

                </tr>

            <?php }?>
            </tbody>
        </table>
        <form>
</div>

</body>

</html>
<style>.active-pink-4 input[type=text]:focus:not([readonly]) {
        border: 1px solid #f48fb1;
        box-shadow: 0 0 0 1px #f48fb1;
    }
    .box {
        float: left;
    }
</style>