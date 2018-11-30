<?php
	require "../db.php";

	if(isset($_POST['add_img'])){
		$qr = mysqli_query($dbh,"INSERT INTO `galery`(`link`) VALUES ('{$_POST['link_img']}')");
		echo"<script>alert('Фото добавлено')</script>";
	}

?>
<html>
<?php require "../header.php"; ?>
<?php if($ee==1){}else{location.replace("../index.php");} ?>
	<div class="content">
		<div class="mid-content">
		<h2 class="mid-title">Загрузка фотографий в галерею</h2>
			<center>
				<form method="POST" action="imgs_downloader.php">
            	<input type="text" name="link_img" placeholder="ссылка на фото" /><br><br>
            	<button type="submit" name="add_img">Загрузить</button>
            	</form>
            </center>
		</div>
		<?php include "admin-minimenu.php";?>
	</body>
	</html>