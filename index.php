 <?php
 // Aina
 // Shazad
 // Fred
 ?>
 <!DOCTYPE html>
<html>

<head>
	<center>
  		<title>Mon petit blog des familles</title>
	</center>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<div class="members">
		<p><a href="inscription.php">Inscription</a></p>
		<p><a href="connexion_page.php">Connexion</a></p>
	</div>

	<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=monsite;charset=utf8', 'root', 'root');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$reponse = $bdd->query('SELECT id , titre , contenu , date_creation FROM 	billets ORDER BY id DESC ');


	// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

	while ($donnees = $reponse->fetch())

	{

	    echo
			'<div class="post"><p><strong>' . htmlspecialchars($donnees['titre']) . 			'</strong> : ' . '</p>'

			. '<p>' . htmlspecialchars($donnees['contenu']) ."</p>"

			. '<p>' .$donnees['date_creation'] . '</p>'

			. '<p>' . '<a href="comment.php?billets=' . $donnees['id']

			. '"' . '>' .'Commentaires' . '</a>' . '</p></div>';

	}


	$reponse->closeCursor();


	?>
	<!-- Nouveau billet -->
	<div class="new_post">
	<br />Ecrivez un nouveau billet : <br />
	<form action="nouveau_billet.php" method="post" id="newblog">
	<p>Titre du billet : <input type="text" name="titre"></p>
	<p><textarea rows="8" cols="50" name="corps" form="newblog"></textarea></p>
	<input type="submit" value="Envoyer">
	</form>
	</div>

</body>

</html>
