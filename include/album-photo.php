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
              <h1 class="display-1 mb-4 text-white"><?php echo $resultat_album['nom_album']; ?></h1>
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
					<li><a href="albums">Nos albums photos</a></li>
					<li><a href="#"><?php echo $resultat_album['nom_album']; ?></a></li>
				</ul>
			</nav>
        <div class="row gx-lg-8 gx-xl-12" style="padding-top: 50px;">
          <!--/column -->
          <div class="col-lg-12">
            <div class="blog grid grid-view">
              <div class="row isotope gx-md-8 gy-8 mb-8">
				<div class="row mt-5 gx-md-6 gy-6">
					<?php 
						$req_photo = "SELECT * FROM photo WHERE id_album=".$id_album." ORDER BY id_photo";
						$query_poto = $bdd->prepare($req_photo);
						$query_poto->execute();
						while($resultat_photo = $query_poto->fetch()){
							echo '<div class="item col-md-3">
								  <figure class="hover-scale rounded cursor-dark"><a href="assets/albums/'.$id_album.'_'.$resultat_album['rep'].'/'.$resultat_photo['file_photo'].'" data-glightbox data-gallery="project-1"><img src="assets/albums/'.$id_album.'_'.$resultat_album['rep'].'/'.$resultat_photo['file_photo'].'" alt="" /></a></figure>
								</div>';
						} 
					?>
				</div>
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