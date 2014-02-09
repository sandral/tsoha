<?php
echo $data->question;
<br>
foreach ($data->choices as $choice) {
echo '<a href="'.$choice[1].'">'.$choice[0].'</a> ';
?>