<?php
session_start();
include('fonction.php');
include('cnx.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription joueur</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<style type="text/css">
		.question{
		position: absolute;
		width: 468px;
		height: 310.84px;
		background: #F9FAFB;
		margin: auto auto;
		left: -65px;
		border: 2px solid #2F80ED;
		box-shadow: inset -35px 0px 30px -30px #2F80ED,inset 35px 0px 30px -30px #2F80ED;
		}
		
	</style>
	
</head>
<body>
<div class="principal mt-1">

	<div class="header">
		<div class="image"><img src="../images/quizz.png" style="width: 85px;height: 85px;border-radius: 50%"></div>
		<MARQUEE LOOP="17" class="headerText"> LE PLAISIR DE JOUER</label></MARQUEE>
		<div class="image" style="left: 550px"><img src="../images/quizz.png" style="width: 85px;height: 85px;border-radius: 50%"></div>
	</div>
	<div class="menu" style="background-color: #F9FAFB;text-align: center;color: #2F80ED;">
	S’inscrire pour tester votre niveau de culture générale
	</div>
	<div class="cadre1">

		<div class="jeux1">
			<div class="question">
				<form method="post" enctype="multipart/form-data" id="Myform">
					<label for="prenom">Prenom</label><br>
					<input type="text" name="prenom" id="prenom"><span id="error" ></span><br>
					<label for="nom">Nom</label><br>
					<input type="text" name="nom" id="nom"><span id="error1"></span><br>
					<label for="login">Login</label><br>
					<input type="text" name="login" id="login"><span id="error2"></span><br>
					<label for="pass">Password</label><br>
					<input type="password" name="pass" id="password"><span id="error3"></span><br>
					<label for="Cpass">Confirmation password</label><br>
					<input type="password" name="Cpass" id="Cpassword"><span id="error4"></span><br><br>
					<input type="file" name="image" value="" id="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="width: 110px;background-color:blue;"><span id="error5"></span><br><br>
					<input type="submit" name="valider" value="valider" id="submit" style="background-color:#2F80ED;color: white ">
				</form>
				<div class="im_add"><img id="blah"  width="111" height="111" style="border-radius:50%" /></div>
			</div>
		</div>
	</div>
	<div class="footer"></div>
	<div class="FT">© Copyright SA 2020</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="../js/inscrip.js"></script>
<script type="text/javascript" src="../js/valid_ins_joueur.js"></script> -->
<script>

  $(document).ready(function () {
    $('#submit').click(function (e) {
      var erreuLog='';
      var erreurPass='';
  
      if($.trim($('#login').val()).length==0)
    {
      e.preventDefault();
      erreuLog="*obligatoire";
      $('#error2').text(erreuLog);

    }
    if($.trim($('#prenom').val()).length==0)
    {
      e.preventDefault();
      erreuLog="*obligatoire";
      $('#error').text(erreuLog);

    }
    if($.trim($('#nom').val()).length==0)
    {
      e.preventDefault();
      erreuLog="*obligatoire";
      $('#error1').text(erreuLog);

    }
    if($.trim($('#password').val()).length==0)
    {
      e.preventDefault();
      erreuLog="*obligatoire";
      $('#error3').text(erreuLog);

    }
    if($.trim($('#Cpassword').val()).length==0)
    {
      e.preventDefault();
      erreuLog="*obligatoire";
      $('#error4').text(erreuLog);

    }else if($.trim($('#Cpassword').val())!=$.trim($('#password').val())){
      e.preventDefault();
      erreuLog="password differents";
      $('#error4').text(erreuLog);
    }
    if($.trim($('#image').val()).length==0)
    {
      e.preventDefault();
      erreuLog="*obligatoire";
      $('#error5').text(erreuLog);

    }

     });
  
$('#Myform').submit(function (e) { 
    var password= $("#password").val();
    var prenom= $("#prenom").val();
    var nom= $("#nom").val();
    var login= $("#login").val();
    var image= $("#image").val();
    e.preventDefault();
        $.ajax({
  	    type: "POST",
        url: "inscrip.php",
        data: "password=" + password + "&prenom=" + prenom + "&nom=" + nom + "&login=" + login + "&image=" + image ,
        success: function(data) {
            window.location.replace('../index.php');
        }
     });
 });
 $('#prenom').keyup(function(){
    $('#error').html('');
  })
 $('#password').keyup(function(){
    $('#error3').html('');
  })
 
  $('#nom').keyup(function(){
    $('#error1').html('');
  })
  $('#Cpassword').keyup(function(){
    $('#error4').html('');
  })
  $('#login').keyup(function(){
    $('#error2').html('');
  })
  $('#image').keyup(function(){
    $('#error5').html('');
  })
});

 
</script>
</body>
</html>

