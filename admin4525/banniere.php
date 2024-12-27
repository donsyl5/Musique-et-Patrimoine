<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php 
            include("include/connexion.php");
            include("include/fonction.php");
            $requete = "SELECT * FROM banniere";
            $query_req = $bdd->prepare($requete);
            $query_req->execute();
			$result = $query_req->fetch();
            if(!empty($_POST))
            { 
              if(!empty($_POST['description']))
              {         
                  $titre=$_POST['titre'];
                  $description=$_POST['description'];
				  $texte_bouton=$_POST['texte_bouton'];
				  $lien_bouton=$_POST['lien_bouton'];
				  $date = date("Y-m-d");        
                  $filename = $_FILES["fichier"]["name"];
                  if($filename){
						$target_dir = "../assets/banniere/";
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
						} else {
						if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) { 
						$titre_image = "banniere";
						rename("../assets/banniere/".$_FILES["fichier"]["name"], "../assets/banniere/".$titre_image.'.'.$imageFileType);
						$image = $titre_image.'.'.$imageFileType;
						  //echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
						  $sql = "UPDATE banniere SET titre=:titre, description=:description, image=:image, texte_bouton=:texte_bouton, lien_bouton=:lien_bouton, date_creation=:date_creation";
                        $req1 = $bdd->prepare($sql);
                        $req1->execute(array(
                        'titre' => $titre,
                        'description' => $description,
						'image' => $image,
						'texte_bouton' => $texte_bouton,
						'lien_bouton' => $lien_bouton,
						'date_creation' => $date
                        ));
                        echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Bannière modifiée avec succès.</div>';
                        if($result['image']!=$image){
                          chmod('../assets/banniere/', 0755);
                          @unlink("../assets/banniere/".$result['image']);
                        }
    							} else {
    							  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
    							}
						}
					}else{
						  $sql = "UPDATE banniere SET titre=:titre, description=:description, texte_bouton=:texte_bouton, lien_bouton=:lien_bouton, date_creation=:date_creation";
						  $req1 = $bdd->prepare($sql);
						  $req1->execute(array(
							'titre' => $titre,
							'description' => $description,
							'texte_bouton' => $texte_bouton,
							'lien_bouton' => $lien_bouton,
							'date_creation' => $date
							));
					     echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Bannière modifiée avec succès.</div>';
					}                  
				}else{
					echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Bien vouloir remplir tous les champs.</div>';
				}
			}
		?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Bannière principale</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
			
			<form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Titre banniere</label>
                  <input type="text" class="form-control" name="titre" placeholder="Titre de la bannière" value="<?php if(!empty($_POST['titre'])){ echo $_POST['titre'];}else{ echo $result['titre'];}?>" required>
                </div>
                <div class="form-group">
                  <label>Texte banniere</label>
				  <textarea class="form-control" name="description" rows="6" cols="80" placeholder="Entrer la description de l'artiste ici"><?php if(!empty($_POST['description'])){ echo $_POST['description'];}else{ echo $result['description'];}?></textarea>
                </div>
                <div class="form-group">
					<label for="exampleInputFile">Image Bannière</label>
					<?php 
                      if(empty($_FILES["fichier"]["name"])){ echo '<img src="../assets/banniere/'.$result['image'].'" width="200"/>';} else { echo '<img src="../assets/banniere/'.$image.'.'.$imageFileType.'" width="10" />';} 
                    ?>
                    <input type="file" name="fichier" accept="image/*" class="fileupload">
                    <p class="help-block">Attachez une image</p>
                </div>
                <div class="form-group">
                  <label>Texte du bouton</label>
                  <input type="text" class="form-control" name="texte_bouton" placeholder="Texte du bouton" value="<?php if(!empty($_POST['texte_bouton'])){ echo $_POST['texte_bouton'];}else{ echo $result['texte_bouton'];}?>" required>
                </div>
                <div class="form-group">
                  <label>Lien du bouton</label>
                  <input type="text" class="form-control" name="lien_bouton" placeholder="Lien du bouton" Value="<?php if(!empty($_POST['lien_bouton'])){ echo $_POST['lien_bouton'];}else{ echo $result['lien_bouton'];}?>" required>
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