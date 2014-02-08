<select name="<?php echo $nsrfieldname; ?>">
<?php
$list = array(1,2,3,4);
foreach ($list as $value) {
  if ($value == $nsrfieldselected){ 
    echo '<option value="'.$value.'" selected>'.$value.'</option>';
  } else {
    echo '<option value="'.$value.'">'.$value.'</option>';
  }
}
?>
</select>