<?php
require "../db.php";

	$data = $_POST;
	if(isset($data['do_login']))
	{
		$errors = array();
		$user = R::findOne('users','login = ?', array($data['login']));
		if($user)
		{
			if($data['password'] == $user->password)
			{
				$_SESSION['logged_user'] = $user;
				header('location: /');
			}else
			{
				$errors[] = 'Неправильный Пароль';
			}
		}else
		{
			$errors[] = 'Неправильный Логин';
		}

		if (!empty($errors))
		{
			echo'<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'.array_shift($errors).'</strong></div>';
		}
	}

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style_v2.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Paradise Gamers - Вход</title>
</head>
<body>
<div class="login-menu">
<form method="POST" action="login.php">
	<input type="text" name="login" placeholder="Логин" value="<?php echo @$data['login'] ?>" /><br>
	<input type="password" name="password" placeholder="Пароль"  /><br>
	<button type="submit" name="do_login">Вход</button>
</form>
<a href="/">Назад</a>
</div>
</body>
</html>