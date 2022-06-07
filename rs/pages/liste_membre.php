	<?php
  session_start();
  ini_set('display_errors','off');
  include('../functions/liste_membre.func.php');
  include('../functions/actif.php');
  if(!isset($_SESSION['pseudo'])){
    header('location:login.php');
  }
  $results = recuperer_pseudo_avatar();
	?>



<html>
<head>
  <title>Steeds</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/publications.css">
</head>
<body>
    <?php 
        include('../body/header.php');
     ?>
    <div id="container">
      <p>Liste des membres</p>
    </div>
    <form method="POST">
    <div id="inside">
      <?php
      foreach ($results as $result) {
      ?>
        <a href="profil.php"><img style="margin-right:10px;border-radius :50%;"src="../avatar/<?php echo $result['avatar'];?>" height='50px' width='50px'  alt='avatar'></a>
        <a href="profil.php"><text style="font-size: 18px;">
          <?php
          $_GET['pseudo'] = $result['pseudo']; 
          echo ucfirst($result['pseudo']);
        ?></text></a>
      
      <?php
        }
      ?>
    </div>
</form>
</body>
</html>