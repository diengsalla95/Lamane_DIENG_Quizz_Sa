 // validation en js
 // let Myform = document.getElementById('Myform');
	// 	 Myform.addEventListener('submit', function(e) {
	// 	 	let Myinput = document.getElementById('photo');
	// 	 	if (Myinput.value.trim() == "") {
	// 	 		let myError=document.getElementById('error');
	// 	 		myError.innerHTML = "photo obligatoire";
	// 	 		myError.style.color="red";
	// 	 		e.preventDefault();
	// 	 	}
	// 	 });

	// 	 Myform.addEventListener('submit', function(e) {
	// 	 	let Myinput = document.getElementById('Cpass');
	// 	 	let Myinput1 = document.getElementById('pass');
	// 	 	if (Myinput.value.trim() == "") {
	// 	 		let myError=document.getElementById('error');
	// 	 		myError.innerHTML = "Confirmer le mot de passe";
	// 	 		myError.style.color="red";
	// 	 		e.preventDefault();
	// 	 	}else if (Myinput1.value!=Myinput.value) {
	// 	 		let myError=document.getElementById('error');
	// 	 		myError.innerHTML = "Les password sont differents";
	// 	 		myError.style.color="red";
	// 	 		Myinput.style.color="red";
	// 	 		e.preventDefault();
	// 	 	}
	// 	 });

	// 	  Myform.addEventListener('submit', function(e) {
	// 	 	let Myinput1 = document.getElementById('pass');
	// 	 	if (Myinput1.value.trim() == "") {
	// 	 		let myError=document.getElementById('error');
	// 	 		myError.innerHTML = "Mot de passe obligatoire";
	// 	 		myError.style.color="red";
	// 	 		e.preventDefault();
	// 	 	}
	// 	 });

	// 	  Myform.addEventListener('submit', function(e) {
	// 	 	let Myinput = document.getElementById('login');
	// 	 	if (Myinput.value.trim() == "") {
	// 	 		let myError=document.getElementById('error');
	// 	 		myError.innerHTML = "Login obligatoire";
	// 	 		myError.style.color="red";
	// 	 		e.preventDefault();
	// 	 	}
	// 	 });

	// 	 Myform.addEventListener('submit', function(e) {
	// 	 	let Myinput = document.getElementById('nom');
	// 	 	if (Myinput.value.trim() == "") {
	// 	 		let myError=document.getElementById('error');
	// 	 		myError.innerHTML = "Nom obligatoire";
	// 	 		myError.style.color="red";
	// 	 		e.preventDefault();
	// 	 	}
	// 	 });
	// 	 Myform.addEventListener('submit', function(e) {
	// 	 	let Myinput = document.getElementById('prenom');
	// 	 	if (Myinput.value == "") {
	// 	 		let myError=document.getElementById('error');
	// 	 		myError.innerHTML = "Prenom obligatoire";
	// 	 		myError.style.color="red";
	// 	 		e.preventDefault();
	// 	 	}
	// 	 });



	// validation jquery
	

	$(document).ready(function(){
	$('#submit').click(function(){
		var prenom = $('#prenom').val();
		if (prenom=="") {
			$('#error').html('Prenom obligatoire ');
			$('#error').css('color','red');
			return false;
		}
	});
	});

	$(document).ready(function(){
	$('#submit').click(function(){
		var nom = $('#nom').val();
		if (nom=="") {
			$('#error1').html('Nom obligatoire ');
			$('#error1').css('color','red');
			return false;
		}
	});
	});

	$(document).ready(function(){
	$('#submit').click(function(){
		var login = $('#login').val();
		if (login=="") {
			$('#error2').html('Login obligatoire ');
			$('#error2').css('color','red');
			return false;
		}
	});
	});

	$(document).ready(function(){
	$('#submit').click(function(){
		var pass = $('#pass').val();
		if (pass=="") {
			$('#error3').html('password obligatoire ');
			$('#error3').css('color','red');
			return false;
		}
	});
	});

	$(document).ready(function(){
	$('#submit').click(function(){
		var Cpass = $('#Cpass').val();
		var pass = $('#pass').val();
		if (Cpass=="") {
			$('#error4').html('Confirmer le password ');
			$('#error4').css('color','red');
			return false;
		}else if(pass!=Cpass){
			$('#error4').html('les password sont differents ');
			$('#error4').css('color','red');
			return false;
		}
	});
	});

	$(document).ready(function(){
	$('#submit').click(function(){
		var photo = $('#photo').val();
		if (photo=="") {
			$('#error5').html('photo obligatoire');
			$('#error5').css('color','red');
			return false;
		}
	});
	});
