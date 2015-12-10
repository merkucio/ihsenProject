$(document).ready(function(){
   
    if($('#loggedin').val() == null){
        $('.mainContent').remove();
        $('.masterContent').append('<div class="mainContent container-fluid"></div>');
        $('.mainContent').load("/Ihsen/trunk/Views/ucLoginUser.html"); 
    }else{
        $('#navBar').html('');                    
        $('#navBar').load("/ihsen/trunk/Views/ucHeader.php");
        $('.mainContent').remove();
        $('.masterContent').append('<div class="mainContent container-fluid"></div>');
        $('.mainContent').load("/Ihsen/trunk/Views/UserIndex.php"); 
    }  

    $(document).on("click", ".btnLogin", function(e){
        e.preventDefault();
        if(! $('.loginform').valid()) return false;
        $.post('/ihsen/trunk/Controllers/gestionUtilisateur.php', 
            {
                action : 'login',
                login : $("#username").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password : $("#password").val()
            },
            function(data){
                if(data==false){
                    $('.mainContent').html('');
                    $('.mainContent').load("/ihsen/trunk/Views/ucLoginUser.html"); 
                    alert("Informations incorrectes. Verifier votre nom d'utilisateur et/ou votre mot de passe !!!");
                }else{
                    $('#navBar').html('');                    
                    $('#navBar').load("/ihsen/trunk/Views/ucHeader.php");
                    $('.mainContent').html(data);
                    //location.reload();
                }
            });
    });

    $(document).on('click', '.btnRegister', function(){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/ucRegisterUser.html");    
    });    

    $(document).on('click', '.register', function(e){
        e.preventDefault();
        if(! $('.form').valid()) return false;
        
        if( ($('.passwordConfirm').val() == $('.password').val())){             
            $.post('/Ihsen/trunk/Controllers/gestionUtilisateur.php', 
                {
                    action : "register",
                    firstname : $('.firstname').val(),  
                    lastname : $('.lastname').val(),
                    password : $('.password').val(),
                    username : $('.login').val(),  
                    email : $('.email').val(),
                    address : $('.address').val() == null ? null: $('.address').val(), 
                    cellphone : $('.cellphone').val()
                },
                function(data){
                    if(data == false){
                        alert("You need to choose another username");
                    }else{                            
                        $('.mainContent').remove();
                        $('.masterContent').append('<div class="mainContent container-fluid"></div>');
                        $('.mainContent').load("/Ihsen/trunk/Views/ucLoginUser.html"); 
                    }                    
                });
        }else{
            alert('Mot de passe non identiques !!!')
        }
    });

    $(document).on('click', '.logoff', function(){
        $.post('/Ihsen/trunk/Controllers/gestionUtilisateur.php', 
            {
                action : "logoff"                   
            },
            function(){ 
                $('#navBar').html('');
                $('.mainContent').remove();
                $('.masterContent').append('<div class="mainContent container-fluid"></div>');
                $('.mainContent').load("/Ihsen/trunk/Views/ucLoginUser.html");               
            });       
    });

    $(document).on('click', '.userprofile', function(){
        $('.mainContent').html('');
        $('.mainContent').load("/ihsen/trunk/Views/ucUserProfile.html"); 
    });

    $(document).on('click', '.listmovie', function(){
        $('.mainContent').html('');
        $('.mainContent').load("/ihsen/trunk/Views/ucListingMovies.php"); 
    });

    $("#dialog").dialog({ autoOpen: false });
    $(document).on('click', '.preview',function () {
        /*$
                $('#dialog').html(data).dialog({
                    width: 200,
                    height: 200,
                    modal: false,
                    draggable: true,
                    buttons: {
                        "Confirm": function() {
                           // $.post("/Bot/OnMoveToClick", { BankId: '2525' }, function(data) {});
                            //$('#BankDetails').html(data);
                            //     alert(data);
                            // });
                            $(this).dialog("close");
                        },
                        "Cancel": function() {
                            $(this).dialog("close");
                        }
                    }
                }).dialog('open');
            });
*/
        });











});