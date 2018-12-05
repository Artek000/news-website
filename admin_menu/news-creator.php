<?php
	require "../db.php";

	$data = $_POST;
	if (isset($data['n_create']))
	{

		$errors = array();

		if ($data['n_type'] == '')
		{
			$errors[] = 'Введите тип новости';
		}

		if (trim($data['n_title']) == '')
		{
			$errors[] = 'Введите Титул';
		}

		if (trim($data['n_img']) == '')
		{
			$errors[] = 'Введите ссылку на картинку';
		}

		if ($data['n_pre'] == '')
		{
			$errors[] = 'Введите пре текст';
		}


		if ($data['n_text'] == '')
		{
			$errors[] = 'Введите текст';
		}

		if (R::count('news',"title = ?", array($data['n_title'])) > 0 )
		{
			$errors[] = 'Этот Титул занят';
		}

		if (empty($errors))
		{
			$user = R::dispense('news');
			$user->type = $data['n_type'];
			$user->title = $data['n_title'];
			$user->pre_text = $data['n_pre'];
			$user->text = $data['n_text'];
			$user->img = $data['n_img'];
			R::store($user);

			$text = "<?php
		           	require '../db.php';
		        ?>
		        <html>
		        	<head><title>{$data['n_title']}</title></head>
		            <?php include('../header.php'); ?>
		           	<div class='content'>
				<div class='mid-content-news'>
				<h2 class='mid-title'>{$data['n_title']}</h2>
				<center><script type='text/javascript'> //Параметры для lightBox() http://xiper.net/collect/js-plugins/gallery/jquery-lightbox
						jQuery(function(){
		    			jQuery('.mid-img a').lightBox({imageLoading: '/images/lightbox-ico-loading.gif',imageBtnClose: '/images/lightbox-btn-close.gif',imageBtnPrev: '/images/lightbox-btn-prev.gif',imageBtnNext:'/images/lightbox-btn-next.gif'});
						});
					</script><div class='mid-img'><a href='".$data['n_img']."'><img src='".$data['n_img']."' id='news_img'></a></div>
				<pre class='mid-text'>{$data['n_text']}</pre></center>
		         </div>
				<?php require('../mini-menu.php'); ?>
			</div>
		            </body>
		        	</html>";

		    $query_getid = mysqli_query($dbh,"SELECT id FROM news WHERE title = '{$data['n_title']}'");
		    $Row_getid = mysqli_fetch_assoc($query_getid);
            $fp = fopen("../news/news_{$Row_getid['id']}.php", "w");
            fwrite($fp, $text);
            fclose($fp);

            echo'<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Новость создана!</strong></div>';
		} else
		{
			echo'<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'.array_shift($errors).'</strong></div>';
		}
	}

?>
<html>
<?php require "../header.php"; ?>
<?php if($ee==1){}else{location.replace("../index.php");} ?>
	<div class="content">
		<div class="mid-content">
		<h2 class="mid-title">Создание новостей</h2>
		<p class="mid-text">

		<center><form method="POST" action="news-creator.php">
		        <select name="n_type" autofocus>
		            <option disabled selected>Выберите классификацию новости</option>
		            <!--<option value="world">Новость в мировой политике</option>-->
		            <option value="game">Новость в игровой индустрии</option>
		        </select><br><br>
            	<input type="text" name="n_title" placeholder="титул" value="<?php echo @$data['n_title'] ?>" /><br><br>
            	<input type="text" name="n_img" placeholder="ссылка на картинку" value="<?php echo @$data['n_img'] ?>" /><br><br>
            	<textarea type="text" name="n_pre" placeholder="пре текст" value="<?php echo @$data['n_pre'] ?>" style="width:300px; height:100px;"></textarea><br><br>
            	<textarea name="n_text" placeholder="Основной текст" value="<?php echo @$data['n_text'] ?>" style="width:500px; height:300px;" ></textarea><br><br>
            	<button type="submit" name="n_create">Создать новость</button>
        </form></center>

               </p>
		</div>
		<?php include "admin-minimenu.php";?>
	</body>
	</html>
