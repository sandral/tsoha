<div class="container" style="width:300px;">
<form name="input" action="login.php" method="post" id="loginform">

<div class="input-group">
  <span class="input-group-addon">Käyttäjänimi</span>
  <input type="text" class="form-control" name="user" value="<?php echo $data->user; ?>">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon">Salasana</span>
  <input type="password" class="form-control" name="pwd">
</div>
<br>
</form>
<input type="submit" class="btn btn-default" value="Kirjaudu sisään">
<a href="#" onclick="document.getElementById('loginform').submit();" class="btn btn-default">Kirjaudu sisään</a>
</div>