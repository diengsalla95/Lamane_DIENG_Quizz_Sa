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
			 <div class="menuQuest" ><li><a href="question.php" style="color: #2F80ED;">Creer</a></li></div>
			 <div class="menuQuest" ><li><a href="lister_question.php">Lister</a></li></div>
		</div>
		<div class="jeux">
			<div class="question">
				<div class="bv">
					<p>Bienvenue Sur la page d'administration des questions</p>
				</div>
				<form method="post" id="Myform">
						<strong><label style="margin-left: 2px"> Questions</label></strong>
						<textarea type="text" name="area" id="area"></textarea>
						<p><strong><label style="margin-left: 2px"> Nbre de Points </label></strong>
						<input  type="number" name="NP" id="NP" required style="text-align: center;"></p>
						<p><strong><label style="margin-left: 2px"> Type de reponse </label></strong>
						<select name="choix" id="typeR" onclick="choix(this.value)">
							<option > votre choix </option>
							<option value="radio"> radio </option>
							<option value="checkbox"> checkbox </option>
							<option value="saisie"> saisie de texte </option>
						</select>
						<input type="button" value="+" onclick="add()"></p>
						
						<div id="inputs">
							<div class="row" id="rep_0"></div>
						</div>
						<strong><span id="error" style="font-size: 13px"></span><br></strong>
						<button type="text" class="suivant" name="enr">Enregistrer</button>
					</form>
				
			</div>
		</div>
	</div>
	<div class="footer"></div>
	<div class="FT">© Copyright SA 2020</div>
</div>
<script>
	function choix(element){
		if (element=='radio') {
			addradio();
		}else if(element=='checkbox'){
			addcheckbox();
		}else if(element=='saisie'){
			addtexte();
		}
		return choix;
	}

  	var rep = 0;
  	var type=0;
	function addradio(){
		if (type!=rep) {
			window.location.replace('question.php');
		}
		
		rep++
		type++
		if (rep<=4) {
			var divInputs=document.getElementById('inputs');
			var newInput = document.createElement("div");
			newInput.setAttribute('class','row');
			newInput.setAttribute('id','rep_'+rep);
			newInput.innerHTML =`<label>Réponse `+rep+` </label> <input style="width:100px" type="text" name="rep[]" id="texte" required>
			<input type="radio" style="width:100px" name="check[]" value="`+(rep)+`" id="simple" required><input type="hidden" name="type" value="type radio"><img src="../images/ic-supprimer.png" onclick="delet(${rep})"><input type="hidden" name="ref[]" value="`+rep+`" id="texte" required>`;
			divInputs.appendChild(newInput);
		}
		
	}
	var rep = 0;
	function addcheckbox(){
		if (type!=rep) {
			window.location.replace('question.php');
		}
		rep++
		type++
		if (rep<=4) {
			var divInputs=document.getElementById('inputs');
			var newInput = document.createElement("div");
			newInput.setAttribute('class','row');
			newInput.setAttribute('id','rep_'+rep);
			newInput.innerHTML =`<label>Réponse`+rep+` </label><input style="width:100px" type="text" name="rep[]" id="texte" required>
			<input type="checkbox" style="width:100px" name="check[]" value="`+(rep)+`" id="check"><input type="hidden" name="type" value="type checkbox"><img src="../images/ic-supprimer.png" onclick="delet(${rep})"><input type="hidden" name="ref[]" value="`+rep+`" id="texte" required>`;
			divInputs.appendChild(newInput);
		}
		
	}
	var rep = 0;
	function addtexte(){
		if (type!=rep) {
			window.location.replace('question.php');
		}
		rep++
		type++
		if (rep<=1) {
			var divInputs=document.getElementById('inputs');
			var newInput = document.createElement("div");
			newInput.setAttribute('class','row');
			newInput.setAttribute('id','rep_'+rep);
			newInput.innerHTML =`<label>Réponse `+rep+` </label> <input style="width:100px" type="text" name="rep" id="texte" required><input type="hidden" name="type" value="type texte"><img src="../images/ic-supprimer.png" onclick="delet(${rep})" style="margin-left:30px" >`;
			divInputs.appendChild(newInput);
		}
		
	}
	function delet(n){
		var target=document.getElementById('rep_'+n);
		target.remove();

	}

	function add(){

		var type=document.getElementById("typeR");
		if (type.value=='checkbox') {
			return addcheckbox();
		}else if (type.value=='radio'){
			return addradio();
		}else if  (type.value=='saisie'){
			return addtexte();
		}
	}
</script>
<script type="text/javascript">
		let Myform = document.getElementById('Myform');
		 let myregex= /^[1-9]+$/;
		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('area');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Tous les champs sont obligatoires!";
		 		myError.style.color="red";
		 		// let audio=new Audio('music.m4a');
		 		// audio.play();
		 		e.preventDefault();
		 	}
		 });
		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('NP');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Tous les champs sont obligatoires!";
		 		myError.style.color="red";
		 		// let audio=new Audio('music.m4a');
		 		// audio.play();
		 		e.preventDefault();
		 	}else if (myregex.test(Myinput.value) ==false) {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "le nombre de point doit etre sup à 0";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		// let audio=new Audio('np.m4a');
		 		// audio.play();
		 		e.preventDefault();
		 	}
		 });
</script>

</body>
</html>
<?php
if (isset($_POST['enr'])) {
	$libelle=$_POST['area'];
	$point=$_POST['NP'];
	$type=$_POST['type'];
	$rep=$_POST['rep'];

	$req = $connect->prepare("INSERT INTO question(libelle,type,Npoint) VALUES('".$libelle."','".$type."','".$point."')");
	$req->execute();
	
	$id = $connect->query('SELECT id_quest as number FROM question ORDER BY id_quest DESC LIMIT 0,1');
			$donnees = $id->fetch();
			$id = $donnees['number'];
			if ($type=="type texte") {
				$req = $connect->prepare("INSERT INTO reponse(reponse,etat,id_quest) VALUES('".$rep."','ok','".$id."')");
				$req->execute();
				echo "<script> alert('Question ajoutée avec success');
				window.location.replace('question.php');
				</script>";
				
			}else{
				$recup=array();
				for ($i=0; $i <count($_POST['rep']) ; $i++) { 
					$recup[$_POST['ref'][$i]]=$_POST['rep'][$i];
				}
				foreach ($recup as $key => $value) {
					if (in_array($key,$_POST['check'] )) {
						$req = $connect->prepare("INSERT INTO reponse(reponse,etat,id_quest) VALUES('".$value."','true','".$id."')");
						$req->execute();
					}else{
						$req = $connect->prepare("INSERT INTO reponse(reponse,etat,id_quest) VALUES('".$value."','false','".$id."')");
						$req->execute();	
					}
				}
				echo "<script> alert('Question ajoutée avec success');</script>";
			}
	


}
?>