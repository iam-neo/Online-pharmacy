<?php 
require_once('../class/User.php');

if(isset($_POST['un'])){
	$un = $_POST['un'];
	$up = $_POST['up'];

	$up = md5($up);
	$result = $user->user_login($un, $up);
	if($result > 0){
		// echo 'succ';
		$return['logged'] = true;
		$return['url'] = "home.php";
		$_SESSION['logged_id'] = $result['user_id'];
		$_SESSION['logged_type'] = $result['user_type'];
		$_SESSION['uniqid'] = uniqid();
	}else{
		// echo 'fail';
		$return['logged'] = false;
		$return['msg'] = "Invalid Username or Password!";
	}

	echo json_encode($return);

}//end isset

$user->Disconnect();