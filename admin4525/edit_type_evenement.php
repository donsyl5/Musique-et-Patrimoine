<div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <?php 
            //include("../include/connexion.php");
            $id = intval($_GET['id_type_evenement']);
            if(!empty($_POST))
            { if(!empty($_POST['type_evenement'])){
                $type_evenement=$_POST['type_evenement'];
                $req='select * from type_evenement where type_evenement="'.$type_evenement.'"'; 
                $query = $bdd->prepare($req);
                $query->execute();
                $nbre = $query->rowCount();
                if($nbre==0){
                  $sql = "UPDATE type_evenement SET type_evenement = :type_evenement WHERE id_type_evenement=".$id;
                  $req1 = $bdd->prepare($sql);
                  $req1->execute(array(
                    'type_evenement' => $type_evenement
                  ));
                  echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Modification effectuée avec succès.</div>';                
                }else{
                  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cetype d\'événement existe déjà</div>';
                }                
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Veuillez remplir tous les champs SVP.</div>';
              }
            }
            $requete = "SELECT * FROM type_evenement WHERE id_type_evenement=".$id;
            $query = $bdd->prepare($requete);
            $query->execute();
            $row = $query->fetch();
          ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modifier un type d'événement</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
              <div class="box-body">
				<div class="form-group">
                  <label for="type_evenement">Type</label>
                  <input type="text" class="form-control" name="type_evenement" placeholder="Entrer le type d'événement"  value="<?php if(!empty($_POST['type_evenement'])){ echo $_POST['type_evenement'];}else{ echo $row['type_evenement'];}?>" required>
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