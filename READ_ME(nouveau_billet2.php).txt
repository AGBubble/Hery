fichier nouveau_billet2.php

les differentes infos pour un $_FILE d�nit par php:("monfichier" est le name envoy� par le formulaire)
$_FILES['monfichier']['name']
	

Contient le nom du fichier envoy� par le visiteur.

$_FILES['monfichier']['type']
	

Indique le type du fichier envoy�. Si c'est une image gif par exemple, le type seraimage/gif.

$_FILES['monfichier']['size']
	

Indique la taille du fichier envoy�. Attention : cette taille est en octets. Il faut environ 1 000 octets pour faire 1 Ko, et 1 000 000 d'octets pour faire 1 Mo.
Attention : la taille de l'envoi est limit�e par PHP. Par d�faut, impossible d'uploader des fichiers de plus de 8 Mo.

$_FILES['monfichier']['tmp_name']
	

Juste apr�s l'envoi, le fichier est plac� dans un r�pertoire temporaire sur le
serveur en attendant que votre script
PHP d�cide si oui ou non il accepte de
le stocker pour de bon. Cette variable
contient l'emplacement temporaire du
fichier (c'est PHP qui g�re �a).

$_FILES['monfichier']['error']
	

Contient un code d'erreur permettant de savoir si l'envoi s'est bien effectu� ou s'il
y a eu un probl�me et si oui, lequel. La
variable vaut 0 s'il n'y a pas eu d'erreur.

Diff�rent types d'erreurs:
UPLOAD_ERR_NO_FILE : fichier manquant.
UPLOAD_ERR_INI_SIZE : fichier d�passant la taille maximale autoris�e par PHP.
UPLOAD_ERR_FORM_SIZE : fichier d�passant la taille maximale autoris�e par le formulaire.
UPLOAD_ERR_PARTIAL : fichier transf�r� partiellement.

On peut faire des v�rifications via des instructions conditionnelles; pour le fichier ci-joint(nouveau_billet2.php)

move_uploaded_file() est une fonction qui d�place le fichier vers un emplacement donn�!