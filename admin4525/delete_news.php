<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_news']);
	$req = "SELECT * FROM news WHERE id_news=".$id;
	$query = $bdd->prepare($req);
	$query->execute();
	$resultat = $query->fetch();
	chmod('../assets/news/', 0755);
	@unlink("../assets/news/".$resultat['image']);
	$sql = "DELETE FROM news WHERE id_news=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_news.php?sup=1');
?>