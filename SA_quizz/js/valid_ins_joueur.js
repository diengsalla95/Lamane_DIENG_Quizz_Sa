// $(document).ready(function(){
//    $("#submit").click(function() {
//                 var password= $("#password").val();
//                 var prenom= $("#prenom").val();
//                  var nom= $("#nom").val();
//                   var login= $("#login").val();
//                   var image= $("#image").val();

//                 $.ajax({
//                     type: "POST",
//                     url: "inscrip.php",
//                     data: "password=" + password + "&prenom=" + prenom + "&nom=" + nom + "&login=" + login + "&image=" + image ,
//                     success: function(data) {
//                        window.location.replace('../index.php');
//                     }
//                 });


//             });
//   });

$(function(){


  $(document).ajaxSuccess(function(e){
      console.log("L'appel AJAX a réussi !");
      $('#nom').val('');
      $('#login').val('');
      $('#prenom').val('');
      $('#password').val('');
      $('#Cpassword').val('');
      $('#blah').attr('src','');
    })

  
  $('#form').submit(function(e){
      
    var avatar = new FormData(this);
        //var files = $('#avatar')[0].files[0];
        var prenom = $('#prenom').val();
    var nom = $('#nom').val();
    var login = $('#login').val();
    var password = $('#password').val();
    var confirmer = $('#Cpassword').val();

     $.ajax({
          url: 'inscrip.php',
          data: avatar,
          processData: false,
          contentType: false,
          type: 'POST',
          dataType: "json",
          success: function(data){
            //console.log('sa march pr linstant')
            //console.log(data)
                    window.location.replace("../index.php")
          },
          error : function(){
          if (login != null & login != '' & password != '' & password != null)
          {
            console.log('sa ne marche pas')
            $('#error5').html('LOGIN EXISTE DEJA')
          }
        }
      });




    // //avatar.append('avatar',files);
    //   $.ajax({
    //       url: 'inscrip.php',
    //       data: avatar,
    //       processData: false,
    //       contentType: false,
    //       type: 'POST',
    //       dataType: "json",
    //       success: function(data){
    //         //console.log('sa march pr linstant')
    //         //console.log(data)
    //                 window.location.replace("../index.php")
    //       },
    //       error : function(){
    //       if (login != null & login != '' & password != '' & password != null)
    //       {
            
    //         console.log('sa ne marche pas')
    //         $('#error5').html('LOGIN EXISTE DEJA')
    //       }
    //     }
    //   });



/*    $.post('AddGamer.php',{login:login,password:password,prenom:prenom,nom:nom,confirmer:confirmer},'false','false',function(data,status){
            if(data){
                    //window.location.replace("src/pageAccueil.php")
                    console.log('sa march pr linstant')
                    console.log(data)
                }
                else{
                  console.log('sa march pr linstant mais pas de donnes')
                      //window.location.replace("../index.php")
                }
    },'json'
).fail(function(){
  if (login != null & login != '' & password != '' & password != null)
    {
      console.log('sa ne marche pas')
    $('#return').html('LOGIN OU MOT DE PASSE INCORRECT')
  }
});*/
  var erreur
    if (login == null | login == '')
    {
      erreur=true;
      $('#login-error').html('Ce champ est obligatoire ...');
    }
    if (password == '' | password == null)
    {
      $('#password-error').html('Ce champ est obligatoire...');
      erreur=true;

    }
    if (prenom == '' | prenom == null)
    {
      $('#prenom-error').html('Ce champ est obligatoire...');
      erreur=true;
    }
    if (nom == '' | nom == null)
    {
      $('#nom-error').html('Ce champ est obligatoire...');
      erreur=true;
    }
    if (confirmer == '' | confirmer == null)
    {
      $('#Cpassword-error').html('Ce champ est obligatoire...');
      $('#erreur').html('')
      erreur=true;
    }
    if (erreur) {
      e.preventDefault();
      return false;
    }
    return false;

  })

  $('#login').keyup(function(){
    $('#login-error').html('');
  })
  $('#password').keyup(function(){
    $('#password-error').html('');
  })
  $('#prenom').keyup(function(){
    $('#prenom-error').html('');
  })
  $('#nom').keyup(function(){
    $('#nom-error').html('');
  })
  $('#Cpassword').keyup(function(){
    $('#Cpassword-error').html('');
  })
  
})



