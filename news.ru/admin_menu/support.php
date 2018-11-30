<?php
	require "../db.php";
?>
<html>
<?php require "../header.php"; ?>
<?php if($ee==1){}else{location.replace("../index.php");} ?>
	<div class="content">
		<div class="mid-content">
		<h2 class="mid-title">Заявки</h2>
		
            <?php
               $query_allTickets = mysqli_query($dbh,"SELECT * FROM support_m ORDER BY date DESC");
		    	while($Row_allTickets = mysqli_fetch_assoc($query_allTickets)) $info_allTickets .= '<div class="ticket">ID:  '.$Row_allTickets['id'].'</br>Login:  '.$Row_allTickets['login'].'</br>Name:  '.$Row_allTickets['name'].'</br>Email:  '.$Row_allTickets['email'].'</br> <a href="../support/tickets/ticket_'.$Row_allTickets['id'].'.php">Рассмотреть</a></div>';  /*Message:  <pre style="">'.$Row_allTickets['text'].'</pre>*/

		    	echo $info_allTickets; 
		    ?> 
		</div>
		<?php include "admin-minimenu.php";?>
	</body>
	</html>