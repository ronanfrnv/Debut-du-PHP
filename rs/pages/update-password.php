  <?php
  ini_set('display_errors','off');
  ini_set('default_charset', 'utf-8');
  session_start();
  include('../functions/update-password.func.php');
    
    if(!isset($_SESSION['pseudo'])){
    header('location:login.php');
    }
    $infos = infos_membre_connecte();
    foreach ($infos as $info) {
     }
    $password = mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
    $newpassword = mysql_real_escape_string(htmlspecialchars(trim($_POST['newpassword'])));
    $repeatnewpassword = mysql_real_escape_string(htmlspecialchars(trim($_POST['repeatnewpassword'])));

  if(!empty($password) && !empty($newpassword)&& !empty($repeatnewpassword)){
    if ($password ==  $info['password']){
      if ($newpassword ==  $repeatnewpassword){
        if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $newpassword)){
          changer_les_informations_du_membre($newpassword);
          header('Location:logout.php');
    
    }else{
          $erreur = "Veuillez saisir des mots de passes valides";
    }
    }else{
          $erreur = 'Les nouveaux mots de passes ne sont pas identiques' ;
    }  
    }else{
          $erreur = "Votre mot passe actuel est incorrect";
    }
    }else{
          $erreur = "Veuillez saisir l'ensemble des champs demandé" ;
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

    <label for="password"> Veuillez saisir votre ancien mot de passe :</label><br>
    <input type="password" name="password" ><br>

    <label for="password"> Veuillez saisir votre nouveau mot de passe :</label><br>
    <input type="password" name="newpassword" ><br>

    <label for="password"> Veuillez repettez votre nouveau mot de passe :</label><br>
    <input type="password" name="repeatnewpassword" ><br>

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