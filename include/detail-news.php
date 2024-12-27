<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
<style>
        .breadcrumb {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .breadcrumb li {
            margin: 0;
            padding: 0;
        }
        .breadcrumb li a {
            text-decoration: none;
            color: #605dba; /* Bleu pour les liens */
        }
        .breadcrumb li a:hover {
            text-decoration: underline;
        }
        .breadcrumb li::after {
            content: ">";
            margin: 0 8px;
            color: #6c757d; /* Couleur grise pour le séparateur */
        }
        .breadcrumb li:last-child::after {
            content: ""; /* Supprime le séparateur pour le dernier élément */
        }
        .breadcrumb li:last-child a {
            color: #6c757d; /* Couleur grise pour l'élément actif */
            pointer-events: none; /* Désactive le lien pour l'élément actif */
        }
    </style>

<body>
  <div class="content-wrapper">
    <?php 
		include 'header-menu.php'; 
		include("fonction.php");
		$requete = "SELECT * FROM news WHERE id_news=".$id_news;
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
              <h1 class="display-1 mb-4 text-white"><?php echo $resultat_id_news['titre']; ?></h1>
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
		<nav aria-label="Fil d'Ariane">
				<ul class="breadcrumb">
					<li><a href="index.html">Accueil</a></li>
					<li><a href="actualite">Nos actualités</a></li>
					<li><a href="#"><?php echo $resultat_id_news['titre']; ?></a></li>
				</ul>
			</nav>
        <div class="row gx-lg-8 gx-xl-12" style="padding-top: 50px;">
          <div class="col-lg-8">
            <div class="blog single">
              <div class="card">
                <?php echo '<figure class="card-img-top"><img src="assets/news/'.$resultat_id_news['image'].'" alt="'.$resultat_id_news['titre'].'" /></figure>'; ?>
                <div class="card-body">
                  <div class="classic-view">
                    <article class="post">
                      <div class="post-content mb-5" style="padding-top: 50px;">
                        <?php echo $resultat_id_news['texte']; ?>
                      </div>
                      <!-- /.post-content -->
                      <div class="post-footer d-md-flex flex-md-row justify-content-md-between align-items-center mt-8">
                        <div class="mb-0 mb-md-2">
                          <div class="dropdown share-dropdown btn-group">
							<?php 
								/*$article_url = $url;
								$facebook_url = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($article_url);
								$twitter_url = "https://twitter.com/intent/tweet?url=" . urlencode($article_url) . "&text=" . urlencode($article_title);
								$linkedin_url = "https://www.linkedin.com/shareArticle?mini=true&url=" . urlencode($article_url) . "&title=" . urlencode($article_title);
								$whatsapp_url = "https://api.whatsapp.com/send?text=" . urlencode($article_title . " " . $article_url);*/
							?>
                            <div class="share-buttons">
								<a href="<?php /*$facebook_url*/ ?>" target="_blank" class="btn btn-facebook" style="display: inline-block; padding: 5px 5px; margin: 5px; text-decoration: none; color: #fff; border-radius: 5px;">Partager sur Facebook</a>
								<a href="<?php /*$twitter_url*/ ?>" target="_blank" class="btn btn-twitter" style="display: inline-block; padding: 5px 5px; margin: 5px; text-decoration: none; color: #fff; border-radius: 5px;">Partager sur Twitter</a>
								<a href="<?php /*$linkedin_url*/ ?>" target="_blank" class="btn btn-linkedin" style="display: inline-block; padding: 5px 5px; margin: 5px; text-decoration: none; color: #fff; border-radius: 5px;">Partager sur LinkedIn</a>
								<a href="<?php /*$whatsapp_url*/ ?>" target="_blank" class="btn btn-whatsapp" style="display: inline-block; padding: 5px 5px; margin: 5px; text-decoration: none; color: #fff; border-radius: 5px;">Partager sur WhatsApp</a>
							</div>
                          </div>
                          <!--/.share-dropdown -->
                        </div>
                      </div>
                      <!-- /.post-footer -->
                    </article>
                    <!-- /.post -->
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.blog -->
          </div>
          <?php include 'droit-news.php'; ?>
          
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