<?
require "../db.php";

if(isset($_SESSION['logged_user']) && ($_POST['text'] !="")){
    $text = $_POST['text'];
     
    $fp = fopen("log.html", "a+");
	fwrite($fp, "<div class='msgln'><b>".$_SESSION['logged_user']->username."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>