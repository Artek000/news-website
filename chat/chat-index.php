<?php
	require "../db.php";

    if($_SESSION['logged_user']->username != ""){
        //$_SESSION['name'] = stripslashes(htmlspecialchars($_SESSION['logged_user']->username));
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Пожалуйста <a href="../auth/login.php">Войдите</a> или <a href="../auth/reg.php">Зарегистрируйтесь</a> чтобы использовать чат!</strong></div>';
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><title>Чат</title></head>
	 <?php include("../header.php"); ?>
	        <!-- Chat -->

    <center>

    <div id="wrapper">
    <div id="menu">
        <p class="welcome">Привет, <?php echo $_SESSION['logged_user']->username; ?>!<b></b></p>
        <div style="clear:both"></div>
    </div>

    <div id="chatbox">
	 <?php

		if(file_exists("log.html") && filesize("log.html") > 0){
		    $handle = fopen("log.html", "r");
		    $contents = fread($handle, filesize("log.html"));
		    fclose($handle);

		    echo $contents;
		}
	?>
	</div>

    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Отправить" />
    </form>
	</div>

	<!--<a href="" download="paradise-gamers_chat.exe">Скачать чат</a>-->
	</center>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="chat.js"></script>

                     <!-- Chat End -->
</body>
</html>
