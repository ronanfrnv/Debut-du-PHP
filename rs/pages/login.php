<?php
  ini_set('display_errors','on');
  ini_set('default_charset', 'utf-8');
	session_start();

	//function verifier si pseudo ets password sont dans la BDD
	function  verifier_combinaison_pseudo_password($pseudo,$password){
			$query = mysql_query("SELECT pseudo,password FROM utilisateurs WHERE pseudo = '$pseudo' AND password='$password'");
			$rows = mysql_num_rows($query);
			return $rows;
		}
		//la fonction qui va compter le nombre de personne inscrite
	function nombre_membre(){
		$query = mysql_query("SELECT COUNT(id) FROM utilisateurs");
		mysql_result($query,0);
		return mysql_result($query,0);

	}
	function update_connexion(){
		$ip = $_SERVER['REMOTE_ADDR'];
		$query = mysql_query("UPDATE utilisateurs SET date_connexion= NOW(),ip = '$ip' WHERE pseudo='{$_SESSION['pseudo']}'") or die(mysql_error());
	}
	function actif(){
			$query = mysql_query("UPDATE utilisateurs SET actif ='1'WHERE pseudo='{$_SESSION['pseudo']}'") or die(mysql_error());
	}

    if (isset($_POST['submit'])) {
		$pseudo = mysql_real_escape_string(htmlspecialchars(trim($_POST['pseudo'])));
		$password = mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
		

        if(!empty($pseudo)){
         if (ctype_lower($pseudo)) {
            if(!empty($password)){
        	   if(!verifier_combinaison_pseudo_password($_POST['pseudo'],$_POST['password'])== 0) {	
        		$_SESSION['pseudo'] = $_POST['pseudo'];
        			$good = 'Je suis coincé ici' ;
                actif();
                update_connexion();
        		header('location:../rs/pages/membre.php');
            	}else{
                    $erreur = 'Pseudo ou mot de passe incorrect' ;
                }
                }else{
                    $erreur = 'Veuillez saisir un mot de passe' ;
                }
                }else{
					$erreur = 'Le pseudo ne peut contenir de majuscule' ;
				}
                }else{
                    $erreur = 'Veuillez saisir un pseudo' ;
                }
        }
?>
<html>
<head>
    <title>Steeds</title>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <link rel="icon" href="../logo/facebook.png" />
</head>
<body>
     <form method="post" action="">
    <div class="header">
    <nav role="navigation">
        <ul>
        <li style="float:left;" ><a href=""><h2>Steeds</h2></a></li>
        <li style="float:right;"><a href="index.php?page=register"><h2>Inscrivez-vous</h2></a></li>
        </ul>
    </nav>
    </div>
    <section>
    	<article>
		    <div id ="container">
		            <p style="text-decoration: underline 1px;">Bienvenue sur Steeds</p>
		    </div>
		    <div id="sign">
		            <p>Inscrivez vous ou connectez vous pour acceder au site :</p>
		    <div id ="inside">
				<label for="pseudo"> Votre pseudo :</label><br>
				<input type="text" name="pseudo"placeholder="Pseudo"><br>

				<label for="password"> Votre mot de passe :</label><br>
				<input type="password" name="password" placeholder="*********"><br>
			<?php 
		      echo '<a href = "mdpoublie.php"<p style="color: black;text-decoration: underline 1px;font-weight: bold; font-size:16px;">mot de passe oublié</p></a>';
		    if(isset($erreur)){
		      echo '<text  style="color: red; font-weight: bold; font-size:16px;">'.$erreur.'</text>';
		    }
		    if(isset($good)){
		      echo '<text  style="color: green; font-weight: bold; font-size:16px;">'.$good.'</text>';
		    }
			?>
				<input style="float:right;margin-top: -10px;" type="submit" name="submit" value="Se connecter"><br>

			</form>
		    </div> 
		    </div>
		    </div>
		</article>	
	<aside>
		<img style=" margin-left: 1000px;margin-top: -380px;" src="logo/paris.jpg"height="508" width="850">
	</aside>	
			<div id="sign">
		    <text style="float: left;margin-right: 50px;">Téléchargez l’Application :</text><br>
			</div>
		   <a href="#"><img style="margin-top: 20px;margin-left: 100px;"src="logo/appstore_badge.png" height="80" width="260"></a>
		   <a href="#"><img style="margin-left: 50px;"src="logo/google-play-badge.png" height="80" width="260"></a>
		</section>	
								    <?php 
								    //$membres = nombre_membre()>1 ? nombre_membre().' membres':nombre_membre().' membre';
								    //echo '<p  style="color: black;">Nous comptons déjà '.$membres.'</p>';
								    ?>
</body>
</html>