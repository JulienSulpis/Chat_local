<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=me;charset=utf8', 'root', 'fjkt69}BEFGKYx{ADIJO');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'%d/%m/%Y à %Hh%imin%ss\') AS date_message FROM mini_chat ORDER BY ID DESC LIMIT 0, 50');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    echo '<p>[' . $donnees['date_message'] .'] <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : '.  htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
