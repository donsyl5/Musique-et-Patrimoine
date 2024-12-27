<style>
		.dock {
		border: 4px dotted #cccccc;
		background-color: #ededed;
		width: 600px;
		height: 300px;
		color: #aaa;
		font-size: 18px;
		text-align: center;
		padding-top: 100px;
	}
	.dock_hover {
		border: 4px dotted #4d90fe;
		background-color: #e7f0ff;
		width: 600px;
		height: 300px;
		color: #4d90fe;
		font-size: 18px;
		text-align: center;
		padding-top: 100px;
	}
	</style>
</style>
<div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <?php 
            $id_album = intval($_GET['id_album']);
			$req1 = "SELECT * FROM album WHERE id_album=".$id_album;
			$query1 = $bdd->prepare($req1);
			$query1->execute();
			$resultat1 = $query1->fetch();
          ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ajouter des photos à l'album <?php echo $resultat1['nom_album']; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="form1" action="" enctype="multipart/form-data">
              <div class="box-body">                 
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
				</div>
                  <input type="hidden" class="form-control" name="id_album"  value="<?php echo $id_album; ?>">                
				<!--div class="form-group">
                  <label>Choisir l'album</label>
                  <select class="form-control" name="album">
					<?php 
						/*$req = "SELECT * FROM album ORDER BY id_album DESC";
						  $query = $bdd->prepare($req);
						  $query->execute();
						while($resultat = $query->fetch()){
							echo '<option value="'.$resultat['id_album'].'">'.$resultat['nom_album_fr'].'</option>';
						}*/
					?>
                  </select>
                </div--> 			 
				<div id="result"></div>							
				<div align="center">
				    <?php 
			            $reqete = "SELECT * FROM photo WHERE id_album=".$id_album;
			            $query = $bdd->prepare($reqete);
			            $query->execute();
						$nbre = $query->rowCount();
						echo '<h4>Cet album possède '.$nbre.' photos déjà.</h4>';
                    ?>
				</div>
				<div align="center">
					<div id="dock" class="dock">Glissez et deposez vos images ici <br />Maximum 4 images <br /> Taille: Maximum 1024x720</div> 
				</div> 
                <?php 
			        while($resultat = $query->fetch()){
						echo '<div class="col-md-3">';
							echo '<img src="../assets/albums/'.$id_album.'_'.$resultat1['rep'].'/thumbs/'.$resultat['min_photo'].'" height="100" style="margin-top: 15px;" /><br />';
							echo '<a href="delete_photo.php?id_photo='.$resultat['id_photo'].'">Supprimer</a>';
						echo '</div>';
					}
                ?>
            </form>
          </div>
      </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/tuto-dd-upload-image.js"></script>