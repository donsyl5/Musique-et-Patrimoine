<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
  <div class="content-wrapper">
    <?php 
		include 'header-menu.php'; 
		include("connexion.php");
		include("fonction.php");
		$requete = "SELECT * FROM eglise";
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
              <div class="card">
               <?php
					echo '<figure class="card-img-top"><img src="assets/eglise/'.$result['image'].'" alt="L\'Eglise de Champcueil" style="padding-bottom: 50px;"/></figure>';
				?>
                <div class="card-body">
                  <div class="classic-view">
                    <article class="post">
                      <div class="post-content mb-5">
						<?php
							echo $result['texte'];
						?>
                        <!--p style="text-align: justify;">
							L'église de Champcueil a pour origine un édifice pré-roman. Les vestiges d'une abside semi-circulaire ont été repérés sous le rond-point du choeur en février 1984. Les dispositions principales de l'église datent du XIIème siècle, fortement modifiées au XIIIème siècle avec la construction d'un nouveau choeur. Le porche, adossé à la façade occidentale, a été construit à une période indéterminée.
						</p>
                        <p style="text-align: justify;">
							L'élévation intérieure de la nef est constituée de grandes arcades et de fenêtres hautes. Les piliers rectangulaires, flanqués de colonnes engagées surmontées de chapiteaux à feuillage, supportent les nervures de voûtes épaisses plus anciennes. Si le couvrement de la nef et sa charpente ont été modifés, le haut vaisseau est toujours contrebuté à l'extérieur par les arcs-boutants d'origine.
						</p>
                        <p style="text-align: justify;">
							Le choeur est composé d'un sanctuaire en hémicycle à cinq travées entouré par un déambulatoire. Les trois ouvertures (piscines) pratiquées dans les murs indiquent que les autels étaient placés dans le déambulatoire. L'élévation du choeur est divisée en trois niveaux: grandes arcades, triforium et fenêtres hautes. Les piles adoptent une forme octogonale et comportent des chapiteaux qui pourraient être du XVIIIème siècle (*).
						</p>
                        <p style="text-align: justify;">
							Une horloge monumentale avait été commandée dans les années 1670/1680, ayant un cadran doré sur un champ d'azur. Une autre horloge fut installée vers 1850, offerte par l'un des descendants de Abraham-Louis Bréguet (fondateur de la marque d'horlogerie), à l'occasion du mariage de sa fille. 
						</p>
						<blockquote class="fs-lg my-8">
                          <p style="font-size: 16px;">* Le texte ci-dessus est, dans sa majorité, un extrait d'une brochure intitulée "Eglise classée de Champcueil - Histoire d'une restauration", publiée par le conseil général de l'Essonne, co-réalisée par la direction de la culture et Stéphane Berhault (architecte). </p>
                        </blockquote-->
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