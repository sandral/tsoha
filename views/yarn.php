<form action="yarn.php" method="POST" id="updateform">
<input type="hidden" name="action" value="update">
<input type="hidden" name="yarn_id" value="<?php echo $data->yarn->getId(); ?>">
<table>
<tr><td>Nimi:</td><td>          <input type="text" name="yarnname" value="<?php echo htmlspecialchars($data->yarn->getYarnname());?>"></td></tr>
<tr><td>Valmistaja:</td><td>    <select name="yarnmanu">

<option value="<?php echo htmlspecialchars($data->manu->getId());?>">
<?php echo htmlspecialchars($data->manu->getManuname());?>
</option>

</select></td></tr>
<tr><td>Puikkosuositus:</td><td><?php showNsrfield('nsrmin',$data->yarn->getNsrmin());?> - <?php showNsrfield('nsrmax', $data->yarn->getNsrmax());?></td></tr>
<tr><td>Pituus (100g):</td><td> <input type="text" name="lpg" value="<?php echo $data->yarn->getLpg();?>"></td></tr>
<tr><td>Kuvaus:</td><td>        <input type="text" name="description" value="<?php echo $data->yarn->getDescription();?>"></td></tr>
</table>
<a href="#" onclick="document.getElementById('updateform').submit();">Muokkaa</a>
<a href="yarn.php?yarn_id=<?php echo trim($data->yarn->getId()); ?>&delete=1">Poista</a>
</form>

<br>
<a href="home.php">Etusivu</a>
<br><br>
<a href="logout.php">Kirjaudu ulos</a>