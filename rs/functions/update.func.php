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


//la function va modifier les informations du membre
function changer_les_informations_du_membre($pseudo,$email,$prenom,$nom,$apropos,$age,$sexe,$optionactif,$website){
	$query = mysql_query("UPDATE utilisateurs SET pseudo='$pseudo',email='$email',prenom='$prenom',nom='$nom',apropos='$apropos',age='$age',optionactif='$optionactif',website='$website'WHERE pseudo='{$_SESSION['pseudo']}'") or die(mysql_error());
}

//fucntion verifier email existe
function email_existe($email){

        $query= mysql_query("SELECT COUNT(id) FROM utilisateurs WHERE email = '$email'");
        return mysql_result($query,0);
}

//fucntion verifier pseudo existe
function pseudo_existe($pseudo){

        $query= mysql_query("SELECT COUNT(id) FROM utilisateurs WHERE pseudo = '$pseudo'");
        return mysql_result($query,0);
}
?>
