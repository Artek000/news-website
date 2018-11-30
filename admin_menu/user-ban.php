<?php
	require "../db.php";
	
	if(isset($_POST['ban_user'])){
		$qr = mysqli_query($dbh,"UPDATE users SET is_banned = '1' WHERE login = '{$_POST['ban_login']}'");
		echo"<script>alert('Пользователь забанен')</script>";
	}
	
?>
<html>
<?php require "../header.php"; ?>
<?php if($ee==1){}else{location.replace("../index.php");} ?>
	<div class="content">
		<div class="mid-content">
		<h2 class="mid-title">Бан пользователей</h2>

		
		<center><form method="POST" action="user-ban.php">
            	<input type="text" name="ban_login" placeholder="Логин пользователя" /><br><br>
            	<button type="submit" name="ban_user">Забанить</button>
        </form></center>
		
       
		</div>
		<?php include "admin-minimenu.php";?>
	</body>
	</html>