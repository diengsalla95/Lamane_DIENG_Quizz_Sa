<?php
session_start();
if (!isset($_SESSION['Login'])) {
	header('location:../index.php');
}
include("cnx.php");
$rep =$connect->prepare("SELECT * FROM utilisateur WHERE Login = '".$_GET['Login']."'");
$rep->execute();
$admin = $rep->fetch();

if (isset($_POST['valider'])) {
	$rep =$connect->prepare("DELETE FROM utilisateur WHERE Login = '".$_GET['Login']."'");
	$rep->execute();
	$login=$_POST['login'];
	if($_POST['prenom']&&$_POST['nom']&&$_POST['login']&&$_POST['pass']&&$_POST['Cpass']){
		if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])){
	        $extensionsValides=["jpg","jpeg","png"];
	        $nomImage = $_FILES['image']['name'];
	          $extensionToUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
	          if (in_array($extensionToUpload, $extensionsValides)){
	            $chemin = "../images/".$_FILES['image']['name'];
	            move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
	          }
	    }
	    $veriflog = $connect->prepare("SELECT Login FROM utilisateur where Login='$login'");
		$veriflog->execute();
		$row = $veriflog->rowcount();
		if ($row==0) {
			$rep =$connect->prepare("INSERT INTO utilisateur (`prenom`,`Nom`,`Login`,`pass`,`image`,`privilege`) VALUES (?,?,?,?,?,?)");
			$rep->execute(array($_POST['prenom'],$_POST['nom'],$_POST['login'],$_POST['pass'],$nomImage,"admin")) or die(mysql_error());
		echo "<script>alert('Admin modifié avec succés !')</script>";
		header('location:lister_admin.php');
		}else{ 
			echo "<script>alert('Ce Login existe déjà !')</script>";
		}
	}
}

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
		.bv{
			width: 400px;
			height: 20px;
			background: #FFFFFF;
			margin: auto auto;
			color: white;
			text-align: center;
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
			 <div class="menuQuest" ><li><a href="lister_admin.php">Lister</a></li></div>
			 <div class="menuQuest" ><li><a href="creation_admin.php">ajouter</a></li></div>
			 <div class="menuQuest" ><li><a href="modifier_admin.php">Modifier</a></li></div>
		</div>
		<div class="jeux">
			<div class="question">
				<div class="bv">
					<p style="color: red">Attention !!! Vous ne pouvez pas modifier le login</p>
				</div>
				<form method="post" enctype="multipart/form-data" id="Myform">
					<label for="prenom">Prenom</label><br>
					<input type="text" name="prenom" id="prenom" value="<?php echo $admin['prenom'];?>"><span id="error"></span><br>
					<label for="nom">Nom</label><br>
					<input type="text" name="nom" id="nom" value="<?php echo $admin['Nom'];?>"><span id="error1"></span><br>
					<label for="login">Login</label><br>
					<input type="text" name="login" id="login" value="<?php echo $admin['Login'];?>" readonly="readonly"><span id="error2"></span><br>
					<label for="pass">Password</label><br>
					<input type="password" name="pass" id="pass" value="<?php echo $admin['pass'];?>" ><span id="error3"></span><br>
					<label for="Cpass">Confirmation password</label><br>
					<input type="password" name="Cpass" id="Cpass"><span id="error4"></span><br><br>
					<input type="file" name="image" value="" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="width: 110px;background-color:blue;"><span id="error5"></span><br><br>
					<input type="submit" name="valider" value="valider" id="submit" style="background-color:#2F80ED;color: white ">
				</form>
				<div class="im_add"><img id="blah"  width="111" height="111" style="border-radius:50%" /></div>
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
