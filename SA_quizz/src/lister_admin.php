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
		td{
			width: 150px;
			text-align: center;
		}
		table{
			left: 100px;
			border:2px solid #2F80ED;
			margin: auto auto;
		}
		title{
			color: red;
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
			 <div class="menuQuest color" ><li><a href="lister_admin.php">Lister</a></li></div>
			 <div class="menuQuest " ><li><a href="creation_admin.php">ajouter</a></li></div>
		</div>
		<div class="jeux">
			<div class="question">
				<form method="post">
				<table>
					<?php
				include('cnx.php');
				$liste=array();
				$rep =$connect->prepare("SELECT * FROM utilisateur WHERE privilege='admin' ORDER BY nom");
				$rep->execute();
				while ($all = $rep->fetch()) {
					$liste[]=$all;
				}
				

				?>
				<tr>
					<td style="background-color: #2F80ED;text-align: center;">prenom</td>
					<td style="background-color: #2F80ED;text-align: center;">Nom</td>
					<td colspan=2 style="background-color: #2F80ED;text-align: center;">Action</td>
				</tr>
				<?php
				if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($liste)) {
						$debut=$_SESSION['fin'];
						$fin=$_SESSION['fin']+2;
					}elseif (isset($_POST['precedent']) && $_SESSION['fin']>2) {
						$debut=$_SESSION['fin']-4;
						$fin=$_SESSION['fin']-2;
					}else{
						$debut=0;
						$fin=2;
					}
				for ($i=$debut; $i <$fin ; $i++) { 
						if ($i<count($liste)) {
						?>
						<tr>
						<td> <?php echo $liste[$i]['prenom']; ?></td>
						<td> <?php echo $liste[$i]['Nom']; ?></td>
						<td>
							<?php 
			echo "<a href=\"supprimer_admin.php?Login=".$liste[$i]['Login']."\" style='color:red' onclick=\"return(confirm('voulez vous supprimer ".$liste[$i]['prenom']." ?'));\"><img src=\"../images/sup.png\" title=\"supprimer\" style=\"width:25px;height:25px\"></a>" ;
							?>
						</td> 
						<td>
							<?php
			echo "<a href=\"admin.php?Login=".$liste[$i]['Login']."\" style='color:red' onclick=\"return(confirm('Vous etes entrain de modifier !'));\"><img src=\"../images/ic-liste.png\" title=\"Modifier\"></a>" ;
							?>
						</td>
						</tr>
						<?php
						}
					}
					$_SESSION['fin']=$fin;
				?>
				</table>
				<?php
				if (isset($_POST['suivant']) OR $_SESSION['fin']>=3) {
					?>
					<button type="text" class="precedent" name="precedent">Precedent</button>
					<?php
				}
				
				?>
				
				<?php
				if ($_SESSION['fin']< count($liste)) {
					?>
					<button type="text" class="suivant" name="suivant">Suivant</button>
					<?php
				}
				
				?>
				</form>
			</div>
			
		</div>
	</div>
	<div class="footer"></div>
	<div class="FT">© Copyright SA 2020</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/valid_add_admin.js"></script>
</body>
</html>
