<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php 
            include("include/connexion.php");
            include("include/fonction.php");
            $partenaire = intval($_GET['id_partenaire']);
            $requete = "SELECT * FROM partenaire WHERE id_partenaire=".$partenaire;
            $query_req = $bdd->prepare($requete);
            $query_req->execute();
            $result = $query_req->fetch();
            if(!empty($_POST))
            { 
              if(!empty($_POST['nom']))
              {         
                  $nom=$_POST['nom'];
				  $site_web=$_POST['site_web'];
				  $date = date("Y-m-d");        
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
						} else {
						if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) { 
						$titre_image = clean($nom);
						rename("../assets/partenaires/".$_FILES["fichier"]["name"], "../assets/partenaires/".$titre_image.'.'.$imageFileType);
						$image = $titre_image.'.'.$imageFileType;
						  //echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
						  $sql = "UPDATE partenaire SET nom=:nom,  site_web=:site_web, image=:image, date_creation=:date_creation WHERE id_partenaire=".$partenaire;
                        $req1 = $bdd->prepare($sql);
                        $req1->execute(array(
                        'nom' => $nom,
						'image' => $image,
						'site_web' => $site_web,
						'date_creation' => $date
                        ));
                        echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Partenaire modifié avec succès.</div>';
                        if($result['image']!=$image){
                          chmod('../assets/partenaires/', 0755);
                          @unlink("../assets/partenaires/".$result['image']);
                        }
    							} else {
    							  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
    							}
						}
					}else{
						   $sql = "UPDATE partenaire SET nom=:nom,  site_web=:site_web, date_creation=:date_creation WHERE id_partenaire=".$partenaire;
                        $req1 = $bdd->prepare($sql);
                        $req1->execute(array(
                        'nom' => $nom,
						'site_web' => $site_web,
						'date_creation' => $date
                        ));
					     echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Partenaire modifié avec succès.</div>';
					}                  
				}else{
					echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Bien vouloir remplir tous les champs.</div>';
				}
			}
		?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modifier un partenaire</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div class="col-md-12">
              <?php
                // Requete Next
                $req_next = "SELECT * FROM partenaire WHERE  id_partenaire>".$partenaire." ORDER BY id_partenaire ASC Limit 0,1";
                $query_next = $bdd->prepare($req_next);
                $query_next->execute();
                $resultat_next = $query_next->fetch();
                $nbre_next = $query_next->rowCount(); 
                //Requete Previous
                $req_pre = "SELECT * FROM partenaire WHERE  id_partenaire<".$partenaire." ORDER BY id_partenaire DESC Limit 0,1";
                $query_pre = $bdd->prepare($req_pre);
                $query_pre->execute();
                $resultat_pre = $query_pre->fetch();
                $nbre_pre = $query_pre->rowCount(); 
                echo '<ul class="pager">';
                  if($nbre_pre>0){
                    echo '<li class="previous"><a href="dashboard.php?page=29&id_partenaire='.$resultat_pre['id_partenaire'].'">← Partenaire précédent</a></li>';
                  }
                  if($nbre_next>0){
                    echo '<li class="next"><a href="dashboard.php?page=29&id_partenaire='.$resultat_next['id_partenaire'].'">Partenaire suivant →</a></li>';
                  }
                echo '</ul>';
              ?> 
            </div>
			
			<form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nom">Nom du partenaire</label>
                  <input type="text" class="form-control" name="nom" placeholder="Entrer le nom du partenaire"  value="<?php if(!empty($_POST['nom'])){ echo $_POST['nom'];}else{ echo $result['nom'];}?>" required>
                </div>
                <div class="form-group">
                  <label for="site_web">Site web</label>
                  <input type="text" class="form-control" name="site_web" placeholder="Entrer le site web de l'artiste précédé de http://"  value="<?php if(!empty($_POST['site_web'])){ echo $_POST['site_web'];}else{ echo $result['site_web'];}?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image illustrative du partenaire</label>
					<?php 
                      if(empty($_FILES["fichier"]["name"])){ echo '<img src="../assets/partenaires/'.$result['image'].'" width="200"/>';} else { echo '<img src="../assets/partenaires/'.$image.'.'.$imageFileType.'" width="10" />';} 
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
			
			<div class="col-md-12">
              <?php
                // Requete Next
                $req_next = "SELECT * FROM partenaire WHERE  id_partenaire>".$partenaire." ORDER BY id_partenaire ASC Limit 0,1";
                $query_next = $bdd->prepare($req_next);
                $query_next->execute();
                $resultat_next = $query_next->fetch();
                $nbre_next = $query_next->rowCount(); 
                //Requete Previous
                $req_pre = "SELECT * FROM partenaire WHERE  id_partenaire<".$partenaire." ORDER BY id_partenaire DESC Limit 0,1";
                $query_pre = $bdd->prepare($req_pre);
                $query_pre->execute();
                $resultat_pre = $query_pre->fetch();
                $nbre_pre = $query_pre->rowCount(); 
                echo '<ul class="pager">';
                  if($nbre_pre>0){
                    echo '<li class="previous"><a href="dashboard.php?page=29&id_partenaire='.$resultat_pre['id_partenaire'].'">← Partenaire précédent</a></li>';
                  }
                  if($nbre_next>0){
                    echo '<li class="next"><a href="dashboard.php?page=29&id_partenaire='.$resultat_next['id_partenaire'].'">Partenaire suivant →</a></li>';
                  }
                echo '</ul>';
              ?> 
            </div>
          </div>
      </div>
</div>