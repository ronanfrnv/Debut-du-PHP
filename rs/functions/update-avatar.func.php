 <?php

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

function modifier_image($avatar_tmp,$avatar){
  move_uploaded_file($avatar_tmp,'../avatar/'.$avatar);
  mysql_query("UPDATE utilisateurs SET avatar='{$_FILES['avatar']['name']}' WHERE pseudo='{$_SESSION['pseudo']}'");
}
?>
