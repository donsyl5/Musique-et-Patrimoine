<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
  <div class="content-wrapper">
    <?php 
		include 'header-menu.php'; 
		include("connexion.php");
		include("fonction.php");
		$requete = "SELECT * FROM apropos";
		$query_req = $bdd->prepare($requete);
		$query_req->execute();
		$result = $query_req->fetch();
	?>
    <!-- /header -->
    
    <!-- /section -->
    <section class="wrapper bg-soft-primary">
      <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
          <div class="col-md-12 mx-auto">
            <div class="post-header">
              <!-- /.post-category -->
              <h1 class="display-1 mb-4">Présentation de notre association</h1>
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
      <div class="container pb-14 pb-md-16">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="blog single mt-n17">
              <div class="card">
                <?php
					echo '<figure class="card-img-top"><img src="assets/presentation/'.$result['image'].'" alt="Présentation" style="padding-bottom: 50px;"/></figure>';
				?>
                <div class="card-body">
                  <div class="classic-view">
                    <article class="post">
                      <div class="post-content mb-5">
						<?php
							echo $result['description'];
						?>
                        <!--p style="text-align: justify;">
							<strong>"Musique et Patrimoine"</strong> est une association dédiée à la préservation et à la mise en valeur du patrimoine musical, avec une spécialisation dans la pratique de l'orgue. Fondée par des passionnés de musique et d’histoire, L'association a pour vocation de valoriser et de préserver le riche patrimoine musical, en particulier à travers la pratique et la promotion de l'orgue. Ancrée dans la tradition, elle organise des concerts, des événements culturels, et des ateliers pour sensibiliser le public à cet instrument emblématique et à son histoire.
						</p>
                        <p style="text-align: justify;">
							Notre association est reconnue d'intérêt général par la Direction Générale des Impôts.
						</p>
						<ul class="icon-list bullet-bg bullet-soft-primary mb-0">
						  <li><span><i class="uil uil-check"></i></span><span>Elle est, de ce fait, autorisée à délivrer des reçus fiscaux ouvrant droit à une réduction d'impôt de 66% des sommes versées dans la limite de 20% des revenus (règle en vigueur en 2013). Un don de 100 Euros ne revient donc au final qu'à 34 Euros.</span></li>
						  <li><span><i class="uil uil-check"></i></span><span>Elle est aussi habilitée à recevoir des legs. Nous sommes à disposition pour répondre à vos interrogations sur ce sujet. </span></li>
						</ul>
                        <p style="text-align: justify;">
							Nos activités incluent :
						</p>
						<strong>VISITES DE L'ORGUE</strong>
                        <p style="text-align: justify;">
							Les visites constituent un excellent moyen d'approcher l'orgue, de le toucher, de pouvoir admirer de très près sa construction. Ces visites sont mensuelles, par groupe de 6, un nombre qui permet à chacun de profiter pleinement de cet instant rare. 
						</p>
						<strong> FESTIVAL D'ORGUE</strong>
                        <p style="text-align: justify;">
							Notre association organise un festival de deux jours le premier week-end d'octobre avec quatre manifestations. 
						</p>
						<strong> CONCERTS</strong>
                        <p style="text-align: justify;">
							Nous organisons plusieurs concerts dans le courant de l'année (journée de l'orgue, journées du patrimoine, Noël, etc...).
						</p>
                        <p style="text-align: justify;">
							En nous rejoignant, vous contribuez à la préservation de ce trésor musical et à la transmission de cet art intemporel, ancré dans le paysage culturel de notre région.
						</p-->
						<h3 class="h2 mb-4">NOS PARTENAIRES</h3>
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