<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_membre']);
	$req = "SELECT * FROM membre WHERE id_membre=".$id;
	$query = $bdd->prepare($req);
	$query->execute();
	$resultat = $query->fetch();
	chmod('../assets/membres/', 0755);
	@unlink("../assets/membres/".$resultat['image']);
	$sql = "DELETE FROM membre WHERE id_membre=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_equipe.php?sup=1');
?>