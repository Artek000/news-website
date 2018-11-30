<?php 
	require_once ("db.php");
	$query = "SELECT * FROM `users` WHERE login = '{$_SESSION['logged_user']->login}'";
    $res = mysqli_query($dbh,$query);
	while($row = mysqli_fetch_array($res))
        {
		$ava = $row['img'];
        $ee = $row['is_admin'];
        $banned = $row['is_banned'];
        }
	if($banned == 1){
		header('location: /ban.php');
	}

?>	
	<head>
		<meta charset="utf-8" />
		<meta name="yandex-verification" content="902f9b6a9b2280b6" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name = "description" content = "Paradise Gamers - Новостной портал для геймеров, где вы можете найти все свежие новости про новинки в игровой индустрии!" />
  		<meta name = "keywords" content = "paradise, gamer, gamers, ru, game, news, gamenews, читы, для, кс, го, cs:go, cs, go, warface, dota, gabe, newell, новости, портал, парадайс, геймерс, игры, гейминг, форум, forum, Paradise, Gamers, paradise-gamers" />
  		<meta name = "robots" content = "index,follow" />
		<title>Paradise Gamers - Новостной портал для геймеров</title>
		<link rel="shortcut icon" href="../images/avatar.png">
		<style>
            @font-face {
                font-family: "usual-text"; /* Гарнитура шрифта */
                font-weight: 400px;
                src: url(/fonts/usual-text.ttf); /* Путь к файлу со шрифтом */
            }
        </style>

        <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="../chat/style-chat.css">
		<link rel="stylesheet" href="/js/jquery.lightbox.css">
		<link rel="stylesheet" href="/css/style_v2.css">
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?130"></script>
		<script type="text/javascript">VK.init({apiId: 5651250, onlyWidgets: true});</script>
		
        <script type="text/javascript" src="/libs/jquery.js"></script>
        <script type="text/javascript" src="/js/lightbox.js"></script>
        <script type="text/javascript" src="/js/send_msg.js"></script>
        <!--Снег  <script type="text/javascript" src="/js/snow.js"></script> Конец-->      

	</head>
	

	<body>
	<div class="header">
		<div class="head-img"><a href="/"><img id="head-image" src="/images/header-winter.png" /></a></div>
		<div class="head-menu">
			<ul>

				<li><a href="/">Главная</a>
		    	<!--<ul>
						<li><a href="/">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
					</ul> -->
				</li>

				<li><a href="#">Игровая</a>
					<ul>
						<li><a href="/game_1/game_1.php">Bubble Shooter</a></li>
						<li><a href="/game_2/game_2.php">Cut The Rope</a></li>
						<li><a href="#">3</a></li>
					</ul>
				</li>

				<li><a href="#">Контакты</a>
					<ul>
						<li><a href="/chat/chat-index.php">Чат</a></li>
						<li><a href="/call/back-call.php">Создать заявку</a></li>
						<li><a href="/support/">Мои заявки</a></li>
					</ul>
				</li>

				<li><a href="/galery">Галерея</a>
					<!--<ul>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
					</ul>-->
				</li>				
			</ul>

			<?php if(isset($_SESSION['logged_user']) ) : ?>
			
				<div class="user-menu">
     
     <?php 
     
         if($ee==1)
            {echo '<a href="/admin_menu/admin-index.php" id="admin-m">Админ-Панель</a></br>';} ?>
            <?php echo "<a href='/profile.php' style='float: left;'><img id='ava' src='$ava' width='50px' height='50px' /></a>"; ?>
			<p id="user-menu-info"><?php $query_currUsername = mysqli_query($dbh,"SELECT username FROM users WHERE login = '{$_SESSION['logged_user']->login}'"); while($row_nick = mysqli_fetch_array($query_currUsername)) $curr_nick .= $row_nick['username']; if(strlen($curr_nick) <= 8){ echo "<a href='../profile.php' style='' id='nickname'>{$curr_nick}</a>";} else {$nick = substr($curr_nick,0,8); echo "<a href='../profile.php' style='' >{$nick}...</a>";} ?></p></br>				
			<a href="../auth/logout.php" id="logout-b">Выйти</a>
				
				</div>

			<?php else : ?>
			<div class="login-b"><a href="../auth/login.php">Войти</a></div>
			<div class="reg-b"><a href="../auth/reg.php">Регистрация</a></div>
			<?php endif; ?>
		
		</div>
	</div>