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

// Récupération des pseudos
$reponse = $bdd->query('SELECT DISTINCT pseudo FROM mini_chat ORDER BY pseudo');

// Affichage de chaque pseudo (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    echo '<tr><td>' . htmlspecialchars($donnees['pseudo']) . '</td></tr>';
}

$reponse->closeCursor();

?>
