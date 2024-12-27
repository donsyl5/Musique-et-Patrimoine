<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_lien']);
	$sql = "DELETE FROM lien_utile WHERE id_lien=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_lien_utile.php?sup=1');
?>