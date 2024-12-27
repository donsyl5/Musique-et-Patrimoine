<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
  <div class="content-wrapper">
    <?php 
		include 'header-menu.php'; 
		include("connexion.php");
		include("fonction.php");
		$requete = "SELECT * FROM concert";
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
          <div class="col-lg-8 order-lg-2">
            <div class="blog single">
              <div class="card" style="padding-top: 25px;">
                <div class="card-body">
				<?php
					if($result['image']!=''){
						echo '<figure class="card-img-top"><img src="assets/adhesion/'.$result['image'].'" alt="Adhésion" style="padding-bottom: 50px;"/></figure>';
					}
				?>
                  <div class="classic-view">
                    <article class="post">
                      <div class="post-content mb-5">
						<h2 class="h1 mb-4">Les concerts à l'église de Champcueil</h2>
                        <?php
							echo $result['texte'];
						?>
						<section id="snippet-2" class="wrapper">
							<div class="card">
						  <div class="card-body mb-n4">
							<div class="accordion accordion-wrapper" id="accordionExample">
								<?php 
									$requete1 = "SELECT * FROM  periode_concert";
									$query_req1 = $bdd->prepare($requete1);
									$query_req1->execute();
									$i = 1;
									while($resultat = $query_req1->fetch()) {
									  if($i==1){
										echo '<div class="card accordion-item">
											<div class="card-header" id="heading'.$i.'">
											  <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'"> '.$resultat['periode'].'</button>
											</div>
											
											<div id="collapse'.$i.'" class="accordion-collapse collapse show" aria-labelledby="heading'.$i.'" data-bs-parent="#accordionExample">
											  <div class="card-body">
												<p>'.$resultat['contenu'].' </p>
											  </div>
											  
											</div>
											
										  </div>';  
									  }else{
										  echo '<div class="card accordion-item">
											<div class="card-header" id="heading'.$i.'">
											  <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'"> '.$resultat['periode'].'</button>
											</div>
											
											<div id="collapse'.$i.'" class="accordion-collapse collapse" aria-labelledby="heading'.$i.'" data-bs-parent="#accordionExample">
											  <div class="card-body">
												<p>'.$resultat['contenu'].' </p>
											  </div>
											  
											</div>
											
										  </div>';
									  }
									  
									  $i = $i+1;
									}
							  ?>
							  
							  <div class="alert alert-primary alert-icon" role="alert">
								  <i class="uil uil-star"></i> <?php echo $result['slogan_concert']; ?> 
								</div>
							</div>
							<h2 class="h3 mb-4">ITINERAIRE DEPUIS PARIS </h3>
							<?php echo $result['itineraire']; ?>
							<!--/.accordion -->
						  </div>
					  <!--/.card-body -->
					</div>
					<!--/.card -->
				  </section>
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
          <aside class="col-lg-4 sidebar mt-11 mt-lg-6">
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