<div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <?php 
            //include("../include/connexion.php");
            if(!empty($_POST))
            { if(!empty($_POST['periode'])){
                $periode=$_POST['periode'];
                $contenu=$_POST['contenu'];
                $req='select * from periode_concert where periode="'.$periode.'"'; 
                $query = $bdd->prepare($req);
                $query->execute();
                $nbre = $query->rowCount();
                if($nbre==0){
                  $req = $bdd->prepare('INSERT INTO periode_concert(periode, contenu) VALUES(:periode, :contenu)');
                  $req->execute(array(
                  'periode' => $periode,
                  'contenu' => $contenu
                  ));
                  echo '<div class="alert alert-success" role="alert"><strong>Oh well!</strong> Période enregistrée avec succès</div>';
                }else{
                  echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Cette période existe déjà</div>';
                }                
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Veuillez remplir tous les champs SVP.</div>';
              }
            }
          ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Créer une nouvelle période</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="periode">Période du concert</label>
                  <input type="text" class="form-control" name="periode" placeholder="Entrer la période du concert"  value="<?php if(!empty($_POST['periode'])){ echo $_POST['periode'];}?>" required>
                </div>				
                <div class="form-group">
                  <label>Contenu du concert</label>
				  <textarea id="editor1" name="contenu" rows="6" cols="80" placeholder="Entrer le contenu ici"><?php if(!empty($_POST['contenu'])){ echo $_POST['contenu'];}?></textarea>
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