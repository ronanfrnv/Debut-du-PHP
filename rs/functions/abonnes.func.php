<?php
//connexion base de donnée
mysql_connect('localhost','root','')or die ('error');
mysql_select_db('steeds') or die ('Base de donnée introuvable');
mysql_query('SET NAMES utf8');

	function abonnes_liste(){
		$listes = array();
		$pseudo = $_SESSION['pseudo'];
		$query = mysql_query("SELECT * FROM amis WHERE pseudo_dest = '$pseudo'");
		while($row = mysql_fetch_assoc($query)){
		$listes[] = $row;
		}
		return $listes;
	}
	function abonnes_liste1(){
		$listes = array();
		$pseudo = $_SESSION['pseudo'];
		$query = mysql_query("SELECT * FROM amis WHERE pseudo_dest = '$pseudo'");
		while($row = mysql_fetch_assoc($query)){
		$listes[] = $row;
		}
		return $listes;
	}

?>