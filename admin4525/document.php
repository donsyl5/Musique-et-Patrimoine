<div class="row">
        <!-- left column -->
        <div class="col-md-10">
          
          <?php
		  include("include/connexion.php");
		  include("include/fonction.php");
		  if(!empty($_POST)){ 
              if(!empty($_POST['nom']))
              { 
				  $nom=$_POST['nom'];
				  $type_doc=$_POST['type_doc'];
				  $date = date("Y-m-d");   
				  if(isset($_FILES["fichier"]["name"]) AND $_FILES["fichier"]["name"]!=''){
					  $filename = $_FILES["fichier"]["name"];
					  $target_dir = "../assets/documents/";
					  $target_file = $target_dir . basename($_FILES["fichier"]["name"]);
					  $uploadOk = 1;
					  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
					  if($imageFileType != "pdf" AND $imageFileType != "mp3") {
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Désolé, seuls les fichiers pdf et mp3 sont acceptés.</div>';
						$uploadOk = 0;
					  }// Check if $uploadOk is set to 0 by an error
					  if ($uploadOk == 0) {
						echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Sorry, your file was not uploaded.</div>';
					  // if everything is ok, try to upload file
					  }else{  
							if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {  
							  $titre_image = clean($nom);
							  rename("../assets/documents/".$_FILES["fichier"]["name"], "../assets/documents/".$titre_image.'.'.$imageFileType);
							  $image = $titre_image.'.'.$imageFileType;
							  $oldname = '../assets/documents/'.$image;
								  $req = $bdd->prepare('INSERT INTO documents(nom, fichier, type_doc, date_creation) VALUES(:nom, :fichier, :type_doc, :date_creation)');
								  $req->execute(array(
									'nom' => $nom,
									'fichier' => $image,
									'type_doc' => $type_doc,
									'date_creation' => $date
								  ));
								echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Document créé avec succès</div>';
						}else {
						  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
						}
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
              <h3 class="box-title">Ajouter un nouveau document</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
					<label for="nom">Titre du document</label>	
					<input type="text" class="form-control" name="nom" placeholder="Entrer le titre du document"  value="<?php if(!empty($_POST['nom'])){ echo $_POST['nom'];}?>">
					
                </div>
                <div class="form-group">
					<label for="type_doc">Type de document</label>
					   <select name="type_doc" class="form-control">
						<option value="pdf">PDF</option>
						<option value="mp3">MP3</option>
					  </select>
					
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Fichier du document (pdf)</label>
                    <input type="file" name="fichier" class="fileupload">
                    <p class="help-block">Attachez la fichier du document</p>
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