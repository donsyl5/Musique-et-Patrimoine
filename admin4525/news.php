<div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <?php 
            include("include/connexion.php");
		    include("include/fonction.php");
            if(!empty($_POST))
            { 
              if(!empty($_POST['titre']) AND !empty($_POST['texte']) AND !empty($_POST['texte_garde']) AND !empty($_FILES["fichier"]["name"]))
              {        
				  $titre=$_POST['titre'];  
				  $titre_news = wd_remove_accents($_POST['titre'], $charset='utf-8');
				  $titre_bis1=string2url($titre_news);
				  $titre_bis = str_replace ('-', '', $titre_bis1);
				  $texte_garde=$_POST['texte_garde'];  
				  $texte=$_POST['texte']; 
				  $tag=$_POST['tag'];
				  $auteur=$_POST['auteur'];
				  $date = date("Y-m-d");
				  $filename = $_FILES["fichier"]["name"];	
					  $target_dir = "../assets/news/";
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
						  $titre_image = clean($titre);	
						  rename("../assets/news/".$_FILES["fichier"]["name"], "../assets/news/".$titre_image.'.'.$imageFileType);
						  $image = $titre_image.'.'.$imageFileType;
						  $req = $bdd->prepare('INSERT INTO news(titre, titre_bis, texte_garde, texte, image, tag, auteur, date_creation) VALUES(:titre, :titre_bis, :texte_garde, :texte, :image, :tag, :auteur, :date_creation)');
							  $req->execute(array(
								'titre' => $titre,
								'titre_bis' => $titre_bis,
								'texte_garde' => $texte_garde,
								'texte' => $texte,
								'image' => $image,
								'tag' => $tag,
								'auteur' => $auteur,
								'date_creation' => $date
							  ));
						  echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Actualité créée avec succès.</div>';
						} else {
						  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
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
              <h3 class="box-title">Actualité</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-floating" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
			<div class="box-body">
				<fieldset>
					<legend>Ajouter un nouvel article</legend> <span class="help-block">Bien vouloir remplir les champs ci-dessous</span>
					<div class="form-group">
						<label for="titre" class="control-label">Titre de l'article<span class="obliged">*</span></label>
						<input type="text" name="titre" class="form-control" required value="<?php if(!empty($_POST['titre'])){ echo $_POST['titre'];}?>"> 
					</div>
					<div class="form-group">
						<label for="texte_garde" class="control-label">Texte de garde<span class="obliged">*</span></label>
						<textarea class="form-control vertical" rows="6" name="texte_garde" placeholder="Saisir votre texte de garde ici"><?php if(!empty($_POST['texte_garde'])){ echo $_POST['texte_garde'];}?></textarea>
					</div>
					<div class="form-group">
						<textarea class="form-control vertical" rows="12" id="editor1" name="texte"><?php if(!empty($_POST['texte'])){ echo $_POST['texte'];}?></textarea> <span class="help-block">Saisir le contenu de l'actualité dans le champs ci-dessus</span> 
					</div>
					<div class="form-group"> 
						<label for="fichier" class="control-label">Ajouter une image à l'article<span class="obliged">*</span></label><br />
						<span class="btn btn-info fileinput-button"> 
							<input type="file" name="fichier"class="fileupload"> 
						</span>
					</div>
					<div class="form-group">
						<label for="tag" class="control-label">Tags</label>
						<input type="text" name="tag" class="form-control" required value="<?php if(!empty($_POST['tag'])){ echo $_POST['tag'];}?>"> 
					</div>
					<div class="form-group">
						<label for="auteur" class="control-label">Auteur</label>
						<input type="text" name="auteur" class="form-control" required value="<?php if(!empty($_POST['auteur'])){ echo $_POST['auteur'];}else{ echo "Admin";}?>"> 
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Enregistrer</button>
					</div>
				</fieldset>
			</div>			
		  </form>
          </div>
      </div>
</div>