  <?php
  ini_set('display_errors','off');
  ini_set('default_charset', 'utf-8');
  session_start();
  if(!isset($_SESSION['pseudo'])){
  header('location:login.php');
  }

  include('../functions/myprofil.func.php');
  $informations = infos_membre_connecte();
  foreach ($informations as $information) {
  }
  $nombre_publications = nombre_publications();
  $nombre_abonner = nombre_abonner();
  $nombre_abonnement = nombre_abonnement();

  ?>
<html>
<head>
<title>Profil-<?php  echo $information['pseudo']; ?></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/profil.css">
</head>
<body>
            <?php 
                include('../body/header.php');
            ?>
<section>
    <a href="settings.php"><img  style="float:right;margin-right:10px;margin-top:10px; height:27px;" src="../logo/gear.png"></a>
      <div id="pseudo">
          <?php
          echo '</br><mark><text style=" font-style: oblique; font-weight: bold;">'.$information['pseudo'].' :</text></mark>';
        if($information['optionactif'] == 0){
          if ($information['actif'] == 1 ){
            echo'<text style="font-size :30px;margin-left:40px;font-family: arial;color:green;">En ligne</text>';
          }else{
            echo'<text style="font-size :30px;margin-left:40px;font-family: arial;color:black;">Hors ligne</text>';
          }
        }
        echo '<text style="font-size :27px;margin-left:90px;font-family: Arial;"><a href="mypublications.php">'.$nombre_publications.' Publications</a></text>';
          echo'<text style="font-size :27px;margin-left:90px;font-family: Arial;"><a href="myabonnes.php">'.$nombre_abonner.' Abonnés</a></text>';
            echo'<text style="font-size :27px;margin-left:90px;font-family: Arial;"><a href="myabonnements.php">'.$nombre_abonnement.' Abonnements</a></text>';
              if ($_SESSION['pseudo'] == $information['pseudo'] ) {
               echo'<a href="upload.php"><img  style="margin-left:90px;font-family: Arial; height:27px;" src="../logo/upload.png"></a>';
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
      </div><br>
      <div id="cadre">
      <img  style=" float:right;border-radius :50%; margin-top:40px;margin-right:40px;margin-bottom:40px;"src="../avatar/<?php echo $information['avatar'];?>"width="40"height="40"alt="avatar">

      <div id="infoprenom">
          <?php
          if ($information['certification'] == 1) {
          echo'<text>'.$information['prenom'].' '.$information['nom'].'</text>';
          echo'<img style=" margin-left:40px;margin-top:40px;"src="../logo/certification.png"width="40px"height="40px">';
          }else{
          echo'<br><text>'.$information['prenom'].' '.$information['nom'].'</text>';
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
</body>
</html>