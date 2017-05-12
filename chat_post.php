<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=me;charset=utf8', 'root', 'fjkt69}BEFGKYx{ADIJO');
}
catch(Exception $e)

     {   die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée, si les champs ne sont pas vides
if ($_POST['pseudo'] != "" AND $_POST['message'] != ""){
	$req = $bdd->prepare('INSERT INTO mini_chat (pseudo, message, date_message) VALUES(?, ?, NOW())');
	$req->execute(array($_POST['pseudo'], $_POST['message']));

	setcookie('pseudo', $_POST['pseudo'], time() + 7*24*3600, null, null, false, true);
}


// Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>
