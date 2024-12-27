<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php'; ?>
<style>
	h1 {
    text-align: center;
    margin-top: 20px;
    color: #333;
}

.events {
    width: 100%;
    margin: 0 auto;
    padding: 20px;
}

.event {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.date {
    /*flex: 1;*/
	width: 30%;
    text-align: center;
    background-color: #605dba;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
	padding-bottom: 0;
}

.details {
    flex: 3;
    margin-left: 20px;
}

.details h2 {
    margin: 0 0 10px 0;
}

.details p {
    margin: 0;
}
</style>

<body>
  <div class="content-wrapper">
    <?php include 'include/header-menu.php'; ?>
    <!-- /header -->
    <?php include 'include/banner.php'; ?>
    <!-- /section -->
    <section class="wrapper bg-light">
		<?php 
		$reqhome = "SELECT * FROM home";
		$query_reqhome = $bdd->prepare($reqhome);
		$query_reqhome->execute();
		$resulthome = $query_reqhome->fetch();
	?>
      <div class="container pt-14 pt-md-17 pb-14 pb-md-18">
        <div class="row">
          <div class="col-md-12">
			<h1 class="mb-3"><?php echo $resulthome['titre'];?></h1>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
		<div class="tab-pane fade show active" id="tab2-1">
            <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
              <div class="col-lg-6">
				<?php 
					echo '<figure class="rounded shadow-lg"><img src="assets/home/'.$resulthome['image'].'" srcset="assets/home/'.$resulthome['image'].'" alt="'.$resulthome['titre'].'"></figure>';
				?>
                
              </div>
              <!--/column -->
              <div class="col-lg-6">
                <?php echo $resulthome['texte'];?>
                <a href="<?php echo $resulthome['lien_bouton'];?>" class="btn btn-fuchsia mt-2"><?php echo $resulthome['texte_bouton'];?></a>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
              
        <!--/.row -->
        
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
      
      <!-- /.container-card -->
      <div class="container">
        
        <!-- /.grid-view -->
        <div class="row text-center">
          <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto" style="width: 100%;">
            <h3 class="display-4 me-lg-n5">Nos Événements</h3>
			<p>Découvrez les événements à venir et restez connecté(e) avec les opportunités à ne pas manquer.</p>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <section class="events">
				<div class="row gx-lg-8 gx-xl-12">
					<?php 
						$req = "SELECT * FROM evenement ORDER BY id_evenement DESC LIMIT 2";
						$query = $bdd->prepare($req);
						$query->execute();
						$nbre = $query->rowCount();							
						while($resultat = $query->fetch()) {
							// Créer un objet DateTime
							$dateTime = new DateTime($resultat['date_evenement']);

							// Définir le format souhaité
							setlocale(LC_TIME, 'fr_FR.UTF-8'); // S'assurer d'utiliser la locale française
							/*$localeActive = setlocale(LC_TIME, 'fr_FR.UTF-8');

							if (!$localeActive) {
								die("La locale française n'est pas disponible sur le serveur.");
							}*/
							// Formater la date
							$dateFormatee = strftime("%A %e %B %Y", $dateTime->getTimestamp());
							//$dateFormatee = $dateTime->format('Y-m-d H:i:s');

							// Ajouter le suffixe "1er" pour le jour si nécessaire
							if ($dateTime->format('j') == 1) {
								$dateFormatee = str_replace(' 1 ', ' 1er ', $dateFormatee);
							}

							echo '<div class="col-lg-6 order-lg-2">
								<div class="event">
									<div class="date">
										<p>'.ucfirst($dateFormatee).' à '.$resultat['heure'].'</p>
									</div>
									<div class="details">
										<h2 style="font-size: 22px;">'.$resultat['titre'].'</h2>
									</div>
								</div>
							</div>';
						}
					?>
				</div>
				<a href="evenements" class="btn btn-expand btn-primary rounded-pill">
					<i class="uil uil-arrow-right"></i>
					<span>Voir plus d'événements</span>
				</a>
					<!-- Ajouter plus d'événements ici -->
				</section>
        <!-- /.grid-view -->
        <!-- /.grid-view -->
        <div class="row text-center">
          <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto" style="width: 100%;">
            <h3 class="display-4 me-lg-n5">No dernière actualité</h3>
			<p>Découvrez notre dernière actualité</p>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
       <section class="wrapper bg-light">
      <div class="container" style="padding-top: 50px;">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">			
          <!--/column -->
          <div class="col-lg-12">
            <div class="blog grid grid-view">
              <div class="row isotope gx-md-8 gy-8 mb-8">
				<?php 
					$requete = "SELECT * FROM news ORDER BY id_news DESC LIMIT 3";
					$query_req = $bdd->prepare($requete);
					$query_req->execute();
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
	  <a href="actualite" class="btn btn-expand btn-primary rounded-pill">
			<i class="uil uil-arrow-right"></i>
			<span>Voir plus d'actualité</span>
		</a>
      <!-- /.container -->
    </section>
        <!-- /.grid-view -->
        <div class="row text-center">
          <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto" style="width: 100%;">
            <h3 class="display-4 me-lg-n5">Nos derniers concerts</h3>
			<p>Découvrez nos derniers concerts</p>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
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
				  $req = "SELECT * FROM concert_video ORDER BY id_concert_video ASC LIMIT 2";
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
			 <a href="videos" class="btn btn-expand btn-primary rounded-pill">
				<i class="uil uil-arrow-right"></i>
				<span>Voir plus de vidéos</span>
			</a>
          </div>
          <!-- /.swiper -->
        </div>
        <!-- /.swiper-container -->
        <!-- /.grid-view -->
        <div class="row text-center">
          <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto" style="width: 100%;">
            <h3 class="display-4 me-lg-n5">Nos dernières productions audio</h3>
			<p>Ecoutez nos récentes créations sonores</p>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
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
        
        <!--/.row -->
        
        <!--/.row -->
        
        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'include/footer.php'; ?>
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/theme.js"></script>
</body>

</html>