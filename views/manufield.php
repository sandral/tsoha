<select name="<?php echo $manufieldname;?>" class="form-control">

<option value="-1"<?php
if ($manufieldselected == -1){
    echo ' selected';
  }
?>></option>

<?php
$manus = Manu::listManus();
foreach ($manus as $manu) {
  echo '<option value="'.$manu->getId().'"';
  if ($manufieldselected == $manu->getId()){
    echo ' selected';
  }
  echo '>'.htmlspecialchars($manu->getManuname()).'</option>';
}
?>

</select>