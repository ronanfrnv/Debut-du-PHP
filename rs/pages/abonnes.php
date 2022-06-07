  <?php 
	session_start();
	ini_set('display_errors','on');
	include('../functions/abonnes.func.php');

	if(!isset($_SESSION['pseudo'])){
		header('location:login.php');
	}
	$listes = abonnes_liste1();
  	foreach ($listes as $liste) {
  	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<link rel="stylesheet" href="../css/publications.css">
	<title>Abonnés</title>
</head>
<body>
	<?php 
        include('../body/header.php');
     ?>
<div id="container">
<p>Abonnés :</p>
</div>
<div id="cadre" style="width: 300%;">
<div id="inside">
<?php
echo $liste['pseudo_exp'];
?>
</div>
</div>
</body>
</html>

