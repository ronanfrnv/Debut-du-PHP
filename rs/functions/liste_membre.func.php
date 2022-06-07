<?php
//connexion base de donnée

mysql_connect('localhost','root','')or die ('error');
mysql_select_db('steeds') or die ('Base de donnée introuvable');
mysql_query('SET NAMES utf8');

//la function va recuperer le pseudo est l'avatar du membre
include('../membre.php');
function recuperer_pseudo_avatar(){
$results = array();
$pseudo = mysql_real_escape_string(htmlspecialchars($_SESSION['pseudo']));
$query = mysql_query("SELECT * FROM utilisateurs WHERE pseudo!= '$pseudo'");

while($row = mysql_fetch_assoc($query)){
	$results[] = $row;
}
return $results;
}
?>