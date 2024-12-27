<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_partenaire']);
	$req = "SELECT * FROM partenaire WHERE id_partenaire=".$id;
	$query = $bdd->prepare($req);
	$query->execute();
	$resultat = $query->fetch();
	chmod('../assets/partenaires/', 0755);
	@unlink("../assets/partenaires/".$resultat['image']);
	$sql = "DELETE FROM partenaire WHERE id_partenaire=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_partenaire.php?sup=1');
?>