<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_service']);
	$req = "SELECT * FROM service WHERE id_service=".$id;
	$query = $bdd->prepare($req);
	$query->execute();
	$resultat = $query->fetch();
	chmod('../assets/services/', 0755);
	@unlink("../assets/services/".$resultat['image']);
	$sql = "DELETE FROM service WHERE id_service=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_service.php?sup=1');
?>