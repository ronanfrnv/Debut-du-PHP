<?php
	//connexion base de donnée
	mysql_connect('localhost','root','')or die ('error');
	mysql_select_db('steeds') or die ('Base de donnée introuvable');
	mysql_query('SET NAMES utf8');

session_start();
mysql_query("UPDATE utilisateurs SET date_deconnexion= NOW() WHERE pseudo='{$_SESSION['pseudo']}'") or die(mysql_error());
mysql_query("UPDATE utilisateurs SET actif ='0'WHERE pseudo='{$_SESSION['pseudo']}'") or die(mysql_error());
session_destroy();
header('Location:login.php')

 ?>