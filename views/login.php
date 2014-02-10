<form name="input" action="login.php" method="post" id="loginform">

<div class="input-group">
  <span class="input-group-addon">Käyttäjänimi</span>
  <input type="text" class="form-control" name="user">
</div>


<table>
<tr>
<td>Käyttäjä:</td><td><input type="text" name="user" value="
<?php
echo $data->user;
?>"></td>
</tr>
<tr>
<td>Salasana:</td><td><input type="password" name="pwd"></td>
</tr>
</table><br>
</form>
<a href="#" onclick="document.getElementById('loginform').submit();" class="btn btn-default">Kirjaudu sisään</a>