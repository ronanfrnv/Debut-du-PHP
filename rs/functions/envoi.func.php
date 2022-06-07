<?php
//connexion base de donnée

mysql_connect('localhost','root','')or die ('error');
mysql_select_db('steeds') or die ('Base de donnée introuvable');
mysql_query('SET NAMES utf8');

function enreg_invitation(){
	$query = mysql_query("INSERT INTO amis (id_invitation,pseudo_exp,pseudo_dest,date_invitation,date_confirmation VALUES ('','{$_SESSION['pseudo']}','{$_GET['pseudo']}',NOW(),'',0)");
}
?>