	<?php
  ini_set('display_errors','off');
  ini_set('default_charset', 'utf-8');
	session_start();
	include('../functions/update.func.php');
    
    if(!isset($_SESSION['pseudo'])){
		header('location:login.php');
    }
    $infos = infos_membre_connecte();
		foreach ($infos as $info) {
	   }
    $pseudo = mysql_real_escape_string(htmlspecialchars(trim($_POST['pseudo'])));
    $pseudolength = strlen($pseudo);
    $email = mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
    $prenom = mysql_real_escape_string(htmlspecialchars(trim($_POST['prenom'])));
    $nom = mysql_real_escape_string(htmlspecialchars(trim($_POST['nom'])));
    $apropos = mysql_real_escape_string(htmlspecialchars(trim($_POST['apropos'])));
    $aproposlength = strlen($apropos);
    $password = mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
    $age = mysql_real_escape_string(htmlspecialchars(trim($_POST['age']))); 
  	$sexe = mysql_real_escape_string(htmlspecialchars(trim($_POST['sexe'])));
    $optionactif = mysql_real_escape_string(htmlspecialchars(trim($_POST['optionactif'])));
    $website = mysql_real_escape_string(htmlspecialchars(trim($_POST['website'])));
 
  if (isset($_POST['submit'])) {
    if (!empty($pseudo)){
      if ($pseudolength <= 20) {
        if ($pseudolength >= 5) {
          if (pseudo_existe($pseudo) == 0 OR $pseudo == $info['pseudo']) { 	
            if (!empty($email)&& filter_var($email,FILTER_VALIDATE_EMAIL)){
              if (email_existe($email) == 0 OR $email == $info['email'] ) {
                if(!empty($prenom) && !empty($nom)){
                  if(!empty($apropos)){
                  	 if(is_numeric($age)){
                      if ($aproposlength <= 200) {
                       if ($password ==  $info['password']){
                        	changer_les_informations_du_membre($pseudo,$email,$prenom,$nom,$apropos,$age,$sexe,$optionactif,$website);
                        	header('Location:myprofil.php');
  	}else{
          $erreur = 'Veuillez saisir votre mot de passe' ;
    }
    }else{
          $erreur = 'Votre déscription est trop grandes' ;
    }
  	}else{
     	 	  $erreur = 'L\'age indiqué n\'est pas correcte' ;
  	} 
    }else{
     	 	  $erreur = 'Veuillez vous décrire en quelque mots' ;
  	}  
  	
    }else{
      		$erreur = 'Veuillez saisir votre  prenom et nom' ;
  	}
    
    }else{
          $erreur = 'Cette adresse email existe déja';
    }	
    
    }else{
		    	$erreur = 'Veuillez saisir une adresse email correcte' ;
	  }

    }else{
		  	  $erreur = 'Le pseudo est indisponible';
    }
	
    }else{
		  	  $erreur = 'Votre pseudo est trop petit' ;
    }

  	}else{
  			  $erreur = 'Votre pseudo est trop grand' ;
  	}

  	}else{
  			  $erreur = 'Veuillez saisir un pseudo' ;
  	}

}

?>

<html>
<head>

  <title>Steeds</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<section>
    <form method="post">
    <?php 
        include('../body/header.php');
     ?>
  <section>
  <div id="sign">
      <p>Modifier mon profil</p>
  </div>    
  <div id ="inside">
    <label for="pseudo">Mon Pseudo :</label><br>
    <input type="text" name="pseudo"value="<?php echo $info['pseudo'];?>" ><br>

	<label for="email"> Mon Email:</label><br>
	<input type="text" name="email" value="<?php echo $info['email'];?>"><br>

    <label for="prenom"> Mon Prenom :</label><br>
    <input type="text" name="prenom" value="<?php echo $info['prenom'];?>"><br>
    
    <label for="prenom"> Mon Nom :</label><br>
    <input type="text" name="nom" value="<?php echo $info['nom'];?>"><br>


	 <label for="age"> Mon Age :</label><br>
    <input type="number" name="age"value="<?php echo $info['age'];?>"><br>
  
   <label for="optionactif"> Afficher Mon Statut En Ligne :</label><br>
   <select name="optionactif" size="1">
   <option value="0">Oui</option>
   <option value="1">Non</option>
   </select>	

   <label for="sexe"> Mon Sexe :</label><br>
   <select name="sexe" size="1">
   <option selected><?php echo $info['sexe'];?></option>
   <option>Homme</option>
   <option>Femme</option>
   </select>

    <label for="website">Liens :</label><br>
    <input type="text" name="website" value="<?php echo $info['website'];?>"><br>

 	<label for="apropos">Bio :</label><br>
	<textarea rows="5" name="apropos"><?php echo $info['apropos'];?></textarea><br>

    <label for="password"> Veuillez saisir votre mot de passe pour modifier vos informations :</label><br>
    <input type="password" name="password" ><br>


    <?php
    if(isset($erreur)){
      echo '<p  style="color: red; font-weight: bold; font-size:16px;">'.$erreur.'</p>';
    }
    ?>

    <input type="submit" name="submit" value="Modifier"><br>	
   </form>  
  </div>  
  </section>
<?php 
  include('../body/footer.php');
 ?>
</body>
</html>