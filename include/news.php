<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
<body>
  <div class="content-wrapper">
    <?php 
		include 'header-menu.php'; 
		include("connexion.php");
		include("fonction.php");
		$requete = "SELECT * FROM news ORDER BY id_news DESC";
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
              <h1 class="display-1 mb-4 text-white">Notre actualité</h1>
			  
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
            <div class="blog grid grid-view">
              <div class="row isotope gx-md-8 gy-8 mb-8">
				<?php 
                    $i = 1;
                    while($resultat = $query_req->fetch()) {
						$date = $resultat['date_creation'];
						$formattedDate = date('d M Y', strtotime($date));
						echo '<article class="item post col-md-4">
						  <div class="card">
							<figure class="card-img-top overlay overlay-1 hover-scale"><a href="actualite/'.$resultat['titre_bis'].'"> <img src="assets/news/'.$resultat['image'].'" alt="'.$resultat['titre'].'" /></a>
							</figure>
							<div class="card-body">
							  <div class="post-header">
								<h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="actualite/'.$resultat['titre_bis'].'">'.$resultat['titre'].'</a></h2>
							  </div>
							  <div class="post-content">
								<p style="text-align: justify;">'.$resultat['texte_garde'].'</p>
							  </div>
							</div>
							<div class="card-footer">
							  <ul class="post-meta d-flex mb-0">
								<li class="post-date"><i class="uil uil-calendar-alt"></i><span>'.$formattedDate.'</span></li>
								<li class="post-likes ms-auto"><a href="actualite/'.$resultat['titre_bis'].'" style="font-size: 18px; color: #3f78e0;">Lire la suite</a></li>
							  </ul>
							</div>
						  </div>
						  
						</article>';
                    }
                  ?>
                
                <!-- /.post -->
                
                <!-- /.post -->
              </div>
              <!-- /.row -->
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