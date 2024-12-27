<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
  <div class="content-wrapper">
    <?php 
		include 'header-menu.php'; 
		include("connexion.php");
		include("fonction.php");
		$requete = "SELECT * FROM cloche";
		$query_req = $bdd->prepare($requete);
		$query_req->execute();
		$result = $query_req->fetch();
	?>
    <!-- /header -->
    <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="./assets/img/61-vue-eglise.jpeg" style="height: 200px;">
      <div class="container text-center" style="padding-top: 80px;">
        <div class="row">
          <div class="col-md-10 col-xl-8 mx-auto">
            <div class="post-header">
              <!-- /.post-category -->
              <h1 class="display-1 mb-4 text-white">L'Eglise de Champcueil</h1>
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
        <div class="row gx-lg-8 gx-xl-12">
          <div class="col-lg-9 order-lg-2">
            <div class="blog single">
              <div class="card" style="padding-top: 25px;">
                <div class="card-body">
				<?php
					if($result['image']!=''){
						echo '<figure class="card-img-top"><img src="assets/cloche/'.$result['image'].'" alt="Adhésion" style="padding-bottom: 50px;"/></figure>';
					}
				?>
                  <div class="classic-view">
                    <article class="post">
                      <div class="post-content mb-5">
						<h2 class="h1 mb-4">Les cloches de l'église de Champcueil</h2>
                        <?php
							echo $result['texte'];
						?>
						<div class="swiper-container blog grid-view mb-17 mb-md-20" data-margin="30" data-dots="true" data-items-xl="3" data-items-md="2" data-items-xs="1">
						  <div class="swiper">
							<div class="swiper-wrapper">
								<?php 
								  $req = "SELECT * FROM  documents WHERE type_doc='mp3' ORDER BY date_creation";
								  $query = $bdd->prepare($req);
								  $query->execute();
								  $nbre = $query->rowCount();
									while($resultat = $query->fetch()) {
										echo '<div class="swiper-slide">
											<article>
												<div class="audio-container" style="background: url(assets/img/cloche.jpg) no-repeat center center/cover;">
													<audio controls>
														<source src="assets/documents/'.$resultat['fichier'].'" type="audio/mpeg">
														Votre navigateur ne supporte pas l\'élément audio.
													</audio>
												</div>
											  <div class="post-header" style="margin-top: 30px;">
												<h2 class="post-title h3 mb-3">'.$resultat['nom'].'</h2>
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
                      </div>
                      <!-- /.post-footer -->
                    </article>
                    <!-- /.post -->
                  </div>
                  <!-- /.comment-form -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.blog -->
          </div>
          <!-- /column -->
          <aside class="col-lg-3 sidebar mt-11 mt-lg-6">
            <div class="widget">
              <?php include 'menu-eglise.php'; ?>
            </div>
          </aside>
          <!-- /column .sidebar -->
        </div>
        <!-- /.row -->
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