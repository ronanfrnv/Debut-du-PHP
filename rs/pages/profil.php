  <?php
  ini_set('display_errors','offe');
  ini_set('default_charset', 'utf-8');
  session_start();
  if(!isset($_SESSION['pseudo'])){
  header('location:login.php');
  }
  include('../functions/profil.func.php');
  $informations = recuperer_infos_membre_choisi();
  $nombre_publications = nombre_publications();
  foreach ($informations as $information) {
  }

  $nombre_publications = nombre_publications();
  $nombre_abonner = nombre_abonner();
  $nombre_abonnement = nombre_abonnement();

  ?>

<html>
<head>
<title>Profil - <?php  echo $information['pseudo']; ?></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/profil.css">
</head>
<body>
            <?php 
                include('../body/header.php');
            ?>
<section>
  <form method="post">
      <div id="pseudo">
          <?php
          echo '</br><mark><text style=" font-style: oblique; font-weight: bold;">'.ucfirst($information['pseudo']).' :</text></mark>';
        if($information['optionactif'] == 0){
          if ($information['actif'] == 1 ){
            echo'<text style="font-size :30px;margin-left:40px;font-family: arial;color:green;">En ligne</text>';
          }else{
            echo'<text style="font-size :30px;margin-left:40px;font-family: arial;color:black;">Hors ligne</text>';
          }
        }
        echo '<a href="publications.php"><text style="font-size :27px;margin-left:90px;font-family: Arial;">'.$nombre_publications.' Publications</text></a>';
          echo'<a href="abonnes.php"><text style="font-size :27px;margin-left:90px;font-family: Arial;">'.$nombre_abonner.' Abonnés</text></a>';
            echo'<a href="abonnements.php"><text style="font-size :27px;margin-left:90px;font-family: Arial;">'.$nombre_abonnement.' Abonnements</text></a>';
              if ($_SESSION['pseudo'] == $information['pseudo'] ) {
               echo'<a href="update.php"><text style="font-size :27px;margin-left:90px;font-family: Arial;">Modifier mon profil</text></a>';
              }
              if ($_SESSION['pseudo'] != $information['pseudo'] ) {
                if (abonner_existe() == 0){
                  echo'<input style="margin-left:90px;width:200px;height:50px;background-color:#DCDCDC color:black;" type="submit" name="follow" value="S\'abonner"><br>';
                 if (isset($_POST['follow'])) {
                    follow(); 
                  }
                }else{
                  echo'<input style="margin-left:90px;width:200px;height:50px;background-color:#DCDCDC color:black;" type="submit" name="unfollow" value="Se désabonner"><br>';
                 if (isset($_POST['unfollow'])) {
                    unfollow(); 
                  }
                } 
                }
                          
          ?>
    </form>
      </div><br>
      <div id="cadre">
      <img  style=" float:right;border-radius :50%; margin-top:40px;margin-right:40px;margin-bottom:40px;"src="../avatar/<?php echo $information['avatar'];?>"width="150px"height="150px"alt="avatar">

      <div id="infoprenom">
          <?php
          if ($information['certification'] == 1) {
          echo'<text>'.ucfirst($information['prenom']).' '.ucfirst($information['nom']).'</text>';
          echo'<img style=" margin-left:40px;margin-top:40px;"src="../logo/certification.jpg"width="40px"height="40px">';
          }else{
          echo'<br><text>'.ucfirst($information['prenom']).' '.ucfirst($information['nom']).'</text>';
          }
          ?>
      </div>
      <div id="bio">
      <?php
        if(!empty($information['website'])){
          echo '<a href="https://'.$information['website'].'"><text style="font-size:24px;color:blue;margin-top:0px;font-family:Courier,monospace;margin-left:32px;">'.$information['website'].'</text></a>';
         }
        ?>
          <div id="inside-bio">
          <?php
          echo '<text>'.$information['apropos'].'</text>';
          ?>
      <br>
      </div>  
      </div>
</section>
</body>
</html>