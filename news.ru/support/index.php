<?php
require_once '../db.php';
?>
<html>
	<head><title>Поддержка</title></head>
    <?php include('../header.php'); ?>
    <div class='content' style="width: 790px">
		<div class='mid-content' style="width: 100%;">

		<h2 class='mid-title'>Заявки</h2>
			
			<?php if(isset($_SESSION['logged_user']) ) : ?>

			<?php 
		    $query_allTickets = mysqli_query($dbh,"SELECT * FROM support_m WHERE login = '{$_SESSION['logged_user']->login}' ORDER BY date DESC");
		    while($Row_allTickets = mysqli_fetch_assoc($query_allTickets)){ 
		    $info_allTickets .= '<div class="ticket" style="margin-right: 10px;"><p id="">Login: '.$Row_allTickets['login'].'</p><p id="">Email: '.$Row_allTickets['email'].'</p><p id="">'.$Row_allTickets['date'].'</p><a href="../support/tickets/ticket_'.$Row_allTickets['id'].'.php">Перейти>></a></div>';
		    }
		    echo $info_allTickets;
		?>

		<?php else : ?>
		<h1 style="text-align: center; font-weight: bold;"><a style="color: red;" href="../auth/login.php">Войдите</a> или <a style="color: red;" href="../auth/reg.php">Зарегистрируйтесь</a> для просмотра своих заявок</h1>
		<?php endif; ?>	

	    </div>
	</div>
</body>
</html>