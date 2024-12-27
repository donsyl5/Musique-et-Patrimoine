<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
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
    <?php include 'header-menu.php'; ?>
    <!-- /header -->
    <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="./assets/img/61-vue-eglise.jpeg" style="height: 200px;">
      <div class="container text-center" style="padding-top: 80px;">
        <div class="row">
          <div class="col-md-10 col-xl-8 mx-auto">
            <div class="post-header">
              <!-- /.post-category -->
              <h1 class="display-1 mb-4 text-white">Nos évènements</h1>
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
		 <section class="wrapper bg-light wrapper-border">
		  <div class="container">
			<ul class="list-inline mb-0">
			  <!--li class="list-inline-item me-1 mb-2"><a href="#" class="btn btn-soft-ash btn-sm rounded">Evènements passés</a></li>
			  <li class="list-inline-item me-1 mb-2"><a href="#" class="btn btn-soft-ash btn-sm rounded">Evènements à venir</a></li-->
			  <!--li class="list-inline-item me-1 mb-2"><a href="#" class="btn btn-soft-ash btn-sm rounded text-primary pe-none">Evénements à venir</a></li-->
			</ul>
		  </div>
		  <!-- /.container -->
		</section>
        <div class="row gx-lg-8 gx-xl-12">
          <div class="col-lg-12 order-lg-2">
            <div class="blog single">
              <section class="events">
				<div class="row gx-lg-8 gx-xl-12">
					<?php 
						$req = "SELECT * FROM evenement ORDER BY id_evenement DESC";
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
	
					<!-- Ajouter plus d'événements ici -->
				</section>
				<article class="post">
				  <div class="post-content mb-5">
					<p style="text-align: justify;">
						Tous les concerts sont suivis d'un verre de l'amitié à la maison communale 11, Grande Rue à Champcueil.
					</p>
					<p style="text-align: justify;">
						AU SUJET DE LA LIBRE PARTICIPATION Une réduction d'impôts de 66% est prévue pour le montant de votre participation en chèque ou virement.
					</p>
					<p style="text-align: justify;">
						MISE EN VENTE DE COMPACT-DISC: Les volumes 1 et 2 des Messes retrouvées de Jehan Titelouze Hymne, Magnificat & Pièces d'orgue enregistrées sur l'orgue Thomas de Champcueil par l'Ensemble Les Meslanges, Thomas Van Essen & Volny Hostiou François Ménissier à l'orgue de Champcueil
					</p>
					<p style="text-align: justify;">
						Lieux de vente: "La Maison de Mélusine" 1, rue de Chevannes 91610 Ballancourt.
					</p>
					<blockquote class="fs-lg my-8">
					  <p style="font-size: 16px;">Médiathèque de Champcueil<br />
						Foyer Rural de Champcueil<br />
						4, rue Royale<br />
						91750 Champcueil 
					</p>
					</blockquote>
				  </div>
				  <!-- /.post-footer -->
				</article>
              <!-- /.card -->
            </div>
            <!-- /.blog -->
          </div>
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