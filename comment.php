<?php
	
?> 
 <!DOCTYPE html>
<html>

<head>
	<center>
  		<title>Mon petit blog des familles</title>
	</center>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php

/* Récupération de l'id du billet correspondant */
$id = $_GET['billets'];
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=monsite;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

/* Récupération post */

$reponse = $bdd->query("SELECT id , titre , contenu , date_creation FROM billets WHERE id = '$id' ");

$donnees = $reponse->fetch();

/* Affichage post */

echo 
	'<div class="post"><p><strong>' . htmlspecialchars($donnees['titre']) . '</strong> : ' . '</p>'
		
	. '<p>' . htmlspecialchars($donnees['contenu']) ."</p>" 
	
	. '<p>' .$donnees['date_creation'] . '</p></div>'; 	
	
	$reponse->closeCursor();
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=monsite;charset=utf8', 'root', 'root');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
/* Récupération du commentaire */
	$reponse = $bdd->query('SELECT id_billet, auteur , commentaire , date_commentaire FROM commentaires ORDER BY date_commentaire DESC ');

		while ($donnees = $reponse->fetch())
		{
	
			if ($id == $donnees['id_billet']) /* Si l'id du billet = l'id de la page  */
			{
				echo /* On affiche le commentaire */
					'<div class="comment"><p><strong>'
					
					. '<p><i>'.'Commentaires'.'</i></p>'
					. htmlspecialchars($donnees['auteur']) . '</strong> : ' . '</p>'
				
					. '<p>' . htmlspecialchars($donnees['commentaire']) . '</p>' 
			
					. '<p>' .$donnees['date_commentaire'] . '</p></div>';
			} 
		}
	
?>

<!-- Formulaire envoi commentaire -->
	<div class="post_comment">
	<br />Ecrivez un nouveau commentaire : <br />
	<form action="nouveau_comment.php?billets=<?php echo $_GET['billets'];?>" method="post" id="newcomment">
	<p>Auteur <input type="text" name="auteur"></p>
	<p><textarea type ="text" name = "commentaire" id = "commentaire" rows ="8" cols="45">Votre commentaire svp...</textarea><br/></p>
	<input type="submit" value="Envoyer">
	</form>
	</div>


</html> 