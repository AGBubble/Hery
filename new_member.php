<?php
$pseudo = htmlspecialchars($_POST['pseudo']);
$mail = htmlspecialchars($_POST['mail']);

$options = ['cost' => 10,];
$password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT, $options)); 

$password_confirmation = htmlspecialchars($_POST['password_confirmation']);
$errors = array();
	
			
						
			if (!empty($pseudo) and !empty($mail) and !empty($password) and !empty($password_confirmation))
			{	
				
				if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
					{
						$errors['mail'] =  "L'adresse email n'est pas valide" . '<br /><a href="inscription.php">Retour</a>';
					}
			
				else if ($_POST['password'] != $password_confirmation)
					{
						$errors['password'] =  "Les mots de passe ne correspondent pas" . '<br /><a href="inscription.php">Retour</a>';
					}
					
				
				else 
					{
						$bdd = new PDO('mysql:host=localhost;dbname=monsite;charset=utf8', 'root', 'root');
	
					/* Insertion des données dans la table commentaires */
					$req = $bdd->prepare('INSERT INTO membres SET pseudo = ?, email = ?, mot_de_passe = ?');

					$req->execute(array(
		
						$pseudo,

						$mail,
		
						$password,

				    ));	
						header('Location: index.php');
					}
			}
			else
			{
				echo "Un des champs est vide";
				echo '<br /><a href="inscription.php">Retour</a>';
				
			}
			if ($errors)
				{
					foreach($errors as $num_errors)
					{
						echo $num_errors . '<br />';
					}
				}	
			?>