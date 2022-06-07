<?php
	session_start();
  ini_set('display_errors','on');
	$infos = infos_membre_connecte();
	foreach ($infos as $info) {
  $pseudo = $_SESSION['pseudo'];
  $contenu = mysql_real_escape_string(htmlspecialchars(trim($_POST['contenu'])));
  $contenulength = strlen($contenu);

  if (isset($_POST['submit'])) {
    if ($contenulength <= 300) {
      if (!empty($contenu)) {
        enregistermessage($pseudo,$contenu);
        $good = 'Le message a bien été posté' ;
      }else{
      }
    }else{
    $erreur = 'Le message est trop grand' ;
    }
  }
}
	?>

<html>
<head>

  <title>Acceuil</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/membre.css">
</head>
<body>
    <?php 
        include('../body/header.php');
     ?>
<section>
        <form method="post">
        	<a href="myprofil.php"><img  style=" float:right;border-radius :50%;margin-top:10px;margin-right:40px;margin-bottom:10px;"src="../avatar/<?php echo $info['avatar'];?>"width="150px"height="150px"alt="avatar"></a>
            <div id="cadre">
            <div id="publier">
            <p>Publier un message : </p>
            </div>
            <div id="textarea">
              <textarea style="" placeholder="Exprime toi ici !" name="contenu"></textarea>
            </div>
            <?php
            if(isset($erreur)){
              echo '<p  style="color: red;margin-left:45px; font-weight: bold;margin-top: 16px;font-size : 18px;">'.$erreur.'</p>';
            }
		    if(isset($good)){
		      echo '<text style="color: green;margin-left:45px; font-weight: bold;margin-top: 16px;font-size : 18px;">'.$good.'</text>';
		    }
            ?>
            <input style="float: right; margin-right: 45px; margin-bottom: 15px;margin-top: 8px; width: 10%;" type="submit" name="submit">
           </div>
        </form>
</section>
</body>
</html>

<?php

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
  function enregistermessage($pseudo,$contenu){
    mysql_query("INSERT INTO `publication`(id,pseudo,contenu,date_publications) VALUES ('','$pseudo','$contenu',NOW())")or die ('erreur SQL');
}


  function abonnes_liste(){
    $listes = array();
    $pseudo = $_SESSION['pseudo'];
    $query = mysql_query("SELECT * FROM amis WHERE pseudo_dest = '$pseudo'");
    while($row = mysql_fetch_assoc($query)){
    $listes[] = $row;
    }
    return $listes;
  }
  function publications_liste(){
    $listes = array();
    $pseudo = $_SESSION['pseudo'];
    $query = mysql_query("SELECT * FROM publication WHERE pseudo = '$pseudo'");

    while($row = mysql_fetch_assoc($query)){
      $listes[] = $row;
    }
    return $listes;
  }
?>