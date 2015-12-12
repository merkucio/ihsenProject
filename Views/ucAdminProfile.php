<div class="container" style="padding: 25px; width: 70%;margin-top: 50px;">
    <div class="col-md-12">
        <section id="loginForm">
            <h4>Creer un nouveau compte.</h4>
            <hr />
            <form class="form form-horizontal divAjout">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nom :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text"  id="lastname" name="lastname" class="lastname form-control" title="Entrer votre nom" placeholder="Nom" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Prenom :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text" id="firstname" name="firstname" class="firstname form-control" title="Entrer votre prenom" placeholder="Prenom" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nom d'utilisateur :<span class="red">*</span></label>
                        <div class="col-md-8">
                            <input type="text" id="username" name="username" minlength="5" class="login form-control" title="Entrer votre nom d'utisateur (minimum 5 caracteres)" placeholder="Nom d'utilisateur" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Mot de passe :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="password"  id="password"  name="password"  class="password form-control" title="Entrer votre mot de passe" placeholder="Mot de passe" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirmer Mot de passe :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="password" id="cpassword"  name="cpassword"  class="form-control passwordConfirm" title="Entrer votre mot de passe a nouveau" placeholder="Confirmer mot de passe" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Cellulaire :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text" id="phone" name="phone"  class="cellphone form-control" title="Entrer votre cellulaire" placeholder="(xxx) xxx-xxxx"  pattern="\([1-9][0-9]{2}\) [0-9]{3}-[0-9]{4}" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Courriel :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="email" id="email" name="email" class="email form-control" title="Entrer votre courriel" placeholder="Courriel" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Adresse :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text" id="address" name="address" class="address form-control" title="Entrer votre Adresse" placeholder="Adresse de facturation" required style="maxWidth:200px;">
                        </div>
                    </div>    
                
                    <hr />
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" class="btn btn-primary register" value="Devenir membre"/>
                        </div>
                    </div>
               
            </form>
        </section>
    </div>
</div>