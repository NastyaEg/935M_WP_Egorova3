<?php
	include_once "lib.inc.php";
	//logining handler
	if (isset($_POST['login']) && isset($_POST['password']))
	{
		$login = clearData($_POST['login']);
    	$password = clearData($_POST['password']);
    	ini_set('session.save_path', getcwd());
		session_start(); 
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['user_login'] = $login;
		$goal = $_SESSION['goal_url'];
		unset($_SESSION['goal_url']);
		header("Location: http://".$_SERVER['HTTP_HOST'].$goal);
		exit;
	}
?>

	<h2><p>Вход в систему</p></h2>
	<form method="POST" action="auth.php">
		<p>Логин:</p><p><input type="text" name="login"></p>
		<p>Пароль:</p><p><input type="password" name="password"></p>
		<p><input type="submit"></p>
	</form>

	

