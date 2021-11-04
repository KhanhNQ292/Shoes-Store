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

<br> <br>
<?php if($carts === 0 || count($carts) === 0) { ?>
    <h4 id="empty">Your cart has no items!</h4>
<?php }else { ?>
<?php
    $total = 0;
    foreach ($carts as $cart) {
        $total = $total +$cart['price']*$cart['quantity'];
    }
$_SESSION['total'] = $total;
?>
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
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ((array) $carts as $cart) {?>

            <tr  class="delete_mem<?php echo $cart['cart_id'] ?>" id="myTable">

                <td><?php echo $cart['product_id'] ?></td>
                <td><?php echo $cart['name'] ?></td>
                <td><?php echo $cart['size'] ?></td>
                <td><?php echo $cart['color'] ?></td>
                <td>
                    <div class="cart-info quantity">
                        <div class="btn btn-increment-decrement"
                             onClick="decrement_quantity(<?php echo $cart['cart_id']; ?>, '<?php echo $cart['price']; ?>')">-</div>
                        <input class="input-quantity"
                               id="input-quantity-<?php echo $cart['cart_id']; ?>" value="<?php echo $cart['quantity']; ?>">
                        <div class="btn btn-increment-decrement"
                             onClick="increment_quantity(<?php echo $cart['cart_id']; ?>, '<?php echo $cart['price']; ?>')">+</div>
                    </div>
                </td>
                <td>
                    <div class="cart-info price" id="cart-price-<?php echo $cart['cart_id']; ?>">
                        <?php echo  ($cart['totalPrice']) . 'VND' ; ?>
                    </div>
                </td>
                <td>
                    <a class="btn btn-danger" href="index.php?controller=cartController&action=list"  id="<?php echo $cart['cart_id'];?>">Remove</a>
                </td>

            </tr>
            </tbody>
        <?php }?>
        <thread>
           
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th id="th">Total Price:</th>
                <th id="th2"><span id="total-price"><?php echo $total ; ?> VND </span></th>
                <td> <a href="index.php?controller=orderController&action=add" class="btn btn-success"> Confirm </a></td>
            </tr>
        </thread>
        
    </table>
        <?php } ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-danger').click(function() {
            const id = $(this).attr("id");
            console.log(<?php echo $cart['cart_id']?>);
            if (confirm("Are you sure you want to remove this product?")) {
                $.ajax({
                    type: "POST",
                    url: "index.php?controller=cartController&action=delete",
                    data: {id: id},
                    cache: false,
                    success: function(html) {
                        $(".delete_mem" + id).fadeOut('slow');
                    }
                });
            } else {
                return false;
            }
        });
    });
 </script>

 <script>
    function increment_quantity(cart_id, price) {
        var inputQuantityElement = $("#input-quantity-"+cart_id);
        var newQuantity = parseInt($(inputQuantityElement).val())+1;
        var newPrice = newQuantity * price;
        save_to_db( cart_id, newQuantity, newPrice);
    }

    function decrement_quantity(cart_id, price) {
        var inputQuantityElement = $("#input-quantity-"+cart_id);
        if($(inputQuantityElement).val() > 1)
        {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            var newPrice = newQuantity * price;

            save_to_db(cart_id, newQuantity, newPrice);
        }
    }

    function save_to_db(cart_id, new_quantity, newPrice) {
        var inputQuantityElement = $("#input-quantity-"+cart_id);
        var priceElement = $("#cart-price-"+cart_id);
        $.ajax({
            url : "index.php?controller=cartController&action=update",
            data :{cart: cart_id, new: new_quantity,newPrice: newPrice},
            type : 'post',
            success : function(response) {
                $(inputQuantityElement).val(new_quantity);
                $(priceElement).text("VND"+newPrice);
                var totalItemPrice = 0;
                $("div[id*='cart-price-']").each(function() {
                    var cart_price = $(this).text().replace("$","");
                    totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
                });
                $("#total-price").text(totalItemPrice);
            }
        });

    }
</script>
</body>
</html>
<style>
#th{
    text-align: right;
}
#th2{
    text-align: center;
}
#empty{
    text-align: center;
}
</style>