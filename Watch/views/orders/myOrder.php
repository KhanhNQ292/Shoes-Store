
<!DOCTYPE html>
<html>

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">

</head>
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
  <?php if( $myOrders === 0 || count($myOrders) === 0) {?>
    <h4 id="h4">You've never made a purchase before!</h4>
  <?php }else {?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th >Order ID </th>
                <th> Name</th>
                <th> Phone </th>
                <th> Address </th>
                <th> Created_at </th>
                <th> Total Money</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ((array) $myOrders as $order) {?>
                <tr class="update_mem<?php echo $order['order_id'] ?>">
                    <td><?php echo $order['order_id'] ?></td>
                    <td><?php echo $order['name'] ?></td>
                    <td><?php echo $order['phone'] ?></td>
                    <td><?php echo $order['address'] ?></td>
                    <td><?php echo $order['created_at'] ?></td>
                    <td>VND<?php echo $order['total'] ?></td>
                    <td><?php echo $order['status'] ?></td>
                    <td>
                        <a href="index.php?controller=orderController&action=show&id=<?php echo $order['order_id']?>" class = 'btn btn-info' >View</a></td>

                </tr>

            <?php }?>
            </tbody>
        </table>
<?php } ?>
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
    #h4{
        text-align: center;
        margin-top: 15px;
    }
</style>
