<?php
	require "../db.php";
?>
<html>
<?php require "../header.php"; ?>
<?php if($ee==1){}else{location.replace("../index.php");} ?>
	<div class="content">
		<div class="mid-content">
		<h2 class="mid-title">Редактирование чата</h2>
		    <div style="width:100%; overflow:auto;" id="chatbox">
                <?php    if(file_exists("../chat/log.html") && filesize("../chat/log.html") > 0){
                        $handle = fopen("../chat/log.html", "r+");
                        $contents = fread($handle, filesize("../chat/log.html"));
                        fclose($handle);
                         
                        echo $contents;
                    }
                ?>
                
            </div>
		</div>
		<?php include "admin-minimenu.php";?>
	</body>
	</html>