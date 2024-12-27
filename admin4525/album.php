<div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <?php 
            include("include/connexion.php");
		  include("include/fonction.php");
            if(!empty($_POST))
            { 
              if(!empty($_POST['nom_album']))
              {        
				  $nom_album=$_POST['nom_album'];
				  $nom_album = wd_remove_accents($_POST['nom_album'], $charset='utf-8');
				  $nom_bis1=string2url($nom_album);
				  $nom_bis = str_replace ('-', '', $nom_bis1);
				  $rep1 = wd_remove_accents($nom_album);
				  $rep = string2url($rep1);
				  $date = date("Y-m-d");
					$req = $bdd->prepare('INSERT INTO album(nom_album, nom_bis, rep, date_creation) VALUES(:nom_album, :nom_bis, :rep, :date_creation)');
					  $req->execute(array(
						'nom_album' => $nom_album,
						'nom_bis' => $nom_bis,
						'rep' => $rep,
						'date_creation' => $date
					  ));
					  $id=$bdd ->lastInsertId(); 
					  $album=$id.'_'.$rep;
					  @mkdir ("../assets/albums/".$album);
					  @mkdir ("../assets/albums/".$album.'/thumbs');
					  echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Album créé avec succès.</div>';
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
              <h3 class="box-title">Créer un nouvel album</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="nom_album">Nom de l'album</label>
                  <input type="text" class="form-control" name="nom_album" placeholder="Entrer le nom de l'album"  value="<?php if(!empty($_POST['nom_album'])){ echo $_POST['nom_album'];}?>">
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