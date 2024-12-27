<div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <?php 
            include("include/connexion.php");
            include("include/fonction.php");
            $news = intval($_GET['id_news']);
            $requete = "SELECT * FROM news WHERE id_news=".$news;
            $query_req = $bdd->prepare($requete);
            $query_req->execute();
            $result = $query_req->fetch();
            if(!empty($_POST))
            { 
              if(!empty($_POST['titre']) AND !empty($_POST['texte']))
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
                  if($filename){
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
							  //echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
							$sql = "UPDATE news SET titre=:titre, titre_bis=:titre_bis, texte_garde=:texte_garde,  texte=:texte, tag=:tag, image=:image, auteur=:auteur WHERE id_news=".$news;
							$req1 = $bdd->prepare($sql);
							$req1->execute(array(
							'titre' => $titre,
							'titre_bis' => $titre_bis,
							'texte_garde' => $texte_garde,
							'texte' => $texte,
							'tag' => $tag,
							'image' => $image,
							'auteur' => $auteur
							));							
							echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Actualité modifiée avec succès.</div>';
							if($result['image']!=$image){
							  chmod('../assets/news/', 0755);
							  @unlink("../assets/news/".$result['image']);
							}
						} else {
							  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
							}
						}
					}else{
						  $sql = "UPDATE news SET titre=:titre, titre_bis=:titre_bis, texte_garde=:texte_garde, texte=:texte, tag=:tag, auteur=:auteur WHERE id_news=".$news;
							$req1 = $bdd->prepare($sql);
							$req1->execute(array(
							'titre' => $titre,
							'titre_bis' => $titre_bis,
							'texte_garde' => $texte_garde,
							'texte' => $texte,
							'tag' => $tag,
							'auteur' => $auteur
							));				
							echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Actualité modifiée avec succès.</div>';
					}                  
				}else{
					echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Bien vouloir remplir tous les champs.</div>';
				}
			}
		?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modifier un service</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
			
			<form class="form-floating" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
			<div class="box-body">
				<fieldset>
					<legend>Modifier un article</legend> <span class="help-block">Bien vouloir remplir les champs ci-dessous</span>
					<div class="form-group">
						<label for="titre" class="control-label">Titre de l'actualité <span class="obliged">*</span></label>
						<input type="text" name="titre" class="form-control" required value="<?php if(!empty($_POST['titre'])){ echo $_POST['titre'];}else{ echo $result['titre'];}?>"> 
					</div>
					<div class="form-group">
						<label for="texte_garde" class="control-label">Texte de garde<span class="obliged">*</span></label>
						<textarea class="form-control vertical" rows="6" name="texte_garde" placeholder="Saisir votre texte de garde ici"><?php if(!empty($_POST['texte_garde'])){ echo $_POST['texte_garde'];}else{ echo $result['texte_garde'];}?></textarea>
					</div>
					<div class="form-group"> 
						<span class="btn btn-info fileinput-button"> 
							 <?php 
							  if(empty($_FILES["fichier"]["name"])){ echo '<img src="../assets/news/'.$result['image'].'" width="200"/>';} else { echo '<img src="../assets/news/'.$image.'.'.$imageFileType.'" width="200" />';} 
							?>
							<input type="file" name="fichier"class="fileupload"> 
						</span>
					</div>
					<div class="form-group">
						<label for="texte">Saisir votre texte dans le champs ci-dessus</label>
						<textarea class="form-control vertical" rows="12" id="editor1" name="texte"><?php if(!empty($_POST['texte'])){ echo $_POST['texte'];}else{ echo $result['texte'];}?></textarea> 
					</div>
					<div class="form-group">
						<label for="tag" class="control-label">Tags</label>
						<input type="text" name="tag" class="form-control" required value="<?php if(!empty($_POST['tag'])){ echo $_POST['tag'];}else{ echo $result['tag'];}?>"> 
					</div>
					<div class="form-group">
						<label for="auteur" class="control-label">Auteur</label>
						<input type="text" name="auteur" class="form-control" required value="<?php if(!empty($_POST['auteur'])){ echo $_POST['auteur'];}else{ echo $result['auteur'];}?>"> 
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Modifier</button>
					</div>
				</fieldset>
			</div>			
		  </form>
          </div>
		</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>