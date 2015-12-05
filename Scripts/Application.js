$(document).ready(function(){
   
    $('.mainContent').remove();
    $('.masterContent').append('<div class="mainContent container-fluid"></div>');
    $('.mainContent').html('');
    $('.mainContent').load("/projetihsen/trunk/ucLoginUser.html"); 


 // $('.mainContent').remove();
   //     $('.masterContent').append('<div class="mainContent container-fluid"></div>');

    $(".btnLogin").click(function(e){
        e.preventDefault();
        alert(e);
        $.post('/projetihsen/trunk/Controllers/loginUser.php', 
            {
                login : $("#username").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password : $("#password").val()
            },
            function(data){
                $(".mainContent").html(data);        
        
            });
    });

    $('.registeruser').click(function(e){        
        e.preventDefault();
        $('.mainContent').html('');
        $('.mainContent').load("/projetihsen/trunk/ucRegisterUser.html");    
    });

    $("#register").click(function(e){
        e.preventDefault();
        if($('.passwordConfirm').val() == $('.password').val()){            
            $.post('/Controllers/registerUser.php', 
                {
                    firstname : $('.firstname').val(),  
                    lastname : $('.lastname').val(),
                    password : $('.password').val(),
                    username : $('.username').val(),  
                    email : $('.email').val(),
                    address : $('.address').val() == null ? null: $('.address').val(), 
                    cellphone : $('.cellphone').val()
                },
                function(data){
                //todo: show registration success

                });
        }else{
            alert('Mot de passe non identiques !!!')
        }
    });














});
