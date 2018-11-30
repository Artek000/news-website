<?php
	require "../db.php";
	
	if(isset($_POST['unban_user'])){
		$qr = mysqli_query($dbh,"UPDATE users SET is_banned = '0' WHERE login = '{$_POST['unban_login']}'");
		echo"<script>alert('Пользователь разбанен')</script>";
	}
	
?>
<html>
<?php require "../header.php"; ?>
<?php if($ee==1){}else{location.replace("../index.php");} ?>
	<div class="content">
		<div class="mid-content">
		<h2 class="mid-title">Разбан пользователей</h2>

		
		<center><form method="POST" action="user-unban.php">
            	<input type="text" name="unban_login" placeholder="Логин пользователя" /><br><br>
            	<button type="submit" name="unban_user">Разбанить</button>
        </form></center>
		
       
		</div>
		<?php include "admin-minimenu.php";?>
	</body>
	</html>