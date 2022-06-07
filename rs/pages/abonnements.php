  <?php 
	session_start();
	ini_set('display_errors','on');
	include('../functions/abonnements.func.php');

	if(!isset($_SESSION['pseudo'])){
		header('location:login.php');
	}
	$listes = abonnements_liste1();
  	foreach ($listes as $liste) {
  	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<link rel="stylesheet" href="../css/publications.css">
	<title>Publications</title>
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
echo $liste['pseudo_dest'];
?>
</div>
</div>
</body>
</html>

