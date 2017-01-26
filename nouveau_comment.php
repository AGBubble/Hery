<?php	
$auteur = $_POST['auteur'];
$commentaire = $_POST['commentaire'];
$id_billet = $_GET['billets'];

if(!empty($auteur) && !empty($commentaire)) /* Si les champs du formulaire ne sont pas vides */
{
	$bdd = new PDO('mysql:host=localhost;dbname=monsite;charset=utf8', 'root', 'root');
	
	/* Insertion des données dans la table commentaires */
	$req = $bdd->prepare('INSERT INTO commentaires(auteur, commentaire, id_billet) VALUES(?,?,?)');

	$req->execute(array(
		
		$auteur,

	    $commentaire,
		
		$id_billet,

	    ));	
		header('Location: comment.php?billets='. $_GET['billets'] );
}
else
{
	echo "Un des deux champs est vide";
}
?>