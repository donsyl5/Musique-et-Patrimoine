<?php 
	include("include/connexion.php");
	$id = intval($_GET['id_photo']);
	$req = "SELECT * FROM photo WHERE id_photo=".$id;
	$query = $bdd->prepare($req);
	$query->execute();
	$resultat = $query->fetch();
	$req1 = "SELECT * FROM album WHERE id_album=".$resultat['id_album'];
	$query1 = $bdd->prepare($req1);
	$query1->execute();
	$resultat1 = $query1->fetch();
	chmod('../assets/albums/'.$resultat1['id_album'], 0755);
	@unlink("../assets/albums/".$resultat1['id_album']."_".$resultat1['rep']."/".$resultat['file_photo']);
	@unlink("../assets/albums/".$resultat1['id_album']."_".$resultat1['rep']."/thumbs/".$resultat['min_photo']);
	$sql = "DELETE FROM photo WHERE id_photo=".$id;
	$req2 = $bdd->prepare($sql);
	$req2->execute();
	header('Location:dashboard.php?page=26&id_album='.$resultat['id_album'].'');
?>