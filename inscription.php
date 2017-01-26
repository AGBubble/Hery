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
<body>
	<div class="signup"><center>
		
		<p>Inscrivez vous pour pouvoir commenter</p>
		<form action="new_member.php" method="post" id="newmember">
			<p>Votre pseudo/nom <input type="text" name="pseudo"></p>
			<p>Votre adresse mail <input type="email" name="mail"></p>
			<p>Votre mot de passe <input type="password" name="password"></p>
			<p>Confirmation <input type="password" name="password_confirmation"></p>
			<p><input type="submit" value="Envoyer"></p>
		</form>
		
	</div></center>
</body>