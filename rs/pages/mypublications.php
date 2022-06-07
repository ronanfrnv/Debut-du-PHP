<?php 
	session_start();
	ini_set('display_errors','off');
	include('../functions/myprofil.func.php');
	include('../functions/mypublications.func.php');
	$listes = publications_liste();
	$nombre_likes = nombre_likes();
  	$nombre_repost = nombre_repost();

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
<div id="cadre">
<div id="inside">
<?php
foreach ($listes as $liste) {
echo '<mark style="font-size:28px;><text style="font-size:28px;">'.ucfirst($_SESSION['pseudo']).' :</text></mark>';
if ($_SESSION['pseudo'] == $liste['pseudo']) {
	echo '<img src="../logo/edit.png"  style="margin-right:10px;margin-top:25px;float:right;" height="20" width="20">';
	echo '<img src="../logo/litter.png"  style="margin-right:10px;margin-top:25px;float:right;" height="20" width="20">';
}
if(empty($liste['contenu'])){
echo '<p style="font-size:24px;margin-top:12px;font-family:Courier,monospace;margin-left:12px;">Ne sais toujours pas exprimer</p>';
}else{
echo '<p style="font-size:24px;margin-top:12px;font-family:Courier,monospace;margin-left:12px;">'.$liste['contenu'].'</p>';
echo '<text style="float:right;font-weight:bold;margin-right:20px;font-size:14px">'.$liste['date_publications'].'</text>';
}
?>
<?php
if ($liste['pseudo'] == $_SESSION['pseudo']) {
	echo '<text style="margin-left:350px;">'.$nombre_likes.' Likes</text>';
	echo '<text style="margin-left:350px;">'.$nombre_repost.' Reposts</text><br>';
}else{
	if ($_SESSION['pseudo'] !=$liste['pseudo']) {
		echo '<img src="../logo/heart.png"  style="margin-left:350px;" height="25" width="25">';
	}else{
		echo '<img src="../logo/heart(1).png"  style="margin-left:200px;" height="25" width="25">';
	}
echo '<img src="../logo/retweet.png"  style="margin-left:200px;" height="25" width="25">';
echo '<img src="../logo/upload.png"  style="margin-left:200px;" height="25" width="25"><br>';
}
}
?>
</div>
</div>
</body>
</html>

