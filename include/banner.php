	<?php 
		include("connexion.php");
		include("fonction.php");
		$requete = "SELECT * FROM banniere";
		$query_req = $bdd->prepare($requete);
		$query_req->execute();
		$result = $query_req->fetch();
	?>
	<section class="wrapper bg-light">
      <div class="container-card">
        <div class="card image-wrapper bg-full bg-image bg-overlay bg-overlay-light-500 mt-2 mb-5" data-image-src="./assets/img/bg22.png">
          <div class="card-body py-14 px-0" style="background: linear-gradient(135deg, #E6EFFE, #03224c); color: white;">
            <div class="container">
              <div class="row gx-md-8 gx-xl-12 gy-10 align-items-center text-center text-lg-start">
                <div class="col-lg-6" data-cues="slideInDown" data-group="page-title" data-delay="900">
                  <h1 class="display-2 mb-4 me-xl-5 me-xxl-0" style="color: white;"><?php echo $result['titre'];?></h1>
                  <p class="lead fs-23 lh-sm mb-7 pe-xxl-15"><?php echo $result['description'];?></p>
                  <div><a href="<?php echo $result['lien_bouton'];?>" class="btn btn-lg btn-gradient gradient-1 rounded"><?php echo $result['texte_bouton'];?></a></div>
                </div>
                <!--/column -->
                <div class="col-lg-6">
					<?php 
						echo '<img class="img-fluid mb-n18" src="assets/banniere/'.$result['image'].'" srcset="assets/banniere/'.$result['image'].'" data-cue="fadeIn" data-delay="300" alt="'.$result['titre'].'" />';
					?>
                  
                </div>
                <!--/column -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container -->
          </div>
          <!--/.card-body -->
        </div>
        <!--/.card -->
      </div>
      <!-- /.container-card -->
    </section>