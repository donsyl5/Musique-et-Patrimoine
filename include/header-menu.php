<?php 
	include("connexion.php");
	$requete_adresse = "SELECT * FROM adresse";
	$query_adresse = $bdd->prepare($requete_adresse);
	$query_adresse->execute();
	$resultat_adresse = $query_adresse->fetch();
?>
<header class="wrapper bg-light">
      <div class="bg-primary text-white fw-bold fs-15 mb-2">
        <div class="container py-1 d-md-flex flex-md-row">
          <div class="d-flex flex-row align-items-center">
            <div class="icon text-white fs-22 mt-1 me-2"> <i class="uil uil-location-pin-alt"></i></div>
            <address class="mb-0"><?php echo $resultat_adresse['adresse']; ?></address>
          </div>
          <div class="d-flex flex-row align-items-center me-6 ms-auto">
            <div class="icon text-white fs-22 mt-1 me-2"> <i class="uil uil-phone-volume"></i></div>
            <p class="mb-0"><?php echo $resultat_adresse['phone']; ?></p>
          </div>
          <div class="d-flex flex-row align-items-center">
            <div class="icon text-white fs-22 mt-1 me-2"> <i class="uil uil-message"></i></div>
            <p class="mb-0"><a href="mailto:<?php echo $resultat_adresse['adresse_email']; ?>" class="link-white hover"><?php echo $resultat_adresse['adresse_email']; ?></a></p>
          </div>
          <div class="d-flex flex-row align-items-center">
            <p class="mb-0" style="margin-left: 15px;"><a href="#" style="color: yellow; font-size: 18px; font-weight: 600; text-decoration: underline;">Faire un don</a></p>
          </div>
        </div>
        <!-- /.container -->
      </div>
      <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand w-100">
            <a href="./" style="color: #03224c; font-size: 24px; font-weight: 700; padding-right: 70px;">
              L'Orgue de Champcueil
            </a>
          </div>
          <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
            <div class="offcanvas-header d-lg-none">
              <h3 class="text-white fs-30 mb-0">L'Orgue de Champcueil</h3>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
              <ul class="navbar-nav">
				<?php 
					$table_page = explode ("/",$_SERVER['PHP_SELF']);
					$total_element = count($table_page);
					if($table_page[$total_element-1]=='index.php'){
						echo '<li class="nav-item">
						  <a class="nav-link active"  href="./">Accueil</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">A propos de nous</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="presentation">Présentation de l\'association</a></li>
							<li class="nav-item"><a class="dropdown-item" href="adhesion">Adhésion</a></li>
							<li class="nav-item"><a class="dropdown-item" href="equipe">Notre équipe</a></li>
							<li class="nav-item"><a class="dropdown-item" href="eglise">L\'Eglise de Champcueil</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="orgue">Nos orgues</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="evenements">Evènements</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="actualite">Actualités</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Galerie</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="albums">Albums photos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="videos">Vidéos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="audios">Audios</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="contact">Contact</a>
						</li>';
					}
					if($table_page[$total_element-1]=='presentation.php' OR $table_page[$total_element-1]=='adhesion.php' OR $table_page[$total_element-1]=='eglise.php' OR $table_page[$total_element-1]=='concert-eglise.php' OR $table_page[$total_element-1]=='cloches-eglise.php' OR $table_page[$total_element-1]=='equipe.php'){
						echo '<li class="nav-item">
						  <a class="nav-link"  href="./">Accueil</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown">A propos de nous</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="presentation">Présentation de l\'association</a></li>
							<li class="nav-item"><a class="dropdown-item" href="adhesion">Adhésion</a></li>
							<li class="nav-item"><a class="dropdown-item" href="equipe">Notre équipe</a></li>
							<li class="nav-item"><a class="dropdown-item" href="eglise">L\'Eglise de Champcueil</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="orgue">Nos orgues</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="evenements">Evènements</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="actualite">Actualités</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Galerie</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="albums">Albums photos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="videos">Vidéos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="audios">Audios</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="contact">Contact</a>
						</li>';
					}
					if($table_page[$total_element-1]=='orgue.php'){
						echo '<li class="nav-item">
						  <a class="nav-link"  href="./">Accueil</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">A propos de nous</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="presentation">Présentation de l\'association</a></li>
							<li class="nav-item"><a class="dropdown-item" href="adhesion">Adhésion</a></li>
							<li class="nav-item"><a class="dropdown-item" href="equipe">Notre équipe</a></li>
							<li class="nav-item"><a class="dropdown-item" href="eglise">L\'Eglise de Champcueil</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link active" href="orgue">Nos orgues</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="evenements">Evènements</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="actualite">Actualités</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Galerie</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="albums">Albums photos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="videos">Vidéos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="audios">Audios</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="contact">Contact</a>
						</li>';
					}
					if($table_page[$total_element-1]=='contact.php'){
						echo '<li class="nav-item">
						  <a class="nav-link"  href="./">Accueil</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">A propos de nous</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="presentation">Présentation de l\'association</a></li>
							<li class="nav-item"><a class="dropdown-item" href="adhesion">Adhésion</a></li>
							<li class="nav-item"><a class="dropdown-item" href="equipe">Notre équipe</a></li>
							<li class="nav-item"><a class="dropdown-item" href="eglise">L\'Eglise de Champcueil</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="orgue">Nos orgues</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="evenements">Evènements</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="actualite">Actualités</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Galerie</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="albums">Albums photos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="videos">Vidéos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="audios">Audios</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link active" href="contact">Contact</a>
						</li>';
					}
					if($table_page[$total_element-1]=='evenements.php'){
						echo '<li class="nav-item">
						  <a class="nav-link"  href="./">Accueil</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">A propos de nous</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="presentation">Présentation de l\'association</a></li>
							<li class="nav-item"><a class="dropdown-item" href="adhesion">Adhésion</a></li>
							<li class="nav-item"><a class="dropdown-item" href="equipe">Notre équipe</a></li>
							<li class="nav-item"><a class="dropdown-item" href="eglise">L\'Eglise de Champcueil</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="orgue">Nos orgues</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link active" href="evenements" data-bs-toggle="dropdown">Evènements</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="actualite">Actualités</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Galerie</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="albums">Albums photos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="videos">Vidéos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="audios">Audios</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="contact">Contact</a>
						</li>';
					}
					if($table_page[$total_element-1]=='news.php' OR $table_page[$total_element-1]=='detail-news.php'){
						echo '<li class="nav-item">
						  <a class="nav-link"  href="./">Accueil</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">A propos de nous</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="presentation">Présentation de l\'association</a></li>
							<li class="nav-item"><a class="dropdown-item" href="adhesion">Adhésion</a></li>
							<li class="nav-item"><a class="dropdown-item" href="equipe">Notre équipe</a></li>
							<li class="nav-item"><a class="dropdown-item" href="eglise">L\'Eglise de Champcueil</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="orgue">Nos orgues</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="evenements" data-bs-toggle="dropdown">Evènements</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link active" href="actualite">Actualités</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Galerie</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="albums">Albums photos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="videos">Vidéos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="audios">Audios</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="contact">Contact</a>
						</li>';
					}
					if($table_page[$total_element-1]=='albums.php' OR $table_page[$total_element-1]=='album-photo.php' OR $table_page[$total_element-1]=='videos.php' OR $table_page[$total_element-1]=='audios.php'){
						echo '<li class="nav-item">
						  <a class="nav-link"  href="./">Accueil</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">A propos de nous</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="presentation">Présentation de l\'association</a></li>
							<li class="nav-item"><a class="dropdown-item" href="adhesion">Adhésion</a></li>
							<li class="nav-item"><a class="dropdown-item" href="equipe">Notre équipe</a></li>
							<li class="nav-item"><a class="dropdown-item" href="eglise">L\'Eglise de Champcueil</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="orgue">Nos orgues</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="evenements" data-bs-toggle="dropdown">Evènements</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="actualite">Actualités</a>
						</li>
						<li class="nav-item dropdown">
						  <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown">Galerie</a>
						  <ul class="dropdown-menu">
							<li class="nav-item"><a class="dropdown-item" href="albums">Albums photos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="videos">Vidéos</a></li>
							<li class="nav-item"><a class="dropdown-item" href="audios">Audios</a></li>
						  </ul>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="contact">Contact</a>
						</li>';
					}
				?>
                
                
                
              </ul>
              <!-- /.navbar-nav -->
              <div class="offcanvas-footer d-lg-none">
                <div>
                  <a href="musiqueetpatrimoine@gmail.com" class="link-inverse">musiqueetpatrimoine@gmail.com</a>
                  <br /> 06 24 49 70 83 <br />
                  <nav class="nav social social-white mt-4">
                    <a href="#"><i class="uil uil-twitter"></i></a>
                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                    <a href="#"><i class="uil uil-youtube"></i></a>
                  </nav>
                  <!-- /.social -->
                </div>
              </div>
              <!-- /.offcanvas-footer -->
            </div>
            <!-- /.offcanvas-body -->
          </div>
          <!-- /.navbar-collapse -->
          <div class="navbar-other w-100 d-flex ms-auto">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item d-lg-none">
                <button class="hamburger offcanvas-nav-btn"><span></span></button>
              </li>
            </ul>
            <!-- /.navbar-nav -->
          </div>
          <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
      </nav>
      <!-- /.navbar -->
    </header>