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
              <h1 class="display-1 mb-4 text-white">Nos vidéos</h1>
			  
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
            <div class="swiper-container blog grid-view mb-17 mb-md-20" data-margin="30" data-dots="true" data-items-xl="2" data-items-md="2" data-items-xs="1">
          <div class="swiper">
            <div class="swiper-wrapper">
				<?php 
					function getYouTubeVideoId($url) {
						// Si l'URL contient "v=", traiter comme un lien classique
						if (strpos($url, "v=") !== false) {
							$parts = explode("v=", $url);
							return isset($parts[1]) ? explode("&", $parts[1])[0] : null;
						}
						// Sinon, traiter comme un lien court
						elseif (strpos($url, "youtu.be") !== false) {
							$parts = explode("/", $url);
							return end($parts);
						}
						return null; // Retourner null si ce n'est pas un lien YouTube valide
					}
				  $req = "SELECT * FROM concert_video ORDER BY id_concert_video ASC";
				  $query = $bdd->prepare($req);
				  $query->execute();
				  $nbre = $query->rowCount();
				  while($resultat = $query->fetch()) {
					  $date = $resultat['date_concert'];
					  $formattedDate = date('d M Y', strtotime($date));
					  $id_video = getYouTubeVideoId($resultat['lien_youtube']);
					  echo '<div class="swiper-slide">
						<article>
						  <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="'.$id_video.'"></div>
						  <div class="post-header">
							<h2 class="post-title h3 mb-3">'.$resultat['titre_concert'].'</h2>
						  </div>
						  <div class="post-footer">
							<ul class="post-meta">
							  <li class="post-date"><i class="uil uil-calendar-alt"></i><span>'.$formattedDate.'</span>, à '.$resultat['lieu_concert'].'</li>
							</ul>
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