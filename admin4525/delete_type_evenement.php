<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_type_evenement']);
	$sql = "DELETE FROM type_evenement WHERE id_type_evenement=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_type_evenement.php?sup=1');
?>