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

    $(".previewDialog").dialog({ autoOpen: false });
    $(document).on('click', '.preview', function(e){
        e.preventDefault();     
        $.post('/ihsen/trunk/Views/previewplayer.php', 
        {
            trailer : $(this).next('input').first().val(),            
        }, 
        function(data){
             $('.previewDialog').html(data).dialog(
             {
                width: 600,
                height:300,
                modal: true,
                draggable: true,                                 
                open: function()
                {
                    $(this).html(data);                        
                }
            }).dialog('open');
        });               
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

    $(document).on('click','.btnHome', function(){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/AdminIndex.php"); 
    });

    $(document).on('click','.btnaddmovie', function(){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/ucAddMovie.php"); 
    });
    
    $(document).on('click','.btneditmovie', function(){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/ucEditMovie.php"); 
    });

    $(document).on('click','.editmovie', function(e){
        e.preventDefault();
        if(! $('.ddlform').valid()) return false;
        
        $.post('/ihsen/trunk/Views/EditMovieForm.php',{
                id : $(".movietoedit").val()
            },
            function(data){
                $('.mainContent').html('');
                $('.mainContent').html(data);
            });
    });

    $(document).on('click','.confirmEditMovie', function(e){
        e.preventDefault();
        if(! $('.editmovieform').valid()) return false;  
                     
        $.post('/Ihsen/trunk/Controllers/gestionFilm.php', 
            {
                action : "editmovie",
                id : $('.movieid').val(),  
                title : $('.title').val(),  
                director : $('.director').val(),
                category : $('.category').val(),
                year : $('.year').val(),
                duration : $('.duration').val(),  
                description : $('.description').val(),
                picture : $('.cover').val(),
                trailer : $('.trailer').val(),
                price : $('.price').val()
            },
            function(data){                                            
                $('.mainContent').remove();
                $('.masterContent').append('<div class="mainContent container-fluid"></div>');
                alert("Edition faite avec succes");
                $('.mainContent').load("/Ihsen/trunk/Views/AdminIndex.php");                                    
            });        
    });

    $(document).on('click','.btndeletemovie', function(e){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/ucDeleteFilm.php"); 
    });

    $(document).on('click','.deletemovie', function(){
        e.preventDefault();
        f(! $('.deleteform').valid()) return false;
        $.post('/Ihsen/trunk/Controllers/gestionFilm.php', 
            {
                action : "deletemovie",
                id : $('.movietodelete').val()
            },
            function(data){                                            
                $('.mainContent').remove();
                $('.masterContent').append('<div class="mainContent container-fluid"></div>');
                alert("suppression faite avec succes");
                $('.mainContent').load("/Ihsen/trunk/Views/AdminIndex.php");                                    
            });        
    });

    $(document).on('click','.userRents', function(e){
        $('.mainContent').html('');
        $('.mainContent').load("/Ihsen/trunk/Views/ucUserRental.php"); 
    });

});