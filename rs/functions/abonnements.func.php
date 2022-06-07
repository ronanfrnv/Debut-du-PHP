<?php
//connexion base de donnée
mysql_connect('localhost','root','')or die ('error');
mysql_select_db('steeds') or die ('Base de donnée introuvable');
mysql_query('SET NAMES utf8');

	function abonnements_liste(){
		$listes = array();
		$pseudo = $_SESSION['pseudo'];
		$query = mysql_query("SELECT * FROM amis WHERE pseudo_exp = '$pseudo'");
		while($row = mysql_fetch_assoc($query)){
		$listes[] = $row;
		}
		return $listes;
	}
	function abonnements_liste1(){
		$listes = array();
		$pseudo = $_GET['pseudo'];
		$query = mysql_query("SELECT * FROM amis WHERE pseudo_exp = '$pseudo'");
		while($row = mysql_fetch_assoc($query)){
		$listes[] = $row;
		}
		return $listes;
	}

?>