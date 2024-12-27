<div class="row">
        <!-- left column -->
        <div class="col-md-12">
         <?php
		  include("include/connexion.php");
		  include("include/fonction.php");
		  if(!empty($_POST)){ 
              if(!empty($_POST['nom_membre']))
              { 
				  $nom_membre=$_POST['nom_membre'];
				  $poste=$_POST['poste'];
				  $reseau=$_POST['reseau'];
				  $date = date("Y-m-d");    
				  $req_chercher="select * from membre where nom_membre='$nom_membre'"; 
                  $query = $bdd->prepare($req_chercher);
                  $query->execute();
                  $nbre = $query->rowCount();
				  if(isset($_FILES["fichier"]["name"]) AND $_FILES["fichier"]["name"]!=''){
					  $filename = $_FILES["fichier"]["name"];
					  $target_dir = "../assets/membres/";
					  $target_file = $target_dir . basename($_FILES["fichier"]["name"]);
					  $uploadOk = 1;
					  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					  // Check if image file is a actual image or fake image
					  $check = getimagesize($_FILES["fichier"]["tmp_name"]);
					  if($check !== false) {
						//echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					  } else {
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>File is not an image.</div>';
						$uploadOk = 0;
					  }
					  if (file_exists($target_file)) {
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Sorry, file already exists.</div>';
						$uploadOk = 0;
					  }
					  // Check file size
					  if ($_FILES["fichier"]["size"] > 5000000) {
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Sorry, your file is too large.</div>';
						$uploadOk = 0;
					  }
					  // Allow certain file formats
					  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					  && $imageFileType != "gif" ) {
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
						$uploadOk = 0;
					  }// Check if $uploadOk is set to 0 by an error
					  if ($uploadOk == 0) {
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Sorry, your file was not uploaded.</div>';
					  // if everything is ok, try to upload file
					  }else{  
						if($nbre==0){
							if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {  
							  $titre_image = clean($nom_membre);
							  rename("../assets/membres/".$_FILES["fichier"]["name"], "../assets/membres/".$titre_image.'.'.$imageFileType);
							  $image = $titre_image.'.'.$imageFileType;
								  $req = $bdd->prepare('INSERT INTO membre(nom_membre, poste, reseau, image, date_creation) VALUES(:nom_membre, :poste, :reseau, :image, :date_creation)');
								  $req->execute(array(
									'nom_membre' => $nom_membre,
									'poste' => $poste,
									'reseau' => $reseau,
									'image' => $image,
									'date_creation' => $date
								  ));
								echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Membre créé avec succès</div>';
						}else {
						  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
						}
					}else{
							  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Ce membre existe déjà</div>';  
						  }
						
					  }  
				  }else{
					  if($nbre==0){	
						$req = $bdd->prepare('INSERT INTO membre(nom_membre, poste, reseau, date_creation) VALUES(:nom_membre, :poste, :reseau, :date_creation)');
						$req->execute(array(
							'nom_membre' => $nom_membre,
							'poste' => $poste,
							'reseau' => $reseau,
							'date_creation' => $date
						  ));
						echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Membre créé avec succès</div>';
					}else{
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cet membre existe déjà</div>';  
					}		
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
              <h3 class="box-title">Equipe</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
			<form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
					<label for="nom_membre">Nom du membre</label>	
					<input type="text" class="form-control" name="nom_membre" placeholder="Entrer le nom du membre"  value="<?php if(!empty($_POST['nom_membre'])){ echo $_POST['nom_membre'];}?>">
					
                </div>
                <div class="form-group">
				  <div class="row">
					<div class="col-lg-6">
					  <label for="poste">Poste</label>
					  <input type="text" class="form-control" name="poste" placeholder="Entrer le poste du membre"  value="<?php if(!empty($_POST['poste'])){ echo $_POST['poste'];}?>" required>
					</div>
					<div class="col-lg-6">
					  <label for="reseau">Lien résau social du membre</label>	
					  <input type="text" class="form-control" name="reseau" placeholder="Entrer le lien social (Linkedin) du membre"  value="<?php if(!empty($_POST['reseau'])){ echo $_POST['reseau'];}?>">
					</div>
				  </div>
                  
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Photo du membre</label>
                    <input type="file" name="fichier" accept="image/*" class="fileupload">
                    <p class="help-block">Attachez la photo du membre</p>
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