<div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <?php 
            //include("../include/connexion.php");
            $id = intval($_GET['id_lien']);
            if(!empty($_POST))
            { if(!empty($_POST['nom'])){
                $nom=$_POST['nom'];
                $lien=$_POST['lien'];
				$date = date("Y-m-d");
                $req='select * from lien_utile where nom="'.$nom.'"'; 
                $query = $bdd->prepare($req);
                $query->execute();
                $nbre = $query->rowCount();
                if($nbre==0){
                  $sql = "UPDATE lien_utile SET nom = :nom, lien = :lien, date_creation = :date_creation WHERE id_lien=".$id;
                  $req1 = $bdd->prepare($sql);
                  $req1->execute(array(
                    'nom' => $nom,
					'lien' => $lien,
					'date_creation' => $date
                  ));
                  echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Modification effectuée avec succès.</div>';                
                }else{
                  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cette structure existe déjà</div>';
                }                
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Veuillez remplir tous les champs SVP.</div>';
              }
            }
            $requete = "SELECT * FROM lien_utile WHERE id_lien=".$id;
            $query = $bdd->prepare($requete);
            $query->execute();
            $row = $query->fetch();
          ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modifier un lien utile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
              <div class="box-body">
				<div class="form-group">
                  <label for="nom">Nom de la structure</label>
                  <input type="text" class="form-control" name="nom" placeholder="Entrer le nom de la structure"  value="<?php if(!empty($_POST['nom'])){ echo $_POST['nom'];}else{ echo $row['nom'];}?>" required>
                </div>
				<div class="form-group">
                  <label for="lien">Lien de la structure</label>
                  <input type="text" class="form-control" name="lien" placeholder="Entrer le lien de la structure"  value="<?php if(!empty($_POST['lien'])){ echo $_POST['lien'];}else{ echo $row['lien'];}?>" required>
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