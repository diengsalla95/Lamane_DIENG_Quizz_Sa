 /*let Myform = document.getElementById('Myform');
		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('login');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Login obligatoire!";
		 		myError.style.color="red";
		 		e.preventDefault();
		 	}
		 });

		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('pwd');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error2');
		 		myError.innerHTML = "Password obligatoire!";
		 		myError.style.color="red";
		 		e.preventDefault();
		 	}
		 });
*/
	$(document).ready(function(){
	$('#submit').click(function(e){
		e.preventDefault();
		var login = $('#login').val();
		var pass = $('#pwd').val();
		if (login=="") {
			$('#error').html('Login obligatoire ');
			$('#error').css('color','red');
			return false;
		}
		if (pass=="") {
			$('#error2').html('Password obligatoire ');
			$('#error2').css('color','red');
			return false;
		}
		$.ajax({
	        url : "src/login.php", // on donne l'URL du fichier de traitement
	        type : "POST", // la requête est de type POST
	        data : {login:login,pwd:pass}, // et on envoie nos données
	        dataType:'json',
	        success:function(reponse){
	        	if(reponse['privilege']=='admin'){
	        		window.location.replace('src/question.php');
	        	// $('html').load('src/question.php')
	        	}else if(reponse['privilege']=='joueur'){
	        		window.location.replace('src/interfaceJeux.php');
	        		// $('html').load('src/interfaceJeux.php')
	        	}
	        	//$('html').html(reponse);
	        },
	        error: function(){
	        	$('#login').val();
				$('#pwd').val();
            $('#incorrect').html('login ou password incorrect !!!');
           	$('#incorrect').css('color','red');
          	 return false;
         }
    	});
	});
	});
	

	
