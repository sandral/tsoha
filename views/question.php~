Omat lankasi:<br>
<table>
<tr><th>Nimi</th><th>Määrä</th></tr><td></td>
<?php
foreach ($data->owns as $own) {
echo '<tr>';
echo '<td>';
echo $own['yarn']->getYarnname().'</td><td>'.$own['amount'].'g';
echo '</td><td>';
echo '<a href="yarn.php?yarn_id='.$own['yarn']->getId().'">Muokkaa</a>';
echo '</td></tr>';
 }
?>
</table>
<br>