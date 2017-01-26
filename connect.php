<?php
$pseudo=htmlspecialchars($_POST['pseudo']);
$mdp=htmlspecialchars($_POST['mdp']);
$options = ['cost' => 10,];
$errors = array();

if(!empty($pseudo) && !empty($mdp))
	{//On vérifie que les deux champs sont complets
    	try 
		{
			$bdd=new PDO('mysql:host=localhost;dbname=monsite;charset=utf8','root','root');//conexion à la base
    	} 
		catch (Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
    //prepare la commande
		$req=$bdd->prepare('SELECT * FROM membres WHERE pseudo=?'); //je cherche la ligne qui correspond au pseudo

    	$req->execute([$pseudo]); // correspond au pseudo qu'on a mis dans le formulaire
		
		$res = $req->fetch(PDO::FETCH_ASSOC); // on met le tout dans un tableau
		
		if($res) // si on a un resultat 
		{
			$hash = $res['mot_de_passe']; //je cherche le MDP dans la table qui correspond à un hash
		
			if (password_verify($mdp, $hash)) // password verify return TRUE quand le MDP et le Hash correspondent
			{
				header('Location : index.php');
			}
			else
			{
				echo "Erreur d'identification";
			}
		}
  }
  
else
{
	echo "Au moins un des deux champs est vide";
}
if ($errors)
  {
    foreach($errors as $num_errors)
    {
      echo $num_errors . '<br />';
    }
  }

?>