<?php
	require_once ("db.php");
?>

<html>
 <?php require("header.php"); ?>
	<div class="content" style="">
	<!--<a href="/prices"><img src="https://placeholdit.imgix.net/~text?txtsize=44&txt=%D0%97%D0%B0%D0%BA%D0%B0%D0%B7%20%D1%80%D0%B5%D0%BA%D0%BB%D0%B0%D0%BC%D1%8B&w=1000&h=150" style="width: 100%; border-radius: 20px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;"></a>-->
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
		    $query_allNews = mysqli_query($dbh,"SELECT id, title, img, pre_text, text, date FROM news ORDER BY id DESC");
		    while($Row_allNews = mysqli_fetch_assoc($query_allNews)){
		    $info_allNews .= '<div class="allNews"><a href="../news/news_'.$Row_allNews['id'].'.php"><p id="title_n">'.$Row_allNews['title'].'</p><img src="'.$Row_allNews['img'].'" id="news_img" style="margin: 0px;"><p id="text_n">'.$Row_allNews['pre_text'].'</p></a><p id="title_date">'.$Row_allNews['date'].'</p></div>';

		    /*$text = "
		    <?php
            	require '../db.php';
            ?>
            <html>
            	<?php include('../header.php'); ?>
            	<div class='content'>
		<div class='mid-content'>
		<h2 class='mid-title'>{$Row_allNews['title']}</h2>
		<center><script type='text/javascript'> //Параметры для lightBox() http://xiper.net/collect/js-plugins/gallery/jquery-lightbox
				jQuery(function(){
    			jQuery('.mid-img a').lightBox({imageLoading: '/images/lightbox-ico-loading.gif',imageBtnClose: '/images/lightbox-btn-close.gif',imageBtnPrev: '/images/lightbox-btn-prev.gif',imageBtnNext:'/images/lightbox-btn-next.gif'});
				});
			</script><div class='mid-img'><a href=".$Row_allNews['img']."><img src=".$Row_allNews['img']." id='news_img'></a></biv>
		<pre class='mid-text'>
		    {$Row_allNews['text']}
		</pre></center>
         </div>
		<?php require('../mini-menu.php'); ?>
	</div>
            </body>
        	</html>";

            $fp = fopen("./news/news_{$Row_allNews['id']}.php", "w");
            fwrite($fp, $text);
            fclose($fp);*/
		    }
		    echo $info_allNews;
		?>

		</div></center>
		<?php require("mini-menu.php"); ?>
	</div>
	</body>
</html>
