<?php
session_start();
if (!isset($_SESSION['Login'])) {
	header('location:../index.php');
}
include("cnx.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Creer Admin</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<style type="text/css">
		.positionMenu2{
			background-color: grey;
		}
		.color a{
			color: blue;
		}
	</style>
</head>
<body>
<div class="principal mt-1">
	<div class="header">
		<?php include('header.php') ?>
	</div>
	<?php include('menu.php') ?>
	<div class="cadre">
		<div class="profil">
			 <div class="prenom"><?php echo $_SESSION['prenom']?></div>
			 <div class="prenom"><?php echo $_SESSION['nom']?></div>
			 <div class="menuQuest " ><li><a href="lister_admin.php">Lister</a></li></div>
			 <div class="menuQuest" ><li><a href="creation_admin.php">ajouter</a></li></div>
			 <div class="menuQuest color" ><li><a href="modifier_admin.php">Modifier</a></li></div>
		</div>
		<div class="jeux">
			<div></div>
		</div>
	</div>
	<div class="footer"></div>
	<div class="FT">© Copyright SA 2020</div>
</div>
</body>
</html>
