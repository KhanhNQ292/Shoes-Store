<?php
require_once 'models/orderModel.php';
require_once 'models/userModel.php';
require_once  'models/cartModel.php';
require_once  'models/productModel.php';

$userDB = new userModel();       $userDB->connect();
$orderDB = new orderModel();     $orderDB->connect();
$cartDB = new cartModel();       $cartDB->connect();
$productDB = new productModel(); $productDB->connect();

if (isset($_GET['action']))
{
    $action = $_GET['action'];
    switch ($action) {
        case 'add':
            $user = $userDB->getDataById($_SESSION['user_id']);
            require_once 'views/orders/order_Form.php';
            break;
        case 'list':

            if (isset($_POST['search'])) {
                $valueToSearch = $_POST['valueToSearch'];
                $orderList = $orderDB->filterTable($valueToSearch);
                if (!$orderList) {
                    $err = ' Order said: Not found!';
                    $table = 'orders';
                    $orderList= $orderDB->getAllData($table);
                    require_once 'views/orders/orderList.php';
                    break;
                }
            } else {
                $table = 'orders';
                $orderList = $orderDB->getAllData($table);
            }
            require_once 'views/orders/orderList.php';
            break;
        case 'store':
            if (isset($_POST['complete'])) {
                $name =(string)$_POST['name'];
                $phone =(string) $_POST['phone'];
                $address = (string) $_POST['address'];
                $method = (string)$_POST['method'];
                //validate
                $err = array();
                if (empty($name)) $err['name'] = 'Please fill name';
                if (empty($phone)) $err['phone'] = 'Please fill phone';
                elseif (!is_numeric($phone)){
                        $err['phone'] = 'Wrong type phone number';
                }
                if (empty($address)) $err['address'] = 'Please fill address';
                if (empty($method)) $err['method'] = 'Please choose the payment method';

                if (!$err) {
                    $total=0;
                    $user_id = $_SESSION['user_id'];
                    $created_at = (string) date('Y-m-d,H:i:s');
                    $_SESSION['created_at']=$created_at;
                    $carts = $cartDB->getDataByUser($user_id);
                    foreach ($carts as $cart) {
                        $total += $cart['totalPrice'];
                    }
                    $orderDB->createOrder($user_id,$name,$phone,$address,$method,$total,$created_at);
                    $order = $orderDB->getOrderId($user_id,$created_at);
                    $_SESSION['order_id'] = $order['order_id'];
                    $cartDB->confirm($_SESSION['order_id'], $user_id);
                    ?>
                    <script>
                        window.alert("Order Placed. Click to continues browsing. Thanks!!");
                    </script>
                    <meta http-equiv="refresh" content="1;url=index.php"/>
                    <?php
                    $products = $productDB->getAllData('products');
                    require_once('views/home.php');
                }
            }
            break;
        case 'updateStatus':
            if (isset($_GET['id'], $_POST['status'])){
                $order_id = $_GET['id'];
                $status= $_POST['status'];
                $orderDB->updateStatus($order_id, $status);
            header('Location: index.php?controller=orderController&action=list');}
            break;
        case 'show':
            if(isset($_GET['id'])) {
                $order_id = $_GET['id'];

            }
                $orderDetail  = $orderDB->getDataById($order_id);
                $details= $orderDB->getDetailByID($order_id);
                require_once 'views/orders/show.php';
                break;

        case 'myOrder':
            $myOrders = $orderDB->myOrder($_SESSION['user_id']);
            require_once 'views/orders/myOrder.php';
            break;
    }
};
