<?php
                require_once '../../db.php';
                ?>
                <html>
                    <head><title>Заявка №10</title><link rel="stylesheet" type="text/css" href="../msg_css.css" /></head>
                    <?php include('../../header.php'); ?>
                    <style type='text/css'>
                        #dot0{display: none;}
                        #dot1{display: none;}
                        #dot2{display: none;}
                        #dot3{display: none;}
                        #dot4{display: none;}
                        #dot5{display: none;}
                        #dot6{display: none;}
                        #dot7{display: none;}
                        #dot8{display: none;}
                        #dot9{display: none;}
                        #dot10{display: none;}
                        #dot11{display: none;}
                        #dot12{display: none;}
                        #dot13{display: none;}
                        #dot14{display: none;}
                        #dot15{display: none;}
                        #dot16{display: none;}
                        #dot17{display: none;}
                        #dot18{display: none;}
                        #dot19{display: none;}
                    </style>
                    <div class='content'>
                        <div class='mid-content' style='width: 100%; min-height: 1000px;'>         
                            <h2 class='mid-title'>Заявка №<?php echo '10'; ?></h2>
                             
                            <div class="well" id="user">привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем привет!я артем </div>

                            <div class="well" id="admin">1Hi! Hi!Hi!Hi!H Hi!Hi!Hi! Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi! Hi!Hi!Hi! Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!s Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi! Hi!Hi!Hi!Hi!Hi!Hi! Hi!Hi!Hi!Hi!Hi!Hi!Hi!Hi!</div>

                            <div style="float: left; height: 50px; width: 1010px; position:fixed; bottom:15px;">
                                <div class="panel panel-default">
                                  <div class="panel-body">
                                    <form method="POST" action="">
                                        <div class="col-lg-6" style="width: 100%;">
                                            <div class="input-group">               
                                                <input type="text" name="user_msg" class="form-control" placeholder="Сообщение" style="width: 850px;" />
                                                <span class="input-group-btn">                    
                                                    
                                                <?php
                                                    $comand = "";
                                                    if($ee==1){
                                                        $comand .= "send_admin_msg('13')";
                                                    } else {
                                                        $comand .= "send_user_msg('12')";
                                                    }
                                                    echo '<button class="btn btn-default" name="send_user_msg" type="submit" onclick="'.$comand.'">Отправить!</button>';
                                                ?>
                                             
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