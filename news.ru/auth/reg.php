<?php
	require "../db.php";

	$data = $_POST;
	if (isset($data['do_reg']))
	{

		$errors = array();

		if (trim($data['username']) == '') 
		{
			$errors[] = 'Введите Ник';
		}

		if (trim($data['login']) == '') 
		{
			$errors[] = 'Введите Логин';
		}

		if ($data['password'] == '') 
		{
			$errors[] = 'Введите Пароль';
		}


		if ($data['r_password'] != $data['password']) 
		{
			$errors[] = 'Повторный Пароль не верный';
		}

		if (R::count('users',"login = ?", array($data['login'])) > 0 ) 
		{
			$errors[] = 'Этот Логин занят';
		}

		if (R::count('users',"username = ?", array($data['username'])) > 0 ) 
		{
			$errors[] = 'Этот Ник занят';
		}

		if (empty($errors))
		{
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->password = $data['password'];
			$user->username = $data['username'];
			R::store($user);
			
		/*	$text = "<?php
    require ('db.php');
    require ('header.php');

?>
<html>

    <div class='content'>
	<div class='mid-content' style='width: 100%;'>
	    <h2 class='mid-title'>".$data['username']."</h2>
	    
	    <?php echo '<img src=".$ava." width='200px' height='200px' style='margin-left:20px; border-radius:10px;' />'; ?>
	    <p style='font-size: 25px; text-align: center;'><?php echo $login; ?></p>
</div>
</div>
</body>
</html>";
			
			$fp = fopen("./users/user_{$data['login']}.php", "w");
            fwrite($fp, $text);
            fclose($fp);*/
            
			echo'<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Вы <strong>зарегистрированы</strong>! <a href="/login.php" class="alert-link">Войдите</a></div>';
		} else 
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
	<title>Paradise Gamers - Выход</title>
</head>
<body>
<div class="login-menu">
<form method="POST" action="reg.php">
	<input type="text" name="username" placeholder="Ник" value="<?php echo @$data['username'] ?>" /><br>
	<input type="text" name="login" placeholder="Логин" value="<?php echo @$data['login'] ?>" /><br>
	<input type="password" name="password" placeholder="Пароль"  /><br>
	<input type="password" name="r_password" placeholder="Повтор пароля"  /><br>
	<button type="submit" name="do_reg">Регистрация</button>
</form>
<a href="/">Назад</a>
</div>
</body>
</html>