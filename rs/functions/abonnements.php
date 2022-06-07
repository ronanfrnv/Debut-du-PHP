<?php

	function follow_liste(){
		$listes = array();
		$pseudo = $_SESSION['pseudo'];
		$query = mysql_query("SELECT * FROM amis WHERE pseudo_exp = '$pseudo'");
		while($row = mysql_fetch_assoc($query)){
		$listes[] = $row;
		}
		return $listes;
	}

	function follow_liste1(){
		$listes = array();
		$pseudo = $_GET['pseudo'];
		$query = mysql_query("SELECT * FROM amis WHERE pseudo_exp = '$pseudo'");
		while($row = mysql_fetch_assoc($query)){
		$listes[] = $row;
		}
		return $listes;
	}

?>