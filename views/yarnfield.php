<select name="<?php echo $yarnfieldname;?>" class="form-control">

<?php
$yarns = Yarn::listYarnsWithManus();
foreach ($yarns as $yarn) {
  echo '<option value="'.$yarn['yarn']->getId().'"';
  if ($yarnfieldselected == $yarn['yarn']->getId()){
    echo ' selected';
  }
  if (is_null($yarn['manu'])) {
    $str = $yarn['yarn']->getYarnname();
  } else {
    $str = $yarn['yarn']->getYarnname().' ('.$yarn['manu']->getManuname().')';    
  }
  
  echo '>'.htmlspecialchars($str).'</option>';
}
?>

</select>