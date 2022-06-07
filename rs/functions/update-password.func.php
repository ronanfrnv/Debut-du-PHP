<?php
//connexion base de donnée
mysql_connect('localhost','root','')or die ('error');
mysql_select_db('steeds') or die ('Base de donnée introuvable');
mysql_query('SET NAMES utf8');

//la function va recuperer les  infos de l'utilisateur connecter
function infos_membre_connecte(){
$infos = array();
$pseudo = $_SESSION['pseudo'];
$query = mysql_query("SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'");

while($row = mysql_fetch_assoc($query)){
	$infos[] = $row;
}
return $infos;
}

function changer_les_informations_du_membre($newpassword){
	$query = mysql_query("UPDATE utilisateurs SET password='$newpassword' WHERE pseudo='{$_SESSION['pseudo']}'") or die(mysql_error());
}

?>