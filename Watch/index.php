<?php
session_start();
require_once 'models/userModel.php';
require_once'models/productModel.php';
$userDB = new userModel;
$userDB->connect();
$productDB = new productModel;
$productDB->connect();

require_once('views/header.php');
if (isset($_GET['controller']))
{
    $controller = $_GET['controller'];
    switch($controller){
        case 'userController':
            require_once 'controllers/userController.php';
            break;
        case 'loginController':
            require_once 'controllers/loginController.php';
            break;
        case 'updateProfileController':
            require_once 'controllers/updateProfileController.php';
            break;
        case 'searchItemController':
            require_once 'controllers/productController.php';
            break;
        case 'orderController':
            require_once 'controllers/orderController.php';
            break;
        case 'registerController':
        require_once 'controllers/registerController.php';
        break;
      case 'logoutController':
      require_once 'controllers/logoutController.php' ;
        break;
    case 'productController':
        require_once 'controllers/productController.php' ;
        break;
        case 'cartController':
            require_once 'controllers/cartController.php' ;
            break;
}
}else{
    $products = $productDB->getAllData('products');
    require_once('views/home.php');
}
?>


