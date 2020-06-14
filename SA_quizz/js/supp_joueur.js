$(document).ready(function(){
	$('#sup').click(function(){
		$.ajax({
	        url : "supprimer_joueur.php", // on donne l'URL du fichier de traitement
	        type : "POST", // la requête est de type POST
	        // data : {login:login,pwd:pass}, // et on envoie nos données
	        // dataType:'json',
	        success:function(reponse){
	        	console.log('ok')
	        	//$('html').html(reponse);
	        },
	        error: function(){
	        	console.log('error')
         }
    	});
	});
	});
	