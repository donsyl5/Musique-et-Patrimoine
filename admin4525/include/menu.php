<?php 
  $requete_users = "SELECT * FROM users";
  $stmt = $bdd->prepare($requete_users);
  $stmt->execute();
  $nombre_users = $stmt->rowCount();
  /*$requete_service = "SELECT * FROM service";
  $stmt = $bdd->prepare($requete_service);
  $stmt->execute();
  $nombre_service = $stmt->rowCount();
  $requete_partenaire = "SELECT * FROM partenaire";
  $stmt = $bdd->prepare($requete_partenaire);
  $stmt->execute();
  $nombre_partenaire = $stmt->rowCount();
  $requete_agence = "SELECT * FROM agence";
  $stmt = $bdd->prepare($requete_agence);
  $stmt->execute();
  $nombre_agence = $stmt->rowCount();*/
?>
<ul class="sidebar-menu" style="height: 1000px;">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
			
          </a>
		  
        </li>
		<li class="treeview" id="scrollspy-components">
		  <a href="javascript:void(0)"><i class="fa fa-circle-o"></i> 
			L'association
			<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
           </span>
		  </a>
		  <ul class="nav treeview-menu">
			<li><a href="dashboard.php?page=6" style="background-color: #374850; color: white;">Présentation Association</a></li>
			<li><a href="dashboard.php?page=8" style="background-color: #374850; color: white;">Adhesion</a></li>
			<li><a href="dashboard.php?page=9" style="background-color: #374850; color: white;">L'Eglise de Champcueil</a></li>
			<li><a href="dashboard.php?page=11" style="background-color: #374850; color: white;">Les concerts de l'église</a></li>
			<li><a href="liste_periode.php" style="background-color: #374850; color: white;">Les périodes de concert de l'église</a></li>
			<li><a href="dashboard.php?page=14" style="background-color: #374850; color: white;">Les cloches de l'église</a></li>
			<li><a href="liste_equipe.php" style="background-color: #374850; color: white;">Notre équipe</a></li>
		  </ul>
		</li>
        <li class="treeview">
          <a href="dashboard.php?page=16">
            <i class="fa fa-edit"></i> <span>Nos orgues</span>
          </a>
        </li>
        <li class="treeview">
          <a href="dashboard.php?page=17">
            <i class="fa fa-edit"></i> <span>Texte accueil</span>
          </a>
        </li>
        <li class="treeview">
          <a href="liste_document.php">
            <i class="fa fa-edit"></i> <span>Documents</span>
          </a>
        </li>
        <li class="treeview">
          <a href="liste_users.php">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $nombre_users; ?> utilisateurs</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="dashboard.php?page=5">
            <i class="fa fa-edit"></i> <span>Bannière Accueil</span>
          </a>
        </li>
        <li class="treeview">
          <a href="liste_news.php">
            <i class="fa fa-edit"></i> <span>Actualités</span>
          </a>
        </li>
		<li class="treeview" id="scrollspy-components">
		  <a href="javascript:void(0)">
			<i class="fa fa-circle-o"></i>Evénements
			<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
           </span>
		  </a>
		  <ul class="nav treeview-menu">
			<li><a href="liste_type_evenement.php" style="background-color: #374850; color: white;">Types d'événement</a></li>
			<li><a href="liste_evenement.php" style="background-color: #374850; color: white;">Liste d'événements</a></li>
		  </ul>
		</li>
        <li class="treeview">
          <a href="dashboard.php?page=7">
            <i class="fa fa-edit"></i> <span>Présentation des orgues</span>
          </a>
        </li>
        <li class="treeview">
          <a href="liste_album.php">
            <i class="fa fa-edit"></i> <span>Albums</span>
          </a>
        </li>
        <li class="treeview">
          <a href="liste_lien_utile.php">
            <i class="fa fa-edit"></i> <span>Liens utiles</span>
          </a>
        </li>
        <li class="treeview">
		  <a href="liste_concert_video.php">
            <i class="fa fa-book"></i>
            <span>Concert vidéo</span>
          </a>
        </li>
        <li class="treeview">
		  <a href="dashboard.php?page=31">
            <i class="fa fa-book"></i>
            <span>Adresse</span>
          </a>
        </li>
      </ul>