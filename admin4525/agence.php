<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          
          <?php
		  include("include/connexion.php");
		  include("include/fonction.php");
		  if(!empty($_POST)){ 
              if(!empty($_POST['titre']))
              { 
				$titre=$_POST['titre'];
				  $adresse=$_POST['adresse'];
				  $pays=$_POST['pays'];
				  $date = date("Y-m-d");               
                  $req_chercher="select * from agence where titre='$titre'"; 
                  $query = $bdd->prepare($req_chercher);
                  $query->execute();
                  $nbre = $query->rowCount();
				if($nbre==0){
					  $req = $bdd->prepare('INSERT INTO agence(titre, adresse, pays, date_creation) VALUES(:titre, :adresse, :pays, :date_creation)');
					  $req->execute(array(
						'titre' => $titre,
						'adresse' => $adresse,
						'pays' => $pays,
						'date_creation' => $date
					  ));
					  print_r($req->errorInfo());
						echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Agence créée avec succès</div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cette agence existe déjà</div>';  
			    }
						
					 
				  
                  
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Bien vouloir remplir tous les champs.</div>';
              }
            }
          ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ajouter une nouvelle agence</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="titre">Nom de l'agence</label>
                  <input type="text" class="form-control" name="titre" placeholder="Entrer le nom de l'agence"  value="<?php if(!empty($_POST['titre'])){ echo $_POST['titre'];}?>" required>
                </div>
                <div class="form-group">
                  <label>Adresse</label>
                  <textarea id="editor1" name="adresse" rows="12" cols="80" placeholder="Entrer l'adresse de l'agence">
                      <?php if(!empty($_POST['adresse'])){ echo $_POST['adresse'];}?>
                  </textarea>
                </div>
                <div class="form-group">
                  <label>Pays</label>
                  <div class="row">
                    <div class="col-lg-6">
                      <select name="pays" class="form-control"> 
                        <option value="">Sélectionner le pays où se trouve l'agence</option>  
						<option value="congo">Congo Brazaville</option>
						<option value="cameroun">Cameroun</option>
                       </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
            </form>
          </div>
      </div>
</div>