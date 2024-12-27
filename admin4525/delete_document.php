<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_document']);
	$req = "SELECT * FROM documents WHERE id_document=".$id;
	$query = $bdd->prepare($req);
	$query->execute();
	$resultat = $query->fetch();
	chmod('../assets/documents/', 0755);
	@unlink("../assets/documents/".$resultat['fichier']);
	$sql = "DELETE FROM documents WHERE id_document=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	header('Location:liste_document.php?sup=1');
?>