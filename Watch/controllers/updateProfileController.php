<?php

require_once 'models/userModel.php';
$userDB = new userModel;
$userDB->connect();


if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {

    case 'index':
        $user = $userDB->getDataById($_SESSION['user_id']);
        require_once 'views/user/updateProfile.php';
        break;
    case 'update':
        $name = $_POST["name"];
        $email = $_POST["email"];
        if($_POST["pass1"]==''){
                $password = $_POST["password"];
        }else{
            $password = md5($_POST["pass1"]);}
            
		if (strlen($password) < 6) {
			$err = "Wrong password!";
		}
        $contact = $_POST["contact"];
        $address = $_POST["address"];
        $test = $userDB->updateData($name, $email, $password, $contact, $address,$_SESSION['user_id']);
        ?>
        <script>
            window.alert("Your profile has been updated.");
        </script>
        <meta http-equiv="refresh" content="1;url=index.php" />
        <?php
      
        
        } 

