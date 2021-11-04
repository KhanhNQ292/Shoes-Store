<?php
 require_once 'models/userModel.php';
 $userDB = new userModel;
 $userDB->connect();

if (isset($_GET['action'])) {
    $action = $_GET['action'];


switch ($action) {
    case 'list':
        if (isset($_POST['search']))
        {
            $valueToSearch = $_POST['valueToSearch'];
            $userList = $userDB->filterTable($valueToSearch);
            if (!$userList)
            {
                $err = 'User said: Not found!';
                $userList = $userDB->getAllData('users');
                require_once 'views/users/userList.php';
                break;
            }
        }
        else {
            $table = 'users';
            $userList = $userDB->getAllData($table);
        }
        require_once 'views/users/userList.php';
        break;
    case 'updateRole':
        if (isset($_GET['id'], $_POST['role'])){
            $id = $_GET['id'];
            $role = $_POST['role'];
            $userDB->changeRole($id, $role);
        }
        header('Location: index.php?controller=userController&action=list');
        break;
    case'delete':
        if (isset($_POST['id']))
        {
            $id = $_POST['id'];
            $userDB->delete($id);
        }
        break;
}}