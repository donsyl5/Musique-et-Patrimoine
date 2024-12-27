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
				  $description=$_POST['description'];
				  $date = date("Y-m-d");               
                  $req_chercher="select * from service where titre='$titre'"; 
                  $query = $bdd->prepare($req_chercher);
                  $query->execute();
                  $nbre = $query->rowCount();
                  $filename = $_FILES["fichier"]["name"];
				  if($filename){
					  $target_dir = "../assets/services/";
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
							  $titre_image = clean($titre);
							  rename("../assets/services/".$_FILES["fichier"]["name"], "../assets/services/".$titre_image.'.'.$imageFileType);
							  $image = $titre_image.'.'.$imageFileType;
							  $oldname = '../assets/services/'.$image;
								$newname = '../assets/services-miniature/'.$image;
								$newh = 235;
								// interpolating

								$size = getImageSize($oldname);
								$w = $size[0];
								$h = $size[1];
								$neww = intval($newh * $w / $h);
								// converting
								if($imageFileType == "jpg" OR $imageFileType == "jpeg"){
									$resimage = imagecreatefromjpeg($oldname); 
								}
								if($imageFileType == "png"){
									$resimage = imagecreatefrompng($oldname); 
								}
								//$resimage = imagecreatefrompng($oldname); 
								$newimage = imagecreatetruecolor($neww, $newh);  // use alternate function if not installed
								imageCopyResampled($newimage, $resimage,0,0,0,0,$neww, $newh, $w, $h);
								// saving
								imageJpeg($newimage, $newname, 85);
							  $req = $bdd->prepare('INSERT INTO service(titre, image, thumb, description, date_creation) VALUES(:titre, :image, :thumb, :description, :date_creation)');
							  $req->execute(array(
								'titre' => $titre,
								'image' => $image,
								'thumb' => $image,
								'description' => $description,
								'date_creation' => $date
							  ));
							  print_r($req->errorInfo());
								echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Service créé avec succès</div>';
						}else {
						  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
						}
					}else{
							  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cet service existe déjà</div>';  
						  }
						
					  }  
				  }else{
					  if($nbre==0){	
							  $req = $bdd->prepare('INSERT INTO service(titre, description, date_creation) VALUES(:titre, :description, :date_creation)');
							  $req->execute(array(
								'titre' => $titre,
								'description' => $description,
								'date_creation' => $date
							  ));
							  print_r($req->errorInfo());
						echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Service créé avec succès</div>';
					}else{
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cet service existe déjà</div>';  
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
              <h3 class="box-title">Ajouter un nouveau service</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="titre">Titre du service</label>
                  <input type="text" class="form-control" name="titre" placeholder="Entrer le titre du service"  value="<?php if(!empty($_POST['titre'])){ echo $_POST['titre'];}?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image illustrative du service</label>
                    <input type="file" name="fichier" accept="image/*" class="fileupload">
                    <p class="help-block">Attachez une image</p>
                </div>
                <!--div class="form-group">
                  <label>Description</label>
                  <textarea id="editor1" name="description" rows="12" cols="80" placeholder="Entrer la description du service ici">
                      <?php if(!empty($_POST['description'])){ echo $_POST['description'];}?>
                  </textarea>
                </div-->
				<script>
				  tinymce.init({
					selector: 'textarea',
					plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
					toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
					tinycomments_mode: 'embedded',
					tinycomments_author: 'Author name',
					mergetags_list: [
					  { value: 'First.Name', title: 'First Name' },
					  { value: 'Email', title: 'Email' },
					],
					ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
				  });
				</script>
				 <textarea name="description" rows="12" cols="80" placeholder="Entrer la description du service ici">
                      <?php if(!empty($_POST['description'])){ echo $_POST['description'];}?>
                  </textarea>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
            </form>
          </div>
      </div>
</div>