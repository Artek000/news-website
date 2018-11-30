<?php
    require ("db.php");
    require ("header.php");
    
    $maxwidth = "50px"; // максимальная ширина картинок на превью
$fotos_dir = "/images/users_img/"; // Директория для фотографий товаров
$foto_name = $fotos_dir.$_SESSION['logged_user']->login."_".$_FILES['myfile']['name']; // Полное имя файла вместе с путем
$foto_light_name = $_SESSION['logged_user']->login."_".$_FILES['myfile']['name']; // Имя файла исключая путь
$foto_tag = "<img src=\"$foto_name\" border=\"0\">"; // Готовый тэг для вставки картинки на страницу
$foto_tag_preview = "<img src=\"$foto_name\" border=\"0\" width=\"$maxwidth\">"; // Тот же тэг, но для превью

// Текст ошибок
$error_by_mysql = "<span style=\"font: bold 15px tahoma; color: red;\">Ошибка при добавлении данных в базу</span>";
$error_by_file = "<span style=\"font: bold 15px tahoma; color: red;\">Невозможно загрузить файл в директорию. Возможно её не существует</span>";



// Начало
if(isset($_FILES["myfile"]))
{
$myfile = $_FILES["myfile"]["tmp_name"];
$myfile_name = $_FILES["myfile"]["name"];
$myfile_size = $_FILES["myfile"]["size"];
$myfile_type = $_FILES["myfile"]["type"];
$error_flag = $_FILES["myfile"]["error"];

// Если ошибок не было
if($error_flag == 0)
{
        
    
$DOCUMENT_ROOT = $_SERVER['DOCMENT_ROOT'];
$upfile = getcwd()."$fotos_dir" . basename($_SESSION['logged_user']->login."_".$_FILES['myfile']['name']);
if ($_FILES['myfile']['tmp_name'])
{

  
//Если не удалось загрузить файл

if (!move_uploaded_file($_FILES['myfile']['tmp_name'], $upfile)) 
{
echo "$error_by_file";
exit;
}

}
else
{
    echo 'Проблема: возможна атака через загрузку файла. ';
    echo $_FILES['myfile']['name'];
    exit;
}


// После удачной обработки файла, выводим сообщение
/*echo "<h3>Результат добавления товара:</h3> <br />";
echo "<b>Файл успешно скопирован в директорию:</b> ".$fotos_dir." <br /><b>Имя файла:</b> ".$foto_light_name."<br />";
echo "<br /><small>Превью загруженной картинки:</small> <br />$foto_tag_preview<br /><br />";
*/

// Заносим путь картинки в базу данных
$q = "UPDATE users SET img= '$foto_name' WHERE login= '{$_SESSION['logged_user']->login}'";
$query = mysqli_query($dbh,$q);


// Данные успешно внесены в базу данных, выводим сообщение
/*if ($query == 'true') {
echo "<br /><b>Данные успешно внесены в базу</b>";
}

// В противном случае, выводим ошибку при добавлении в базу данных
else {
echo "$error_by_mysql";

}*/

        }
 
 elseif ($myfile_size == 0) {
 echo "Пустая форма!";
 }

}
$errors = array();
 if(isset($_POST['submit_username']))
	{
			
			if($_POST['new_username'] !== '')
			{
			$newNick = trim($_POST['new_username']);
				$query_newUsername = mysqli_query($dbh,"UPDATE users SET username = '{$newNick}' WHERE login = '{$_SESSION['logged_user']->login}'");
			   
			}else
			{
				$errors[] = 'Введите новый ник';
			}
			
			header('Location: /index-world.php');
			
			if (!empty($errors))
		{
			echo"<script>alert('".array_shift($errors)."')</script>";
		} 
	}
	
	if(isset($_POST['submit_password'])){
	    $user = R::findOne('users','login = ?', array($_SESSION['logged_user']->login));
	    if($_POST['old_password'] !== ''){
	    if($_POST['old_password'] == $user->password){
	        if($_POST['new_password'] !== ''){
	        if($_POST['re_new_password'] !== ''){
    	    if($_POST['new_password'] !== $_POST['old_password']){
    	        if($_POST['new_password'] == $_POST['re_new_password']){
    	            $repass_query = mysqli_query($dbh,"UPDATE users SET password = '{$_POST['re_new_password']}' WHERE login = '{$_SESSION['logged_user']->login}'");
    	            echo '<div style="color: green;">Пароль изменен!</div><hr>';
        	    }else{$errors[] = 'Повторный пароль введен неверно';}
    	    }else{$errors[] = 'Придумайте новый пароль';}
	        }else{$errors[] = 'Введите повторно новый пароль';}
        	}else{$errors[] = 'Введите новый пароль';}
        	}else{$errors[] = 'Старый пароль неверный';}
    	}else{$errors[] = 'Введите старый пароль';}
    	if (!empty($errors))
		{
			echo"<script>alert('".array_shift($errors)."')</script>";
		}
	}

?>
<html>
	<head><title>Профиль</title></head>

    <div class="content">
	<div class="mid-content" style='width: 100%;'>
	    <h2 class="mid-title">Профиль</h2>
	    <center id="prof_form">
	    <?php echo "<a href='/profile.php'><img src='$ava' width='200px' height='200px' style='border-radius: 10px;' /></a>"; ?>
	    <h3 style='font-size: 25px; text-align: center;'>Данные</h3>
	    <form enctype="multipart/form-data" method="POST" action="profile.php">
            <b>Фото:</b><br />
            <input type="file" name="myfile" style="width:230px; height:20px" id="myfile" />
            <input type="submit" value="Добавить фото" name="submit"></br></br>
            </form>
            
            <form enctype="multipart/form-data" method="POST" action="profile.php">
            <input type="text" name="new_username" placeholder="Новый Ник" />
            <input type="submit" value="Изменить ник" name="submit_username"></br></br>
            </form>
            
            <form enctype="multipart/form-data" method="POST" action="profile.php">
            <input type="text" name="old_password" placeholder="Старый пароль" /></br>
            <input type="text" name="new_password" placeholder="Новый пароль" /></br>
            <input type="text" name="re_new_password" placeholder="Повтори новый пароль" /></br>
            <input type="submit" value="Изменить пароль" name="submit_password"></br></br>
            </form>
</center>        
</div>
</div>
</body>
</html>