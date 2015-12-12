<?php 

    require('../DBConfig/DBConnection.php');
    session_start();

    if(isset($_POST['id'])){
        $result = $PDO->query('SELECT id, title, price FROM movie WHERE id='.$_POST['id']);
        $result->setFetchMode(PDO::FETCH_OBJ);
        $film = $result->fetch();
    }

?>        
    <hr />
            <form class="cartform form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Titre :</label>
                        <div class="col-md-8">
                            <label id="title" name="title" class="title form-control"><?php echo $film->title; ?></label>
                            <input type="hidden" class="idfilm" value="<?php echo $film->id; ?>" />
                        </div>
                    </div>    

                   <!-- <div class="form-group">
                        <label class="col-md-4 control-label">Prix :</label>
                        <div class="col-md-8">
                            <label id="prixmovie" name="prixmovie" class="prixmovie form-control" style="maxWidth:200px;"><?php echo $film->price; ?>$</label>
                        </div>
                    </div>    
                    -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Votre nom :</label>
                        <div class="col-md-8">
                            <label type="text" id="clientname" name="clientname" class="name form-control" style="maxWidth:200px;">
                                <?php echo $_SESSION['lname']." ".$_SESSION['fname']; ?>
                            </label>
                            <input type="hidden" class="userid" value="<?php echo $_SESSION['userid'] ?>"/>
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Mode de paiement :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <select class="pmethod form-control" style="maxWidth:200px;">
                                <option value="1">VISA</option>
                                <option value="2">MASTERCARD</option>
                            </select>
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Numero de carte :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text" id="card" name="card" class="form-control card" title="Entrer les 16 chiffres de votre numero de carte" placeholder="Numero de carte" minlength="16" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Validite:<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text" id="enddate" name="enddate"  class="enddate form-control" title="Entrer la date de validite" placeholder="xx/xx"  pattern="[0-9]{2}/[0-9]{2}" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Code cvv2 :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="password" id="cvvcode" name="cvvcode" class="cvvcode form-control" title="Entrer votre code secret de 3 chiffres" minlength="3" placeholder="Code secret" required style="maxWidth:200px;">
                        </div>
                    </div>      
                       <!-- <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" class="btn btn-primary confirmrent" value="Louer"/>
                        </div>
                    </div>  -->          
                <hr />                 
            </form>