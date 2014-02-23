<?php
echo '<a href="admin_manu.php?action=insert" class="btn btn-default">Lisää valmistaja</a><br><br>';
if (count($data->list) == 0) {
echo 'Ei valmistajia tällä hetkellä.';
}
else {

echo '<table class="table column">';
echo '<tr><th>Nimi</th><td style="width:80px;"></td><td style="width:80px;"></td></tr>';

foreach ($data->list as $e) {
  echo '<tr>';
  echo '<td>'.htmlspecialchars($e->getManuname()).'</td>';

  echo '<td class="text-right"><a href="admin_manu.php?action=modify&manu_id='.$e->getId().'">Muokkaa</a></td>';
  echo '<td class="text-right"><a href="admin_manu.php?action=delete&manu_id='.$e->getId().'">Poista</a></td>';
  echo '</tr>';
      }
}
?>

</table>
