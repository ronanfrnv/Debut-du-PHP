<?php
//connexion base de donnée
mysql_connect('localhost','root','')or die ('error');
mysql_select_db('steeds') or die ('Base de donnée introuvable');
mysql_query('SET NAMES utf8');

//la function va recuperer les  infos de l'utilisateur connecter
function infos_membre_connecte(){
$informations = array();
$pseudo = $_SESSION['pseudo'];
$query = mysql_query("SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'");

while($row = mysql_fetch_assoc($query)){
	$informations[] = $row;
}
return $informations;
}
	//la fonction qui va compter le nombre de publications inscrite
	function nombre_publications(){
		$pseudo = $_SESSION['pseudo'];
		$query = mysql_query("SELECT COUNT(id) FROM publication WHERE pseudo = '$pseudo'");
		mysql_result($query,0);
		return mysql_result($query,0);
	}
	function follow(){
	$pseudo = $_SESSION['pseudo'];
	$pseudo2 = $_GET['pseudo'];
	mysql_query("INSERT INTO `amis`(id_invitation,pseudo_exp,pseudo_dest,date_invitation) VALUES ('','$pseudo','$pseudo2',NOW())")or die ('erreur SQL');
	}

	function unfollow(){
	$pseudo = $_SESSION['pseudo'];
	$pseudo2 = $_GET['pseudo'];
	mysql_query("DELETE from amis WHERE pseudo_exp = '$pseudo' AND pseudo_dest = '$pseudo2'")or die ('erreur SQL');
	}

	function abonner_existe(){
	$pseudo = $_SESSION['pseudo'];
	$pseudo2 = $_GET['pseudo'];
    $query= mysql_query("SELECT COUNT(id_invitation) FROM amis WHERE pseudo_exp = '$pseudo' AND pseudo_dest = '$pseudo2'");
        return mysql_result($query,0);
	}

	//la fonction qui va compter le nombre d'abonner inscrite
	//la fonction qui va compter le nombre d'abonner inscrite
	function nombre_abonner(){
		$pseudo = $_SESSION['pseudo'];
		$query = mysql_query("SELECT COUNT(id_invitation) FROM amis WHERE pseudo_dest = '$pseudo'");
		mysql_result($query,0);
		return mysql_result($query,0);
	}

		//la fonction qui va compter le nombre d'abonnements inscrite
	function nombre_abonnement(){
		$pseudo = $_SESSION['pseudo'];
		$query = mysql_query("SELECT COUNT(id_invitation) FROM amis WHERE pseudo_exp = '$pseudo'");
		mysql_result($query,0);
		return mysql_result($query,0);
	}
?>