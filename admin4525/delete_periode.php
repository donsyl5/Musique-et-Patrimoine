<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_periode']);
	$sql = "DELETE FROM periode_concert WHERE id_periode=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_periode.php?sup=1');
?>