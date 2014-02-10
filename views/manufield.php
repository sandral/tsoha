<select name="<?php echo $manufieldname;?>">

<option value="-1"></option>

<?php
$manus = Manu::listManus();
foreach ($manus as $manu) {
  echo '<option value="'.$manu->getId().'"';
  if ($manufieldselected == $manu->getId()){
    echo ' selected';
  }
  echo '>'.$manu->getManuname().'</option>';
}
?>

</select>