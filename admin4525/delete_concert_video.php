<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_concert_video']);
	$sql = "DELETE FROM concert_video WHERE id_concert_video=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_concert_video.php?sup=1');
?>