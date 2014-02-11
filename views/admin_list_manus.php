<a href="admin_manu.php?action=insert" class="btn btn-default">Lisää valmistaja</a><br><br>
<table class="table">
<tr><th>Nimi</th><td></td><td></td></tr>
<?php
foreach ($data->list as $e) {
echo '<tr>';
echo '<td>'.htmlspecialchars($e->getManuname()).'</td>';

echo '<td><a href="admin_manu.php?action=modify&manu_id='.$e->getId().'">Muokkaa</a></td>';
echo '<td><a href="admin_manu.php?action=delete&manu_id='.$e->getId().'">Poista</a></td>';
echo '</tr>
';
 }
?>
</table>