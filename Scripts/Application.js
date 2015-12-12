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
        if($('#role').val() == "1"){
            $('.mainContent').load("/Ihsen/trunk/Views/AdminIndex.php"); 
        }
        if($('#role').val() == "2"){
             $('.mainContent').load("/Ihsen/trunk/Views/UserIndex.php"); 
        }       
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
                    if(data=="hhhhhhhhhh")
                        alert("Username existe déjà");
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

$(document).on('click', '.edituser', function(e){
        e.preventDefault();
        if(! $('.userform').valid()) return false;        
                     
            $.post('/Ihsen/trunk/Controllers/gestionUtilisateur.php', 
                {
                    action : "updateuser",
                    firstname : $('.firstname').val(),  
                    lastname : $('.lastname').val(),
                    username : $('.login').val(),  
                    email : $('.email').val(),
                    address : $('.address').val() == null ? null: $('.address').val(), 
                    cellphone : $('.cellphone').val()
                },
                function(data){
                    if(data == false){
                        alert("You need to choose another username");
                    }else{
                        alert("Changement fait avec succes");
                        $('.mainContent').remove();
                        $('.masterContent').append('<div class="mainContent container-fluid"></div>');
                        $('.mainContent').load("/Ihsen/trunk/Views/ucListingMovies.php"); 
                    }                    
                });
        
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
        $('.mainContent').load("/ihsen/trunk/Views/userprofile.php"); 
    });

     $(document).on('click', '.adminprofile', function(){
        $('.mainContent').html('');
        $('.mainContent').load("/ihsen/trunk/Views/ucAdminProfile.php"); 
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

    $(".cartDialog").dialog({ autoOpen: false });  
    $(document).on('click','.addCart', function(e){
        e.preventDefault();     
        $.post('/ihsen/trunk/Views/ucRentalDialog.php', {
            id : $(this).next('input').first().val(),            
        }, function(data){
            $('.cartDialog').dialog({
                        width: 500,
                        height: 500,
                        modal: true,
                        draggable: true,
                        open: function(){  
                            $(this).html(data);
                        },
                        buttons: {
                            "Confirmer": function () {
                                if(! $('.cartform').valid()) return false;
                                $this = $(this);
                                $.post("/Ihsen/trunk/Controllers/gestionUtilisateur.php",
                                {
                                    action : 'addtocart',
                                    filmid : $('.idfilm').val(),
                                    userid : $('.userid').val(),
                                    paiment: $('.pmethod').val(),
                                    card : $('.card').val(),
                                    dateval : $('.enddate').val(),
                                    cvv : $('.cvvcode').val()
                                }).success(function() {
                                    $this.dialog("close");
                                });
                            },
                            "Annuler": function () {
                                $this.dialog("close");
                            }
                        }
                    }).dialog('open');
        });  
    });

    $(document).on('click','.btnHome', function(e){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/AdminIndex.php"); 
    });

    $(document).on('click','.btnaddmovie', function(e){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/ucAddMovie.php"); 
    });
    
    $(document).on('click','.btneditmovie', function(e){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/ucEditMovie.html"); 
    });

    $(document).on('click','.btndeletemovie', function(e){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/ucDeleteMovie.html"); 
    });


});