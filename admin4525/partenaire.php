<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          
          <?php
		  include("include/connexion.php");
		  include("include/fonction.php");
		  if(!empty($_POST)){ 
              if(!empty($_POST['nom']))
              { 
				$nom=$_POST['nom'];
				  $site_web=$_POST['site_web'];
				  $date = date("Y-m-d");               
                  $req_chercher="select * from partenaire where nom='$nom'"; 
                  $query = $bdd->prepare($req_chercher);
                  $query->execute();
                  $nbre = $query->rowCount();
                  $filename = $_FILES["fichier"]["name"];
				  if($filename){
					  $target_dir = "../assets/partenaires/";
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
							  $titre_image = clean($nom);
							  rename("../assets/partenaires/".$_FILES["fichier"]["name"], "../assets/partenaires/".$titre_image.'.'.$imageFileType);
							  $image = $titre_image.'.'.$imageFileType;
							  $req = $bdd->prepare('INSERT INTO partenaire(nom, site_web, image, date_creation) VALUES(:nom, :site_web, :image, :date_creation)');
							  $req->execute(array(
								'nom' => $nom,
								'site_web' => $site_web,
								'image' => $image,
								'date_creation' => $date
							  ));
							  print_r($req->errorInfo());
								echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Partenaire créé avec succès</div>';
						}else {
						  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
						}
					}else{
							  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cet partenaire existe déjà</div>';  
						  }
						
					  }  
				  }else{
					  if($nbre==0){	
							  $req = $bdd->prepare('INSERT INTO partenaire(nom, site_web, date_creation) VALUES(:nom, :site_web, :date_creation)');
							  $req->execute(array(
								'nom' => $nom,
								'site_web' => $site_web,
								'date_creation' => $date
							  ));
							  print_r($req->errorInfo());
						echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Partenaire créé avec succès</div>';
					}else{
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cet partenaire existe déjà</div>';  
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
              <h3 class="box-title">Ajouter un nouveau partenaire</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nom">nom du partenaire</label>
                  <input type="text" class="form-control" name="nom" placeholder="Entrer le nom du partenaire"  value="<?php if(!empty($_POST['nom'])){ echo $_POST['nom'];}?>" required>
                </div>
                <div class="form-group">
                  <label for="site_web">Site web</label>
                  <input type="text" class="form-control" name="site_web" placeholder="Entrer le site web de l'artiste précédé de http://"  value="<?php if(!empty($_POST['site_web'])){ echo $_POST['site_web'];}?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Logo du partenaire</label>
                    <input type="file" name="fichier" accept="image/*" class="fileupload">
                    <p class="help-block">Attachez une image</p>
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