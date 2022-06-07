<?php 
	session_start();
	ini_set('display_errors','off');
	include('../functions/publications.func.php');
	$listes = publications_liste();
	if(!isset($_SESSION['pseudo'])){
	header('location:login.php');
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
foreach ($listes as $liste) {
echo '<mark style="font-size:28px;><text style="font-size:28px;">'.ucfirst($_GET['pseudo']).' :</text></mark>';
if(empty($liste['contenu'])){
echo '<p style="font-size:24px;margin-top:12px;font-family:Courier,monospace;margin-left:12px;">Ne sais toujours pas exprimer</p>';
}else{
echo '<p style="font-size:24px;margin-top:12px;font-family:Courier,monospace;margin-left:14px;">'.$liste['contenu'].'</p>';
echo '<p style="float:right;font-weight:bold;font-size:12px">'.$liste['date_publications'].'</p><br>';
}
}
?>
</div>
</div>
</body>
</html>