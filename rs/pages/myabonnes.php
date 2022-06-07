  <?php 
	session_start();
	ini_set('display_errors','off');
	include('../functions/abonnes.func.php');

	if(!isset($_SESSION['pseudo'])){
		header('location:login.php');
	}
	$listes = abonnes_liste1();
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
<p>Publications :</p>
</div>
<div id="cadre" style="width: 300%;">
<div id="inside">
<?php
foreach ($listes as $liste) {
echo $liste['pseudo_exp'];
}
?>
</div>
</div>
</body>
</html>

