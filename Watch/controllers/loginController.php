<?php require_once 'models/userModel.php';
$userDB = new userModel;
$userDB->connect();

if (isset($_GET['action'])) {
	$action = $_GET['action'];

switch ($action) {
	case 'index':
		require_once 'views/user/login.php';
		break;

	case 'login':
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		//check login
		$row = $userDB->login($email, $password );
		if( $row === 0){
			?>
			<script>
				window.alert("Wrong username or password");
			</script>
			<meta http-equiv="refresh" content="1;url=index.php?controller=loginController&action=index" />
			<?php

		}else{

			$row = $userDB->getDataByEmail($email);
			$_SESSION['email']=$email;
			$_SESSION['user_id']=$row['user_id'];
			if ($row['role'] === 'admin') {
			    $_SESSION['admin']=$row['role'];
                header('Location: index.php?controller=productController&action=list');
            }
			elseif ($row['role'] === 'user')
            {$_SESSION['user']=$row['role'];
			header('Location:index.php');	  //user id
		}}
		break;
		case 'logout':
			session_destroy();
			header('Location: index.php');
		break;

	}

}
?>

