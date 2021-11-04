<?php

require_once 'models/userModel.php';
$userDB = new userModel;
$userDB->connect();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case 'index':

        require_once 'views/user/register.php';
        break;
    case 'register':

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $contact = $_POST["contact"];
        $address = $_POST["address"];
        if ($userDB->checkEmail($email)) {
            $updatelog = "Email Existed!";
        } else {
            $userDB->register($name, $email, ($password), $contact, $address, 'user');
            $updatelog = "Register Successfully";
        }
        require_once("views/user/register.php");
        break;
}
