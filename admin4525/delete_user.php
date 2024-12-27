<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_user']);
	$sql = "DELETE FROM users WHERE id_users=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_users.php?sup=1');
?>
