<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
<?php
	function string2url($chaine) { 
		$chaine = trim($chaine); 
		$chaine = strtr($chaine, 
		"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", 
		"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn"); 
		$chaine = strtr($chaine,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz"); 
		$chaine = strtr($chaine,"."," "); 
		$chaine = preg_replace('#([^.a-z0-9]+)#i', '-', $chaine); 
		$chaine = preg_replace('#-{2,}#','-',$chaine); 
		$chaine = preg_replace('#-$#','',$chaine); 
		$chaine = preg_replace('#^-#','',$chaine); 
		return $chaine; 
	}
	function wd_remove_accents($str, $charset='utf-8'){
		$str = htmlentities($str, ENT_NOQUOTES, $charset);    
		$str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
		$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
		$str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères    
		return $str;
	}
?>

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
              <h1 class="display-1 mb-4 text-white">Nos albums photos</h1>
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
      <div class="container py-14">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
          <!--/column -->
          <div class="col-lg-12">
            <div class="blog grid grid-view">
              <div class="row isotope gx-md-8 gy-8 mb-8">
				<?php 
						$req_news = "SELECT * FROM album ORDER BY id_album DESC";
						$query_news = $bdd->prepare($req_news);
						$query_news->execute();
						
						while($resultat_news = $query_news->fetch()){
							$titre = wd_remove_accents($resultat_news['nom_album'], $charset='utf-8');
							$reqete = "SELECT * FROM photo WHERE id_album=".$resultat_news['id_album'];
							$query = $bdd->prepare($reqete);
							$query->execute();
							$resultat = $query->fetch();
							echo '<article class="item post col-md-3">
							  <div class="card">
								<figure class="card-img-top overlay overlay-1 hover-scale"><a href="galerie/'.$resultat_news['nom_bis'].'"> <img src="assets/albums/'.$resultat_news['id_album'].'_'.$resultat_news['rep'].'/'.$resultat['file_photo'].'" alt="'.$resultat_news['nom_album'].'"></a>
								</figure>
								<div class="card-body">
								  <div class="post-header">
									<h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="galerie/'.$resultat_news['nom_bis'].'">'.$resultat_news['nom_album'].'</a></h2>
								  </div>
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