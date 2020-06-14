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
	<title>Accueil Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<style type="text/css">
		.positionMenu1{
			background-color: grey;
			border-left: 1px solid #2F80ED;
		}
		.question1{
			position: absolute;
			width: 468px;
			height: 310.84px;
			left: 10px;
			background: #F9FAFB;
			overflow: auto;
			box-shadow: inset -35px 0px 30px -30px #2F80ED,inset 35px 0px 30px -30px #2F80ED;
			
		}
		.question2{
			position: absolute;
			width: 400px;
			height: 300px;
			left: 10px;
			background: #F9FAFB;
			overflow: auto;
			box-shadow: inset -35px 0px 30px -30px #2F80ED,inset 35px 0px 30px -30px #2F80ED;
			
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
			 <div class="ZNQ">NQ</div>
			 <form method="post">
			 	<input type="text" name="" class="nq">
			 	<input type="submit" name="" class="nq" value="OK">
			 </form>
			 <div class="menuQuest" ><li><a href="question.php" >Creer</a></li></div>
			 <div class="menuQuest" ><li><a href="lister_question.php" style="color: #2F80ED;">Lister</a></li></div>
		</div>
		<div class="jeux">
			<div class="question1">
		<form method="post">
				<table>
				<?php
$quest=array();
$rep =$connect->prepare("SELECT id_quest,libelle,type FROM question");
$rep->execute();
while ($all = $rep->fetch()) {
	$quest[]=$all;
}
$reponse=array();
$rep =$connect->prepare("SELECT reponse,etat,id_quest FROM reponse");
$rep->execute();
while ($all = $rep->fetch()) {
	$reponse[]=$all;
}
for ($i=0; $i < count($quest); $i++) { 
	echo $quest[$i]['libelle'];
	echo "<br>";
	if ($quest[$i]['type']=="type texte") {
		for ($j=$i; $j < count($reponse); $j++) { 
			if ($quest[$i]['id_quest']==$reponse[$j]['id_quest']) {
		echo '<input type="text" value="'.$reponse[$j]['reponse'].'">';
		echo "******************************************";
			}
		}
		echo "<br>";
	}else if($quest[$i]['type']=="type radio"){
		for ($j=$i; $j < count($reponse); $j++) { 
			if ($quest[$i]['id_quest']==$reponse[$j]['id_quest']) {
				echo $reponse[$j]['reponse'];
				if($reponse[$j]['etat']=="true"){
					echo '<input type="radio" style="width:0px;height:0px;" checked="checked">';
				}else{
					echo '<input type="radio" style="width:0px;height:0px">';
				}
				
				echo "<br>";
			}
		}
		echo "******************************************";
		echo "<br>";
	}else if($quest[$i]['type']=="type checkbox"){
		for ($j=$i; $j < count($reponse); $j++) { 
			if ($quest[$i]['id_quest']==$reponse[$j]['id_quest']) {
				echo $reponse[$j]['reponse'];
				if($reponse[$j]['etat']=="true"){
					echo '<input type="checkbox" style="width:0px;height:0px" checked="checked">';
				}else{
					echo '<input type="checkbox" style="width:0px;height:0px">';
				}
				
				echo "<br>";
			}
		}
		echo "******************************************";
		echo "<br>";
	}
	
}

?>
			</table>
			</form>	
			</div>
		</div>
	</div>
	<div class="footer"></div>
	<div class="FT">© Copyright SA 2020</div>
</div>
