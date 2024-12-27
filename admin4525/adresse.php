<div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <?php 
            //include("../include/connexion.php");
            if(!empty($_POST))
            { if(!empty($_POST['adresse_email'])){
                $adresse=$_POST['adresse'];
                $phone=$_POST['phone'];
                $adresse_email=$_POST['adresse_email'];
				  $sql = "UPDATE adresse SET adresse = :adresse, phone = :phone, adresse_email = :adresse_email";
				  $req1 = $bdd->prepare($sql);
				  $req1->execute(array(
					'adresse' => $adresse,
					'phone' => $phone,
					'adresse_email' => $adresse_email
				  ));
				  echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Modification effectuée avec succès.</div>';   
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Veuillez remplir tous les champs SVP.</div>';
              }
            }
            $requete = "SELECT * FROM adresse";
            $query = $bdd->prepare($requete);
            $query->execute();
            $row = $query->fetch();
          ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modifier notre adresse</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
              <div class="box-body">
				<div class="form-group">
                  <label for="adresse">Adresse</label>
				  <input type="text" class="form-control" name="adresse" placeholder="Entrer le numéro de téléphone ici"  value="<?php if(!empty($_POST['adresse'])){ echo $_POST['adresse'];}else{ echo $row['adresse'];}?>" required>
                </div>
				<div class="form-group">
                  <label for="phone">Téléphone</label>
                  <input type="text" class="form-control" name="phone" placeholder="Entrer le numéro de téléphone ici"  value="<?php if(!empty($_POST['phone'])){ echo $_POST['phone'];}else{ echo $row['phone'];}?>" required>
                </div>
				<div class="form-group">
                  <label for="phone">Adresse email</label>
                  <input type="email" class="form-control" name="adresse_email" placeholder="Entrer l'adresse email ici"  value="<?php if(!empty($_POST['adresse_email'])){ echo $_POST['adresse_email'];}else{ echo $row['adresse_email'];}?>" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </form>
          </div>
      </div>
</div>