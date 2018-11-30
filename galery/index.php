<?php
require_once '../db.php';
?>
<html>
	<head><title>Галерея</title></head>
    <?php include('../header.php'); ?>
    <div class='content'>
		<div class='mid-content' style="width: 100%;">			
			<h2 class='mid-title'>Галерея</h2>
			<center>
			<script type="text/javascript"> //Параметры для lightBox() http://xiper.net/collect/js-plugins/gallery/jquery-lightbox
				jQuery(function(){
    			jQuery(".galery_img a").lightBox({imageLoading: '/images/lightbox-ico-loading.gif',imageBtnClose: '/images/lightbox-btn-close.gif',imageBtnPrev: '/images/lightbox-btn-prev.gif',imageBtnNext:'/images/lightbox-btn-next.gif'});
				});
			</script>
			<?php 
		    $query_allGal = mysqli_query($dbh,"SELECT id, link FROM galery ORDER BY id DESC");
		    while($Row_allGal = mysqli_fetch_assoc($query_allGal)){ 
		    $info_allGal .= '<div class="galery_img"><a href="'.$Row_allGal['link'].'"><img src="'.$Row_allGal['link'].'" width="250px" height="200px" /></a></div>';
			}
		    echo $info_allGal;
		    ?>
			</center>
	    </div>
	</div>
</body>
</html>