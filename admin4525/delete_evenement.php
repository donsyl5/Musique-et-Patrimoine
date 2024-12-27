<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_evenement']);
	$sql = "DELETE FROM evenement WHERE id_evenement=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_evenement.php?sup=1');
?>