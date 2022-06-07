 <?php
  ini_set('display_errors','on');
	ini_set('default_charset', 'utf-8');
	if (isset($_POST['submit'])) {
    $pseudo = mysql_real_escape_string(htmlspecialchars(trim($_POST['pseudo'])));
    $pseudolength = strlen($pseudo);
    $email = mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
    $prenom = mysql_real_escape_string(htmlspecialchars(trim($_POST['prenom'])));
    $nom = mysql_real_escape_string(htmlspecialchars(trim($_POST['nom'])));
    $apropos = mysql_real_escape_string(htmlspecialchars(trim($_POST['apropos'])));
    $aproposlength = strlen($apropos);
    $password = mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
    $repeatpassword = mysql_real_escape_string(htmlspecialchars(trim($_POST['repeatpassword'])));
    $age = mysql_real_escape_string(htmlspecialchars(trim($_POST['age'])));
  	$sexe = mysql_real_escape_string(htmlspecialchars(trim($_POST['sexe'])));

//function d'inscrire l'utilisateurs
function inscrire_utilisateur($pseudo,$email,$prenom,$nom,$password,$apropos,$avatar,$age,$sexe){
mysql_query("INSERT INTO `utilisateurs`(id,pseudo,email,prenom,nom,password,apropos,avatar,age,sexe,date_inscription) VALUES ('','$pseudo','$email','$prenom','$nom','$password','$apropos','default.jpg','$age','$sexe',NOW())")or die ('erreur SQL');
}
//fucntion verifier email existe
function pseudo_existe($pseudo){

        $query= mysql_query("SELECT COUNT(id) FROM utilisateurs WHERE pseudo = '$pseudo'");
        return mysql_result($query,0);
}
//fucntion verifier email existe
function email_existe($email){

        $query= mysql_query("SELECT COUNT(id) FROM utilisateurs WHERE email = '$email'");
        return mysql_result($query,0);
}

if(!empty($pseudo)){
 if (ctype_lower($pseudo)) {
  if ($pseudolength <= 20) {
   if ($pseudolength >= 5) {
	if (pseudo_existe($pseudo) == 0) {
	 if (!empty($email)&& filter_var($email,FILTER_VALIDATE_EMAIL)){
	  if (email_existe($email) == 0) {
	   if(!empty($prenom) && !empty($nom)){
		if(!empty($password) && !empty($repeatpassword)){
		 if($password == $repeatpassword ){
		  if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $password)){
		   if(!empty($age)){
			 if(!empty($apropos)){
			  if ($aproposlength <= 200) {
				$_SESSION['pseudo'] = $_POST['pseudo'];
				inscrire_utilisateur($pseudo,$email,$prenom,$nom,$password,$apropos,$avatar,$age,$sexe);
				$good ='Inscription enregisté vous allez etre rediriger vers la page de connexion';
				header ("index.php?page=login");
	}else{
			$erreur = 'Votre description est trop grandes' ;
	}
	}else{
			$erreur = 'Veuillez vous décrire en quelque mots' ;
	}
	}else{
			$erreur = 'Veuillez saisir votre age' ;
	}
	}else{
			$erreur = 'Veuillez saisir des mots de passes valides ' ;
	}
	}else{
			$erreur = 'Veuillez saisir des mots de passes identiques' ;
	}
	}else{	
			$erreur = 'Veuillez saisir un mot de passe et le confirmer' ;
	}
	}else{
			$erreur = 'Veuillez saisir votre  prenom et nom' ;
	}
	}else{
			$erreur = 'Cette adresse email existe déja' ;
	}
	}else{
			$erreur = 'Veuillez saisir une adresse email correcte' ;
	}
	}else{
			$erreur = 'le pseudo est indisponible';
	}
	}else{
			$erreur = 'Votre pseudo est trop petit' ;
	}
	}else{
			$erreur = 'Votre pseudo est trop grand' ;
	}
	}else{
			$erreur = 'Le pseudo ne peut pas contenir de majuscule' ;
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
  <link rel="icon" href="../logo/facebook.png" />

</head>
<body>
    <form method="post">
    <div class="header">
    <nav role="navigation">
        <ul>
        <li style="float:left" ><a href=""><h2>Steeds</h2></a></li>
        <li style="float:right"><a href="index.php?page=login.php"><h2>Connectez-vous</h2></a></li>
        </ul>
    </nav>
    </div>
  <section>
  <div id ="container">
      <p style="text-decoration: underline 1px;">Bienvenue sur Steeds</p>
  </div>

  <div id="sign">
      <p>Inscrivez vous ou connectez vous si vous vous acceder au site :</p>
  </div>    
  <div id ="inside">
		<label for="pseudo"> Votre pseudo</label><br>
		<input type="text" name="pseudo" placeholder="Pseudo" value="<?php 
		if (isset($_POST['submit'])) {
		echo isset($pseudo)?$pseudo:'';
		}?>" ><br>

		<label for="email"> Votre Email</label><br>
		<input type="text" name="email" placeholder="Exemple@domaine.com" value="<?php
		 if (isset($_POST['submit'])) {
		 echo isset($email)?$email:'';
		 } ?>"><br>

		<label for="prenom"> Votre Prenom</label><br>
		<input type="text" name="prenom" placeholder="Prénom" value="<?php
		 if (isset($_POST['submit'])) {
			echo isset($prenom)?$prenom:'';
		}?>"><br>
			

		<label for="nom"> Votre nom</label><br>
		<input type="text" name="nom" placeholder="Nom" value="<?php
		if (isset($_POST['submit'])) {
			echo isset($nom)?$nom:'';
			}?>"><br>

		<label for="password"> Entrer votre mot de passe</label><br>
		<input type="password" name="password" placeholder="*********"><br>

		<label for="repeatpassword">Veuillez repettez votre password</label><br>
		<input type="password" name="repeatpassword" placeholder="*********"><br>

		<label for="age"> Mon Age :</label><br>
	    <input type="number" name="age" placeholder="Age" value="<?php
	    if (isset($_POST['submit'])) {
			echo isset($age)?$age:'';
			}?>"><br>
		
		<label for="sexe"> Mon Sexe :</label><br>
		<select name="sexe" size="1">
		<option>Homme</option>
		<option>Femme</option>
		</select>
		
		<label for="apropos">Bio :</label><br>
		<textarea rows="5" cols="30" placeholder="Biographie" name="apropos"></textarea><br>

			<br><input style="float:right;margin-top: -10px;" type="submit" name="submit" value="Se connecter"><br>
			<?php
		    if(isset($erreur)){
		      echo '<text  style="color: red; font-weight: bold; font-size:14px;">'.$erreur.'</text>';
		    }
			?>
   </form>  
  </div>  
  		<div id="sign">
		<text style="float: left;margin-right: 50px;">Téléchargez l’Application :</text><br>
		</div>
		 <a href="#"><img style="margin-top: 20px;margin-left: 100px;"src="logo/appstore_badge.png" height="80" width="260"></a>
		 <a href="#"><img style="margin-left: 50px;"src="logo/google-play-badge.png" height="80" width="260"></a>
	</section>	
</body>
</html>