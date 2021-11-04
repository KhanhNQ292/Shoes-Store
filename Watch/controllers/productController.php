<?php

require_once 'models/productModel.php';
$productDB = new productModel;
$productDB->connect();
require_once 'models/searchToolModel.php';
$searchTool = new searchToolModel();
$searchTool->connect();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
};


switch ($action) {
    case 'index':
        $product = $productDB->getDataById($_GET['pid']);
        require_once 'views/products/product.php';
    break;
    case 'search':
            if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $arrs = $searchTool->searchData($keyword);
                require_once('views/searchItem.php');
                //require_once('views/productListview.php');
                break;
            }

     //manage product
    case 'add':
    {
        require_once 'views/products/productAdd.php';
        break;
    }
    case 'store':
        if (isset($_POST['add']))
        {
            $v1 = rand(1111, 9999);
            $v2 = rand(1111, 9999);
            $v3 = $v1 . $v2;
            $v3 = md5($v3);
            $fnm = $_FILES["image"]["name"];
            $dst = "./images/" . $v3 . $fnm;
            $image = "images/" . $v3 . $fnm;

            $id = trim($_POST["id"]);
            $name = trim($_POST["name"]);
            $price = trim($_POST["price"]);
            //validate
            $err = array();
            if (empty($id)) $err['id']='Please fill id';
            else {
                if(!is_numeric($id))
                    $err['id']='ID must be numeric';
                else if($productDB->getDataById($id) != '')
                    $err['id'] = 'ID already exists';
            }
            if (empty($name)) $err['name']='Please fill name';
            if (empty($price)) $err['price']='Please fill price';
            else {
                if (!is_numeric($price))
                    $err['price']='Price is invalid';
            }
            if (empty($fnm )) $err['image']='Please choose image';
            if (!$err) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $dst);
                $productDB->insertData($id, $name, $image, $price);
                header('location: index.php?controller=productController&action=list');
            } else
            {
                require_once  'views/products/productAdd.php';
            }
        }
        break;
    case 'edit':
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
            $product = $productDB->getDataById($id);
        }
        require_once 'views/products/productEdit.php';
        break;
    case 'update':
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
            if (isset($_POST['update']))
            {
                $name = trim($_POST["name"]);
                $price = trim($_POST["price"]);
                $fnm = $_FILES["images"]["name"];
                //validate
                $err = array();
                if (empty($name)) $err['name']='Please fill name';
                if (empty($price)) $err['price']='Please fill price';
                else {
                    if (!is_numeric($price))
                        $err['price']='Price is invalid';
                }
                if (!$err) {
                    if ($fnm == "") {
                        $productDB->updateData1($id, $name, $price);
                    } else {
                        $v1 = rand(1111, 9999);
                        $v2 = rand(1111, 9999);
                        $v3 = $v1 . $v2;
                        $v3 = md5($v3);
                        $dst = "./images/" . $v3 . $fnm;
                        $image = "images/" . $v3 . $fnm;
                        move_uploaded_file($_FILES["images"]["tmp_name"], $dst);
                        // delete image
                        $product = $productDB->getDataById($id);
                        unlink($product['image']);
                        $productDB->updateData( $id, $name, $image, $price);
                    }
                    header('location: index.php?controller=productController&action=list');
                }
                else {
                    $product = $productDB->getDataById($id);
                    require_once 'views/products/productEdit.php';
                }
            }
        }
        break;
    case 'delete':
        if (isset($_POST['id']))
        {
            $id = $_POST['id'];
            //delete image
            $product = $productDB->getDataById($id);
            unlink($product['image']);
            $productDB->delete($id);
        }
        break;
    case 'list':
        if (isset($_POST['search']))
        {
            $valueToSearch = $_POST['valueToSearch'];
            $productList = $productDB->filterTable($valueToSearch);
            if (!$productList)
            {
                $err = ' Product said: Not found!';
                $table = 'products';
                $productList = $productDB->getAllData($table);
                require_once 'views/products/productList.php';
                break;
            }
        }
        else {
            $table = 'products';
            $productList = $productDB->getAllData($table);
        }
        require_once 'views/products/productList.php';
        break;
}

