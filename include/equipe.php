<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
  <div class="content-wrapper">
    <?php 
		include 'header-menu.php'; 
		include("connexion.php");
		include("fonction.php");
		$requete = "SELECT * FROM membre ORDER BY id_membre DESC";
		$query_req = $bdd->prepare($requete);
		$query_req->execute();
		//$result = $query_req->fetch();
	?>
    <!-- /header -->
    
    <!-- /section -->
    <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="./assets/img/61-vue-eglise.jpeg" style="height: 200px;">
      <div class="container text-center" style="padding-top: 80px;">
        <div class="row">
          <div class="col-md-10 col-xl-8 mx-auto">
            <div class="post-header">
              <!-- /.post-category -->
              <h1 class="display-1 mb-4 text-white">Notre équipe</h1>
              <!-- /.post-meta -->
            </div>
            <!-- /.post-header -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container py-14 py-md-16">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
          <!--/column -->
          <div class="col-lg-12">
				<p style="text-align: justify;">
					Notre équipe est animée par une passion commune : préserver et faire vivre le riche patrimoine musical qui nous relie à notre histoire.
					Composée de musiciens, de passionnés de patrimoine et de bénévoles dévoués, elle œuvre chaque jour pour mettre en lumière la beauté et 
					la diversité de la musique d'orgue et d'autres trésors musicaux. Ensemble, nous travaillons avec enthousiasme pour partager ces 
					merveilles avec le plus grand nombre et transmettre cet héritage aux générations futures.
				</p>
				<p style="text-align: justify;">
					Découvrez les personnes qui, par leur engagement, rendent cela possible !
				</p>
          </div>
          <div class="col-lg-12">
            <div class="swiper-container text-center mb-6" data-margin="30" data-dots="true" data-items-xl="3" data-items-md="2" data-items-xs="1">
              <div class="swiper">
                <div class="swiper-wrapper">
					<?php 
                    $i = 1;
                    while($resultat = $query_req->fetch()) {
                      echo ' <div class="swiper-slide">
						<img class="rounded-circle w-20 mx-auto mb-4" src="./assets/membres/'.$resultat['image'].'" srcset="./assets/membres/'.$resultat['image'].' 2x" alt="'.$resultat['nom_membre'].'" />
						<h4 class="mb-1">'.$resultat['nom_membre'].'</h4>
						<div class="meta mb-2">'.$resultat['poste'].'</div>
						<nav class="nav social justify-content-center text-center mb-0">
						  <a href="'.$resultat['reseau'].'" target="_blank"><i class="uil uil-linkedin"></i></a>
						</nav>
					  </div>';
                    }
                  ?>
                  
                </div>
                <!--/.swiper-wrapper -->
              </div>
              <!-- /.swiper -->
            </div>
            <!-- /.swiper-container -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php'; ?>
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/theme.js"></script>
</body>

</html>