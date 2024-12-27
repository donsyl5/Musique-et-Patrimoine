<div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <?php 
            include("include/connexion.php");
            include("include/fonction.php");
            $membre = intval($_GET['id_membre']);
            $requete = "SELECT * FROM membre WHERE id_membre=".$membre;
            $query_req = $bdd->prepare($requete);
            $query_req->execute();
            $result = $query_req->fetch();
            if(!empty($_POST))
            { 
              if(!empty($_POST['nom_membre']))
              {         
                  $nom_membre=$_POST['nom_membre'];
				  $poste=$_POST['poste'];
				  $reseau=$_POST['reseau'];
				  $date = date("Y-m-d");      
                  $filename = $_FILES["fichier"]["name"];
                  if($filename){
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
							if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) { 
							$titre_image = clean($nom_membre);
							rename("../assets/membres/".$_FILES["fichier"]["name"], "../assets/membres/".$titre_image.'.'.$imageFileType);
							$image = $titre_image.'.'.$imageFileType;
							  //echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
							$sql = "UPDATE membre SET nom_membre=:nom_membre, poste=:poste, reseau=:reseau, image=:image, date_creation=:date_creation WHERE id_membre=".$membre;
							$req1 = $bdd->prepare($sql);
							$req1->execute(array(
							'nom_membre' => $nom_membre,
							'poste' => $poste,
							'reseau' => $reseau,
							'image' => $image,
							'date_creation' => $date
							));
							echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Membre modifié avec succès.</div>';
							if($result['image']!=$image){
							  chmod('../assets/membres/', 0755);
							  @unlink("../assets/membres/".$result['image']);
							}
							}else {
								echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
							}
						}
					}else{
						  $sql = "UPDATE membre SET nom_membre=:nom_membre, poste=:poste, reseau=:reseau, date_creation=:date_creation WHERE id_membre=".$membre;
							$req1 = $bdd->prepare($sql);
							$req1->execute(array(
							'nom_membre' => $nom_membre,
							'poste' => $poste,
							'reseau' => $reseau,
							'date_creation' => $date
							));
							print_r($req1->errorInfo());
							echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Membre modifié avec succès.</div>';
					}                  
				}else{
					echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Bien vouloir remplir tous les champs.</div>';
				}
			}
		?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modifier un membre de l'équipe</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div class="col-md-12">
              <?php
                // Requete Next
                $req_next = "SELECT * FROM membre WHERE  id_membre>".$membre." ORDER BY id_membre ASC Limit 0,1";
                $query_next = $bdd->prepare($req_next);
                $query_next->execute();
                $resultat_next = $query_next->fetch();
                $nbre_next = $query_next->rowCount(); 
                //Requete Previous
                $req_pre = "SELECT * FROM membre WHERE  id_membre<".$membre." ORDER BY id_membre DESC Limit 0,1";
                $query_pre = $bdd->prepare($req_pre);
                $query_pre->execute();
                $resultat_pre = $query_pre->fetch();
                $nbre_pre = $query_pre->rowCount(); 
                echo '<ul class="pager">';
                  if($nbre_pre>0){
                    echo '<li class="previous"><a href="dashboard.php?page=19&id_membre='.$resultat_pre['id_membre'].'">← Membre précédent</a></li>';
                  }
                  if($nbre_next>0){
                    echo '<li class="next"><a href="dashboard.php?page=19&id_membre='.$resultat_next['id_membre'].'">Membre suivant →</a></li>';
                  }
                echo '</ul>';
              ?> 
            </div>
			
			<form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
					<label for="nom_membre">Nom du membre</label>	
					<input type="text" class="form-control" name="nom_membre" placeholder="Entrer le nom du membre"  value="<?php if(!empty($_POST['nom_membre'])){ echo $_POST['nom_membre'];}else{ echo $result['nom_membre'];}?>">
					
                </div>
                <div class="form-group">
				  <div class="row">
					<div class="col-lg-6">
					  <label for="poste">Poste</label>
					  <input type="text" class="form-control" name="poste" placeholder="Entrer le poste en français"  value="<?php if(!empty($_POST['poste'])){ echo $_POST['poste'];}else{ echo $result['poste'];}?>" required>
					</div>
					<div class="col-lg-6">
					  <label for="reseau">Lien résau social du membre</label>	
					  <input type="text" class="form-control" name="reseau" placeholder="Entrer le poste en anglais"  value="<?php if(!empty($_POST['reseau'])){ echo $_POST['reseau'];}else{ echo $result['reseau'];}?>">
					</div>
				  </div>
                  
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Photo du membre</label>
					<?php 
                      if(empty($_FILES["fichier"]["name"])){ echo '<img src="../assets/membres/'.$result['image'].'"  height="100"/>';} else { echo '<img src="../assets/membres/'.$image.'.'.$imageFileType.'"  height="100" />';} 
                    ?>
                    <input type="file" name="fichier" accept="image/*" class="fileupload">
                    <p class="help-block">Attachez la photo du membre</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </form>
			
			 
			<div class="col-md-12">
             <?php
                // Requete Next
                $req_next = "SELECT * FROM membre WHERE  id_membre>".$membre." ORDER BY id_membre ASC Limit 0,1";
                $query_next = $bdd->prepare($req_next);
                $query_next->execute();
                $resultat_next = $query_next->fetch();
                $nbre_next = $query_next->rowCount(); 
                //Requete Previous
                $req_pre = "SELECT * FROM membre WHERE  id_membre<".$membre." ORDER BY id_membre DESC Limit 0,1";
                $query_pre = $bdd->prepare($req_pre);
                $query_pre->execute();
                $resultat_pre = $query_pre->fetch();
                $nbre_pre = $query_pre->rowCount(); 
                echo '<ul class="pager">';
                  if($nbre_pre>0){
                    echo '<li class="previous"><a href="dashboard.php?page=19&id_membre='.$resultat_pre['id_membre'].'">← Membre précédent</a></li>';
                  }
                  if($nbre_next>0){
                    echo '<li class="next"><a href="dashboard.php?page=19&id_membre='.$resultat_next['id_membre'].'">Membre suivant →</a></li>';
                  }
                echo '</ul>';
              ?> 
            </div>
          </div>
      </div>
</div>