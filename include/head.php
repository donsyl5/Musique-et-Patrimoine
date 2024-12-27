<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Découvrez l'association Musique et Patrimoine, dédiée à la promotion et à la préservation du patrimoine organistique. Concerts, événements et formations autour de l'orgue, un instrument au cœur de notre culture musicale.">
  <meta name="keywords" content="orgue, musique d'orgue, concerts d'orgue, patrimoine organistique, association musicale, restauration d'orgue, orgue historique, événements musicaux, pratique de l'orgue, formation musicale, orgue en France">
  <meta name="author" content="elemis">
  <base href="http://localhost/orgue/1/" />
  <?php 
		include 'connexion.php';
		$description ='';
		$image ='images/logo.png';
		$table_page = explode ("/",$_SERVER['PHP_SELF']);
		$total_element = count($table_page);
		if($table_page[$total_element-1]=='index.php'){
			$title = 'L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='presentation.php'){
			$title = 'Présentation | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='adhesion.php'){
			$title = 'Adhésion | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='orgue.php'){
			$title = 'Nos orgues | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='eglise.php'){
			$title = 'L\'Eglise de Champcueil | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='concert-eglise.php'){
			$title = 'Les concerts à l\'Eglise de Champcueil | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='cloches-eglise.php'){
			$title = 'Les concerts à l\'Eglise de Champcueil | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='evenements.php'){
			$title = 'Nos évènemenets | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='contact.php'){
			$title = 'Nous contacter | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='equipe.php'){
			$title = 'Notre équipe | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='news.php'){
			$title = 'Actualité | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='detail-news.php'){
			$url = $_SERVER["REQUEST_URI"];
			$url1 = explode('/', $url);
			$lien = $url1[4];
			$req_id_news = "SELECT * FROM news WHERE titre_bis='".$lien."'";
			$query_id_news = $bdd->prepare($req_id_news);
			$query_id_news->execute();
			$resultat_id_news = $query_id_news->fetch();
			$id_news = $resultat_id_news['id_news'];
			$title = $resultat_id_news['titre'].' | L\'Orgue de Champcueil';
		}
		if($table_page[$total_element-1]=='albums.php'){
			$title = 'Nos albums photos | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='album-photo.php'){
			$url = $_SERVER["REQUEST_URI"];
			$url1 = explode('/', $url);
			$lien = $url1[4];
			$req_id_album = "SELECT * FROM album WHERE nom_bis='".$lien."'";
			$query_id_album = $bdd->prepare($req_id_album);
			$query_id_album->execute();
			$resultat_id_album = $query_id_album->fetch();
			$id_album = $resultat_id_album['id_album'];
			$req_titre_album = "SELECT * FROM album WHERE id_album=".$id_album;
			$query_album = $bdd->prepare($req_titre_album);
			$query_album->execute();
			$resultat_album = $query_album->fetch(); 
			$title = $resultat_album['nom_album'].' - L\'Orgue de Champcueil';
		}
		if($table_page[$total_element-1]=='videos.php'){
			$title = 'Nos vidéos | L\'Orgue de Champcueil';  
		}
		if($table_page[$total_element-1]=='audios.php'){
			$title = 'Nos audios | L\'Orgue de Champcueil';  
		}
	?>
  <title><?php echo $title;?></title>
  <!--link rel="shortcut icon" href="./assets/img/favicon.png"-->
  <link rel="stylesheet" href="./assets/css/plugins.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/colors/grape.css">
  <link rel="preload" href="./assets/css/fonts/urbanist.css" as="style" onload="this.rel='stylesheet'">  
</head>