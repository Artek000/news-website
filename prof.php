<?php
    require ('db.php');
    require ('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background: #f1f1f1;"><center>
<!--<div style="width: 500px; height: 500px; background: #e67e22; position: relative; z-index: 1; top: 200px"></div>
<div style="width: 600px; height: 600px; background: #f1f1f1; position: relative; bottom: 350px;"></div>-->


<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

<div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
  </div>
  
<form method="POST" action="prof.php">
	<input type="text" onkeyup="var yratext=/['0-9',':']/; if(yratext.test(this.value)) alert('Введены запрещенные символы')">
	<button type="submit" name="do_reg">Регистрация</button>
</form>

</div></center></body>
</html>
 