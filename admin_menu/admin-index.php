<?php
	require "../db.php";
?>
<html>
<?php require "../header.php"; ?>
<?php if($ee==1){}else{location.replace("../index.php");} ?>
	<div class="content">
		<div class="mid-content">
		<h2 class="mid-title-admin">Админ Панель</h2>
            <?php
               $query_allAccounts = mysqli_query($dbh,"SELECT is_banned, img, login, username, id FROM users ORDER BY id DESC");
		    	while($Row_allAccounts = mysqli_fetch_assoc($query_allAccounts)) $info_allAccounts .= '<div class="allAccounts"><img src="..'.$Row_allAccounts['img'].'" style="float:left; margin: 2px; border-radius:10px;" width="45px" height="45px" />ID:  '.$Row_allAccounts['id'].'</br>Login:  '.$Row_allAccounts['login'].'</br>Name:  '.$Row_allAccounts['username'].' </br>Ban:  '.$Row_allAccounts['is_banned'].'</div>';  

		    	echo $info_allAccounts; 
		    ?> 
		    
		</div>
		<?php include "admin-minimenu.php";?>
	</body>
	</html>