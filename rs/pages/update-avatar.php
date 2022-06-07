	<?php
  ini_set('display_errors','off');
  ini_set('default_charset', 'utf-8');
	session_start();
  include('../functions/update-avatar.func.php');
  $infos = infos_membre_connecte();
	foreach ($infos as $info) {
	}
	if(!isset($_SESSION['pseudo'])){
		header('location:login.php');
	}

if (isset($_POST['submit'])) {
$avatar = $_FILES['avatar']['name'];
$avatar_tmp = $_FILES['avatar']['tmp_name'];
if(!empty($avatar)){
    $avatarExploded = explode('.',$avatar);
    $image_ext = strtolower(end($avatarExploded));
if(in_array($image_ext,array('jpg','jpeg','png','gif'))){

  modifier_image($avatar_tmp,$avatar);
  header("Location:myprofil.php");

}else{
  echo"<div id='error'>Fichier invalide</div>";
}
}
}


?>
<html>
<head>

  <title>Steeds</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/style.css">

</head>
<form method="POST"enctype="multipart/form-data">
<?php 
  include('../body/header.php');
?>
</form>
<br>
<div id="inside">
<h3>Changer l'image de profil</h3>
<img src="../avatar/<?php echo $info['avatar'];?>"width="180px"height="180px"alt="avatar"><br>
<input type="file" name="avatar"><br><br>
<input type="submit" name="submit" value="Valider"><br>
</form>
</div>
<?php 
  include('../body/footer.php');
 ?>