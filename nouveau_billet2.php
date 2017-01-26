<?php

$titre = htmlspecialchars($_POST['titre']);
$corps = htmlspecialchars($_POST['corps']);
$_FILES['image'];//doit etre déclaré à partir du formulaire ?

if(!empty($titre) and !empty($corps)and isset($_FILES['image'])and ($_FILES['image']['error']==0)) /*Si les champs du formulaire ne sont pas vides */
{
	if ($_FILES['image']['size']<=1048576) {
		$infosfichier= pathinfo($_FILES['image']['name']);
		$extension_upload = $infosfichier['extension'];
		$extensions_autorisees = array('png','gif','jpg');

		if (in_array($extension_upload,$extensions_autorisees)){

			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.basename($_FILES['image']['name']));
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=monsite;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}
			/* Insertion des données dans la table billets */
			$req = $bdd->prepare('INSERT INTO billets(titre, contenu) VALUES(?,?)');

			$req->execute(array(

				$titre,

			    $corps,
					    ));
				//header('Location: index.php');
	 }}
 }
elseif (!empty($titre) and !empty($corps)) {
try {
	$bdd = new PDO('mysql:host=localhost;dbname=monsite;charset=utf8','root','');
} catch (Exception $e) {
	die('Erreur : '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO billets(titre, contenu) VALUES(?,?)');

$req->execute(array(

	$titre,

		$corps,
				));
//header('Location: index.php');


}
else
{
	echo "Un des deux champs est vide";
}
?>
