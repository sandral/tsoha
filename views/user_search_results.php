<table class="table">
<tr><th>Nimi</th><th>Tiedot</th></tr>
<?php
foreach ($data->results as $e) {
echo '<tr>';
echo '<td>'.htmlspecialchars($e->getYarnname()).'</td>';

echo '<td><a href="user_yarn.php?action=modify&yarn_id='.$e->getId().'">Näytä tiedot</a></td>';
echo '</tr>
';
 }
?>
</table>