<?php

$titre = $_POST['titre'];
$corps = $_POST['corps'];

if(!empty($titre) and !empty($corps)) /*Si les champs du formulaire ne sont pas vides */
{
	$bdd = new PDO('mysql:host=localhost;dbname=monsite;charset=utf8', 'root', 'root');
	
	/* Insertion des données dans la table billets */
	$req = $bdd->prepare('INSERT INTO billets(titre, contenu) VALUES(?,?)'); 

	$req->execute(array(
		
		$titre,

	    $corps,

	    ));	
		header('Location: index.php');
}
else
{
	echo "Un des deux champs est vide";
}
?>
			