<!DOCTYPE HTML>
<html>
<head><title>Lankatietokanta | <?php echo $title; ?></title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
</head>
<body>
<?php
echo '<h1>'.$title.'</h1>';

showMenu();

if (isset($data->error)){
echo '<div class="alert alert-danger">'.($data->error).'</div>';
}
if (isset($data->message)){
echo '<div class="alert alert-success">'.($data->message).'</div>';
}

?>
<div id="content">
<?php require $sivu; ?>
</div>
</body>
</html>
