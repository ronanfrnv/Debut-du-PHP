<?php
//connexion base de donnée

mysql_connect('localhost','root','')or die ('error');
mysql_select_db('steeds') or die ('Base de donnée introuvable');
mysql_query('SET NAMES utf8');
//la function va recuperer les  infos de l'utilisateur connecter
include('liste_membre.func.php');
function publications_liste(){
$listes = array();
$pseudo = $_SESSION['pseudo'];
$query = mysql_query("SELECT * FROM publication WHERE pseudo = '$pseudo' ");

while($row = mysql_fetch_assoc($query)){
	$listes[] = $row;
}
return $listes;
}

	function nombre_likes(){
		$pseudo = $_SESSION['pseudo'];
		$query = mysql_query("SELECT COUNT(id_invitation) FROM amis WHERE pseudo_dest = '$pseudo'");
		mysql_result($query,0);
		return mysql_result($query,0);
	}
	function nombre_repost(){
		$pseudo = $_SESSION['pseudo'];
		$query = mysql_query("SELECT COUNT(id_invitation) FROM amis WHERE pseudo_dest = '$pseudo'");
		mysql_result($query,0);
		return mysql_result($query,0);
	}

?>