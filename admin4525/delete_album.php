<?php 
	function rmAllDir($strDirectory){
		$handle = opendir($strDirectory);
		while(false !== ($entry = readdir($handle))){
			if($entry != '.' && $entry != '..'){
				if(is_dir($strDirectory.'/'.$entry)){
					rmAllDir($strDirectory.'/'.$entry);
				}
				elseif(is_file($strDirectory.'/'.$entry)){
					unlink($strDirectory.'/'.$entry);
				}
			}
		}
		rmdir($strDirectory.'/'.$entry);
		closedir($handle);
	}
	include("include/connexion.php");
	$id = intval($_GET['id_album']);
	$req = "SELECT * FROM album WHERE id_album=".$id;
	$query = $bdd->prepare($req);
	$query->execute();
	$resultat = $query->fetch();
	$rep = $resultat['rep'];
	$dossier = "../assets/albums/".$id.'_'.$rep;
	chmod($dossier, 0755);
	rmAllDir($dossier);
	$sql = "DELETE FROM album WHERE id_album=".$id;
	$req1 = $bdd->prepare($sql);
	$req1->execute();
	$req2 = "SELECT * FROM photo WHERE id_album=".$id;
	$query2 = $bdd->prepare($req2);
	$query2->execute();
	while($resultat2 = $query2->fetch()){
		$sql3 = "DELETE FROM photo WHERE id_photo=".$resultat2['id_photo'];
		$req3 = $bdd->prepare($sql3);
		$req3->execute();
	}
	header('Location:liste_album.php?sup=1');
?>