<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php 
            include("include/connexion.php");
            include("include/fonction.php");
            $requete = "SELECT * FROM concert";
            $query_req = $bdd->prepare($requete);
            $query_req->execute();
			$result = $query_req->fetch();
            if(!empty($_POST))
            { 
              if(!empty($_POST['texte']))
              {         
                  $texte=$_POST['texte'];
                  $slogan_concert=$_POST['slogan_concert'];
                  $itineraire=$_POST['itineraire'];
				  $date = date("Y-m-d");        
                  $filename = $_FILES["fichier"]["name"];
                  if($filename){
						$target_dir = "../assets/concert/";
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
						$titre_image = "concert";
						rename("../assets/concert/".$_FILES["fichier"]["name"], "../assets/concert/".$titre_image.'.'.$imageFileType);
						$image = $titre_image.'.'.$imageFileType;
						  //echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
						  $sql = "UPDATE concert SET texte=:texte, image=:image, slogan_concert=:slogan_concert, itineraire=:itineraire, date_creation=:date_creation";
                        $req1 = $bdd->prepare($sql);
                        $req1->execute(array(
                        'texte' => $texte,
						'image' => $image,
						'slogan_concert' => $slogan_concert,
						'itineraire' => $itineraire,
						'date_creation' => $date
                        ));
                        echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Texte modifié avec succès.</div>';
                        if($result['image']!=$image){
                          chmod('../assets/concert/', 0755);
                          @unlink("../assets/concert/".$result['image']);
                        }
    							} else {
    							  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
    							}
						}
					}else{
						  $sql = "UPDATE concert SET texte=:texte, slogan_concert=:slogan_concert, itineraire=:itineraire, date_creation=:date_creation";
						  $req1 = $bdd->prepare($sql);
						  $req1->execute(array(
							'texte' => $texte,
							'slogan_concert' => $slogan_concert,
							'itineraire' => $itineraire,
							'date_creation' => $date
							));
					     echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Texte modifié avec succès.</div>';
					}                  
				}else{
					echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Bien vouloir remplir tous les champs.</div>';
				}
			}
		?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Les concerts de l'Eglise</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
			
			<form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Texte Concerts de l'Eglise</label>
				  <textarea id="editor1" name="texte" rows="6" cols="80" placeholder="Entrer la description de l'artiste ici"><?php if(!empty($_POST['texte'])){ echo $_POST['texte'];}else{ echo $result['texte'];}?></textarea>
                </div>
				<div class="form-group">
                  <label for="slogan_concert">Slogan Concert</label>
                  <input type="text" class="form-control" name="slogan_concert" placeholder="Entrer le slogan ici"  value="<?php if(!empty($_POST['slogan_concert'])){ echo $_POST['slogan_concert'];}?>">
                </div>
                <div class="form-group">
                  <label>Itineraire</label>
				  <textarea id="editor2" name="itineraire" rows="6" cols="80" placeholder="Entrer l'itineraire ici"><?php if(!empty($_POST['itineraire'])){ echo $_POST['itineraire'];}else{ echo $result['itineraire'];}?></textarea>
                </div>
                <div class="form-group">
					<label for="exampleInputFile">Image concerts de l'Eglise</label>
					<?php 
                      if(empty($_FILES["fichier"]["name"])){ echo '<img src="../assets/concert/'.$result['image'].'" width="200"/>';} else { echo '<img src="../assets/concert/'.$image.'.'.$imageFileType.'" width="10" />';} 
                    ?>
                    <input type="file" name="fichier" accept="image/*" class="fileupload">
                    <p class="help-block">Attachez une image</p>
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