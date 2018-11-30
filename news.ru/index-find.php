<?php
	require_once ("db.php");
?>

<html>
 <?php require("header.php"); ?>
	<div class="content" style="background: #3498db;">

		<?php require("left-menu.php"); ?>

		<center>

		<form method="POST" action="index-find.php" class="finder">
		    <div class="col-lg-6">
			    <div class="input-group">			    
			      <input type="text" name="n_f" class="form-control" placeholder="Что хочешь найти?" id="finder_field" />
			      <span class="input-group-btn">
			        <button class="btn btn-default" name="n_find" type="submit">Найти!</button>
			      </span>			    			      
			    </div>
			</div>
		</form>
		
		<div class="mid-content"><div id="poof_40px" style="height: 40px;"></div>	            				  
		
		<?php 
            	$data = $_POST;
        	if (isset($data['n_find']) && ($data['n_find'] !== ''))
        	{
        	    $zapr = trim($data['n_f']);
        		$f_query = mysqli_query($dbh,"SELECT * FROM `news` WHERE title LIKE '%".$zapr."%'");
        		while($Row_finded = mysqli_fetch_assoc($f_query)){
        		   $f_result .= '<div class="allNews"><a href="../news/news_'.$Row_finded['id'].'.php"><p id="title_n">'.$Row_finded['title'].'</p><img src="'.$Row_finded['img'].'" id="news_img"><p id="text_n">'.$Row_finded['pre_text'].'</p></a><p id="title_date">'.$Row_finded['date'].'</p></div>';
        		}
        	}else{
        		echo "<script>alert('Введите запрос!')</script>";
        	}
         ?>	
        
         <h2 class="mid-title"><?php echo $zapr;?></h2>
         <?php echo $f_result;?>

		</div></center>
		<?php require("mini-menu.php"); ?>
	</div>
	</body>
</html>








		