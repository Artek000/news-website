<?php
	require_once "../db.php";

   		$data = $_POST;
    if (isset($data['submit_mess']))
    {

        $errors = array();
        
        if ($data['name'] == '') 
        {
            $errors[] = 'Введите Имя';
        }

        if (trim($data['email']) == '') 
        {
            $errors[] = 'Введите Email';
        }

        if ($data['message'] == '') 
        {
            $errors[] = 'Введите Сообщение';
        }

        if (empty($errors))
        {
            $con = mysqli_select_db($dbh,"support_m");
            $qer = mysqli_query($dbh, "INSERT INTO `support_m` (`login`,`email`, `name`, `text`) VALUES ('{$_SESSION['logged_user']->login}','{$data['email']}', '{$data['name']}', '{$data['message']}')");
            if($qer){
                $query_allTickets = mysqli_query($dbh,"SELECT * FROM support_m WHERE login = '{$_SESSION['logged_user']->login}' ORDER BY date DESC");
                while($Row_allTickets = mysqli_fetch_assoc($query_allTickets)){
                    $text = "<?php
                require_once '../../db.php';
                ?>
                <html>
                    <head><title>Заявка №{$Row_allTickets['id']}</title><link rel='stylesheet' type='text/css' href='../msg_css.css' /></head>
                    <?php include('../../header.php'); ?>

                    <div class='content'>
                        <div class='mid-content' style='width: 100%;  min-height: 500px;'>         
                            <h2 class='mid-title'>Заявка №<?php echo '".$Row_allTickets['id']."'; ?></h2>

                                <div class='well' id='user'>".$Row_allTickets['text']."</div>

                                <div class='enter_msg_panel'>
                                <div class='panel panel-default'>
                                  <div class='panel-body'>
                                    <form method='POST' action=''>
                                        <div class='col-lg-6' style='width: 100%;'>
                                            <div class='input-group'>               
                                                <input type='text' name='user_msg' class='form-control' placeholder='Сообщение'' style='width: 850px;' />
                                                <span class='input-group-btn'>
                                                <button class='btn btn-default' name='send_user_msg' type='submit'>Отправить!</button>
                                              </span>                                 
                                            </div>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </body>
                </html>";
                
                $fp = fopen("../support/tickets/ticket_{$Row_allTickets['id']}.php", "w");
                fwrite($fp, $text);
                fclose($fp);
                }
                echo "<script>alert('Заявка отправлена!')</script>";
            } else {echo "<script>alert('Ошибка отправки заброса. Повторите попытку')</script>";}
        } else 
        {
            echo"<script>alert('".array_shift($errors)."')</script>";
        }
    }
    
?>
<html>
    <head><title>Создание заявки</title></head>
	<?php include('../header.php'); ?>
    <div class='content'>
	    <div class='mid-content' style="width:100%;">
    		<h2 class='mid-title'>Создание заявки</h2>
    		<center>
            <?php if(isset($_SESSION['logged_user']) ) : ?>
    		  <form method="post" action="back-call.php">
                <input name="name" placeholder="Имя"></br></br>
                        
                <input name="email" type="email" placeholder="Email"></br></br>
                        
                <textarea name="message" placeholder="Сообщение" style="width:500px; height:300px;"></textarea></br></br>
                
                <input style="width:100px;" name="submit_mess" type="submit" value="Отправить">
                </form>
                <?php else : ?>
                <h1 style="text-align: center; font-weight: bold;"><a style="color: red;" href="../auth/login.php">Войдите</a> или <a style="color: red;" href="../auth/reg.php">Зарегистрируйтесь</a> для отправки заявки</h1>
                <?php endif; ?> 
            </center>
         </div>
	</div>
</body>
</html>