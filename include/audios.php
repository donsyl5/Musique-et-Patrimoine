<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
<body>
  <div class="content-wrapper">
    <?php 
		include 'header-menu.php'; 
		include("connexion.php");
		include("fonction.php");
	?>
    <!-- /header -->
    
    <!-- /section -->
    <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="./assets/img/61-vue-eglise.jpeg" style="height: 200px;">
      <div class="container text-center" style="padding-top: 80px;">
        <div class="row">
          <div class="col-md-10 col-xl-8 mx-auto">
            <div class="post-header">
              <!-- /.post-category -->
              <h1 class="display-1 mb-4 text-white">Nos dernières productions audios</h1>
			  
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
      <div class="container" style="padding-top: 50px;">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">			
          <!--/column -->
          <div class="col-lg-12">
            <div class="swiper-container blog grid-view mb-17 mb-md-20" data-margin="30" data-dots="true" data-items-xl="3" data-items-md="2" data-items-xs="1">
          <div class="swiper">
            <div class="swiper-wrapper">
			  <?php 
				$req_audio = "SELECT * FROM documents WHERE type_doc='mp3' ORDER BY id_document ASC LIMIT 3";
				$query_audio = $bdd->prepare($req_audio);
				$query_audio->execute();
				while($resultat_audio = $query_audio->fetch()) {
				echo '<div class="swiper-slide">
					<article>
						<div class="audio-container" style="background: url(assets/img/simone.jpg) no-repeat center center/cover;">
							<audio controls>
								<source src="assets/documents/'.$resultat_audio['fichier'].'" type="audio/mpeg">
								Votre navigateur ne supporte pas l\'élément audio.
							</audio>
						</div>
					  <div class="post-header" style="margin-top: 30px;">
						<h2 class="post-title h3 mb-3">'.$resultat_audio['nom'].'</h2>
					  </div>
					</article>
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