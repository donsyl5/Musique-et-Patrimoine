<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php 
            include("include/connexion.php");
            include("include/fonction.php");
            $service = intval($_GET['id_service']);
            $requete = "SELECT * FROM service WHERE id_service=".$service;
            $query_req = $bdd->prepare($requete);
            $query_req->execute();
            $result = $query_req->fetch();
            if(!empty($_POST))
            { 
              if(!empty($_POST['titre']))
              {         
                  $titre=$_POST['titre'];
				  $description=$_POST['description'];
				  $date = date("Y-m-d");        
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
						} else {
						if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) { 
						$titre_image = clean($titre);
						rename("../assets/services/".$_FILES["fichier"]["name"], "../assets/services/".$titre_image.'.'.$imageFileType);
						$image = $titre_image.'.'.$imageFileType;
						  //echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
						  $sql = "UPDATE service SET titre=:titre, image=:image, description=:description, date_creation=:date_creation WHERE id_service=".$service;
                        $req1 = $bdd->prepare($sql);
                        $req1->execute(array(
                        'titre' => $titre,
						'image' => $image,
						'description' => $description,
						'date_creation' => $date
                        ));
                        echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Service modifié avec succès.</div>';
                        if($result['image']!=$image){
                          chmod('../assets/services/', 0755);
                          @unlink("../assets/services/".$result['image']);
                        }
    							} else {
    							  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong>Un problème est survenu pendant l\'upload de votre image</div>';
    							}
						}
					}else{
						  $sql = "UPDATE service SET titre=:titre, description=:description, date_creation=:date_creation WHERE id_service=".$service;
						  $req1 = $bdd->prepare($sql);
						  $req1->execute(array(
							'titre' => $titre,
							'description' => $description,
							'date_creation' => $date
							));
					     echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Service modifié avec succès.</div>';
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
			<div class="col-md-12">
              <?php
                // Requete Next
                $req_next = "SELECT * FROM service WHERE  id_service>".$service." ORDER BY id_service ASC Limit 0,1";
                $query_next = $bdd->prepare($req_next);
                $query_next->execute();
                $resultat_next = $query_next->fetch();
                $nbre_next = $query_next->rowCount(); 
                //Requete Previous
                $req_pre = "SELECT * FROM service WHERE  id_service<".$service." ORDER BY id_service DESC Limit 0,1";
                $query_pre = $bdd->prepare($req_pre);
                $query_pre->execute();
                $resultat_pre = $query_pre->fetch();
                $nbre_pre = $query_pre->rowCount(); 
                echo '<ul class="pager">';
                  if($nbre_pre>0){
                    echo '<li class="previous"><a href="dashboard.php?page=26&id_service='.$resultat_pre['id_service'].'">← Service précédent</a></li>';
                  }
                  if($nbre_next>0){
                    echo '<li class="next"><a href="dashboard.php?page=26&id_service='.$resultat_next['id_service'].'">Service suivant →</a></li>';
                  }
                echo '</ul>';
              ?> 
            </div>
			
			<form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="titre">Titre du service</label>
                  <input type="text" class="form-control" name="titre" placeholder="Entrer le titre du service"  value="<?php if(!empty($_POST['titre'])){ echo $_POST['titre'];}else{ echo $result['titre'];}?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image illustrative du service</label>
					<?php 
                      if(empty($_FILES["fichier"]["name"])){ echo '<img src="../assets/services/'.$result['image'].'" width="200"/>';} else { echo '<img src="../assets/services/'.$image.'.'.$imageFileType.'" width="10" />';} 
                    ?>
                    <input type="file" name="fichier" accept="image/*" class="fileupload">
                    <p class="help-block">Attachez une image</p>
                </div>
                <div class="form-group">
                  <label>Description</label>
				  <textarea id="editor1" name="description" rows="12" cols="80" placeholder="Entrer la description de l'artiste ici">
                      <?php if(!empty($_POST['description'])){ echo $_POST['description'];}else{ echo $result['description'];}?>
                  </textarea>
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
                $req_next = "SELECT * FROM service WHERE  id_service>".$service." ORDER BY id_service ASC Limit 0,1";
                $query_next = $bdd->prepare($req_next);
                $query_next->execute();
                $resultat_next = $query_next->fetch();
                $nbre_next = $query_next->rowCount(); 
                //Requete Previous
                $req_pre = "SELECT * FROM service WHERE  id_service<".$service." ORDER BY id_service DESC Limit 0,1";
                $query_pre = $bdd->prepare($req_pre);
                $query_pre->execute();
                $resultat_pre = $query_pre->fetch();
                $nbre_pre = $query_pre->rowCount(); 
                echo '<ul class="pager">';
                  if($nbre_pre>0){
                    echo '<li class="previous"><a href="dashboard.php?page=26&id_service='.$resultat_pre['id_service'].'">← Service précédent</a></li>';
                  }
                  if($nbre_next>0){
                    echo '<li class="next"><a href="dashboard.php?page=26&id_service='.$resultat_next['id_service'].'">Service suivant →</a></li>';
                  }
                echo '</ul>';
              ?> 
            </div>
          </div>
      </div>
</div>