<?php
ini_set('display_errors','on');
mysql_connect('localhost','root','')or die ('error');
mysql_select_db('steeds') or die ('Base de donnée introuvable');
mysql_query('SET NAMES utf8');
ini_set('default_charset', 'utf-8');
$page = htmlspecialchars($_GET['page']);
$pages = scandir('pages');

if (!empty($page) && in_array($_GET['page'].'.php',$pages)) {
	$content = 'pages/'.$_GET['page'].'.php';
}else{
	header('Location:index.php?page=login');
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="logo/english.png" title="Freepik">
<link rel="stylesheet" href="css/style.css">
<meta charset="UTF-8">
</head>
<body>
		<div id="content">
			<?php
			 include($content);
			?>
		</div>
</body>
</html>