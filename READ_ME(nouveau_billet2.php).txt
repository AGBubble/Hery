fichier nouveau_billet2.php

les differentes infos pour un $_FILE dénit par php:("monfichier" est le name envoyé par le formulaire)
$_FILES['monfichier']['name']
	

Contient le nom du fichier envoyé par le visiteur.

$_FILES['monfichier']['type']
	

Indique le type du fichier envoyé. Si c'est une image gif par exemple, le type seraimage/gif.

$_FILES['monfichier']['size']
	

Indique la taille du fichier envoyé. Attention : cette taille est en octets. Il faut environ 1 000 octets pour faire 1 Ko, et 1 000 000 d'octets pour faire 1 Mo.
Attention : la taille de l'envoi est limitée par PHP. Par défaut, impossible d'uploader des fichiers de plus de 8 Mo.

$_FILES['monfichier']['tmp_name']
	

Juste après l'envoi, le fichier est placé dans un répertoire temporaire sur le
serveur en attendant que votre script
PHP décide si oui ou non il accepte de
le stocker pour de bon. Cette variable
contient l'emplacement temporaire du
fichier (c'est PHP qui gère ça).

$_FILES['monfichier']['error']
	

Contient un code d'erreur permettant de savoir si l'envoi s'est bien effectué ou s'il
y a eu un problème et si oui, lequel. La
variable vaut 0 s'il n'y a pas eu d'erreur.

Différent types d'erreurs:
UPLOAD_ERR_NO_FILE : fichier manquant.
UPLOAD_ERR_INI_SIZE : fichier dépassant la taille maximale autorisée par PHP.
UPLOAD_ERR_FORM_SIZE : fichier dépassant la taille maximale autorisée par le formulaire.
UPLOAD_ERR_PARTIAL : fichier transféré partiellement.

On peut faire des vérifications via des instructions conditionnelles; pour le fichier ci-joint(nouveau_billet2.php)

move_uploaded_file() est une fonction qui déplace le fichier vers un emplacement donné!