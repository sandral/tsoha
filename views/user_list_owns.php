<a href="user_yarn.php?action=insert" class="btn btn-default">Lisää lanka</a><br><br>
<table class="table">
<tr><th>Nimi</th><th>Valmistaja</th><th>Määrä</th><td style="width:120px;" class="text-right"></td><td style="width:150px;" class="text-right"></td></tr>
<?php
foreach ($data->list as $e) {
echo '<tr>';
echo '<td>'.htmlspecialchars($e['yarnname']).'</td>';
echo '<td>'.htmlspecialchars($e['manuname']).'</td>';
echo '<td>'.htmlspecialchars($e['amount']).' g</td>';

echo '<td><a href="user_yarn.php?action=modify&yarn_id='.$e['yarn_id'].'">Näytä tiedot</a></td>';
echo '<td><a href="user_yarn.php?action=delete&yarn_id='.$e['yarn_id'].'">Poista kokoelmasta</a></td>';
echo '</tr>
';
 }
?>
</table>