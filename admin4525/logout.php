<?php
session_start();
include("include/connexion.php"); 
$email = $_SESSION['email'];
$sql = "UPDATE users SET connect=:connect WHERE email='$email'";
$req1 = $bdd->prepare($sql);
$req1->execute(array(
	'connect' => 0
));
// On d�truit les variables de notre session
session_unset ();
// On d�truit notre session
session_destroy ();  
// On redirige le visiteur vers la page d'accueil
header('Location:index.php');
?>

