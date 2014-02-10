<table class="table">
<tr><th>Nimi</th><th>Valmistaja</th><th>Puikkosuositus</th><th>Pituus/100g</th><th>Kuvaus</th><td></td><td></td></tr>
<?php
foreach ($data->yarnlist as $own) {
echo '<tr>';
echo '<td>'.($own['yarn']->getYarnname()).'</td>';
if ($own['manu'] == NULL) {
  echo '<td> </td>';
} else {
  echo '<td>'.($own['manu']->getManuname()).'</td>';
}

echo '<td>'.($own['yarn']->getNsrmin()).' - '.($own['yarn']->getNsrmax()).'</td>';
if ($own['yarn']->getLpg() == null) {
  echo '<td> </td>';
} else {
  echo '<td>'.($own['yarn']->getLpg()).' m</td>';
}

echo '<td>'.($own['yarn']->getDescription()).'</td>';
echo '<td><a href="yarn.php?action=modify&yarn_id='.$own['yarn']->getId().'">Muokkaa</a></td>';
echo '<td><a href="yarn.php?action=delete&yarn_id='.$own['yarn']->getId().'">Poista</a></td>';
echo '</tr>
';
 }
?>
</table>