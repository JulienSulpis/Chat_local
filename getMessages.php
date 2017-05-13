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


$dates = $bdd->query('SELECT DISTINCT DATE(date_message) AS date_message FROM mini_chat ORDER BY date_message DESC');
while ($donnees = $dates->fetch())
{
    echo '<div class="col-lg-12 day"><strong>' . $donnees['date_message'] . '</strong></div>';
    // Récupération des 20 derniers messages
    $reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'%H:%i\') AS date_mes  FROM mini_chat WHERE DATE(date_message) = "' . $donnees['date_message'] . '" ORDER BY ID DESC LIMIT 0, 20');

    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees2 = $reponse->fetch())
    {
        echo '<div class="row"><div class="col-lg-3"><strong>' . $donnees2['pseudo'] .'</strong>    <small><span style="color:#bebebe">' . htmlspecialchars($donnees2['date_mes']) . '</span></small></div></div>
        <div class="row message-ligne"><div class="col-lg-9">'.  htmlspecialchars($donnees2['message']) . '</div></div>';
    }
}




$reponse->closeCursor();
$dates->closeCursor();

?>
