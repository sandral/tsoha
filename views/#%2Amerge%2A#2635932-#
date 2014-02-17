<!DOCTYPE HTML>
<html>
<head><title>Lankatietokanta | <?php echo $title; ?></title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<meta charset="utf-8">
</head>
<body>
<div  style="width:700px; margin-left:auto; margin-right:auto;">
<?php showNavbar(); ?>
<div class="panel panel-default">
<div class="panel-body">
<?php
if (isset($data->error)){
  echo '<div class="alert alert-danger">'.($data->error).'</div>';
}
if (isset($data->message)){
  echo '<div class="alert alert-success">'.($data->message).'</div>';
}
?>

<?php echo '<h3>'.$title.'</h3>'; ?>
<br>
<?php require $sivu; ?>
</div>
</div>
</div>
</body>
</html>
