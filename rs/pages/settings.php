	<?php
  ini_set('display_errors','off');
  ini_set('default_charset', 'utf-8');
	session_start();
	if(!isset($_SESSION['pseudo'])){
		header('location:login.php');
	}
	?>

<html>
<head>

  <title>Steeds</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/settings.css">

</head>
<body>
    <form method="post">
    <?php 
        include('../body/header.php');
     ?>
    </form>
    <br>
    <div id="inside">
    <h3>Profil :</h3>
     <a href="update.php"><label>Changer mes informations</label></a><br><br>
     <a href="update-avatar.php"><label>Changer ma photo de profil</label></a><br><br>
     <hr>
     <h3>Sécurité :</h3>
     <a href="update-password.php"><label> Changer mon mot de passe</label></a><br><br>
     <hr>
     <h3>Se déconnecter :</h3>
     <a href="logout.php"><label>Se déconnecter</label></a><br><br>
    </div>
</body>
</html>