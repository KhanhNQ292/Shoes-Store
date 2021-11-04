<?php
require_once 'models/cartModel.php';
$cartDB= new cartModel(); $cartDB->connect();
require_once  'models/userModel.php';
$userDB = new userModel(); $userDB->connect();
require_once  'models/orderModel.php';
$orderDB = new orderModel(); $orderDB->connect();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add':

                if ($_SESSION['user_id'] == '' || !isset($_SESSION['user']))
                {
                    ?>
                    <script>
                        window.alert("You need login by user account to add this product to cart");
                    </script>
                    <meta http-equiv="refresh" content="1;url=index.php" />
                    <?php
                }else {
                    $user_id = $_SESSION['user_id'];
                    $color = $_POST['colors'];
                    $size = $_POST['sizes'];
                    $quantity = $_POST['quantity'];
                    $product_id = $_GET['pid'];
                    $price = $_POST['price'] * $quantity;
                    ?>
                    <script>
                        window.alert("Added to cart!!!!");
                    </script>
                    <meta http-equiv="refresh" content="1;url=index.php" />
                    <?php
                    $cartDB->saveToCart($user_id, $product_id, $color, $size, $quantity, $price);
                }

            break;
        case 'update':
            if (isset($_POST['new'],$_POST['cart'], $_POST['newPrice'])){
            $newQuantity = $_POST['new'];
            $cart_id = $_POST['cart'];
            $newPrice=$_POST['newPrice'];
            $cartDB->update($cart_id,$newQuantity,$newPrice);}
            break;
        case 'delete':
            if (isset($_POST['id']))
            {
                $cart_id = $_POST['id'];
                $cartDB->delete($cart_id);
                
            }
            break;
        case 'list':
            $user_id =$_SESSION['user_id'];
            $carts = $cartDB->getDataByUser($user_id);
            require_once 'views/carts/cartViewDetail.php';
            break;

    }

}
?>