<?php
                require_once '../../db.php';
                ?>
                <html>
                    <head><title>Заявка №1</title><link rel='stylesheet' type='text/css' href='../msg_css.css' /></head>
                    <?php include('../../header.php'); ?>

                    <div class='content'>
                        <div class='mid-content' style='width: 100%; min-height: 500px;'>         
                            <h2 class='mid-title'>Заявка №<?php echo '1'; ?></h2>

                                <div class='well' id='user'>привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет привет </div>

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
                </html>