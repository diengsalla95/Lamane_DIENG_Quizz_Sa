 

	$(document).ready(function(){
	$('#submit').click(function(e){
		e.preventDefautlt();
		var password= $("#password").val();
		var Cpassword= $("#password").val();
                var prenom= $("#prenom").val();
                 var nom= $("#nom").val();
                  var login= $("#login").val();
                  var image= $("#image").val();

		
		if (prenom=="") {
			$('#error').html('Prenom obligatoire ');
			$('#error').css('color','red');
			return false;
		}
		
		if (nom=="") {
			$('#error1').html('Nom obligatoire ');
			$('#error1').css('color','red');
			return false;
		}
		
		if (login=="") {
			$('#error2').html('Login obligatoire ');
			$('#error2').css('color','red');
			return false;
		}
		
		if (password=="") {
			$('#error3').html('password obligatoire ');
			$('#error3').css('color','red');
			return false;
		}
		
		if (Cpassword=="") {
			$('#error4').html('Confirmer le password ');
			$('#error4').css('color','red');
			return false;
		}else if(password!=Cpassword){
			$('#error4').html('les password sont differents ');
			$('#error4').css('color','red');
			return false;
		}
		
		if (image=="") {
			$('#error5').html('photo obligatoire');
			$('#error5').css('color','red');
			return false;
		}
		$.ajax({
                    type: "POST",
                    url: "inscrip.php",
                    data: "password=" + password + "&prenom=" + prenom + "&nom=" + nom + "&login=" + login + "&image=" + image ,
                    success: function(data) {
                       window.location.replace('../index.php');
                    }
                });
	});
	});


