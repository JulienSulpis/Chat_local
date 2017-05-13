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


$dates = $bdd->query('SELECT DISTINCT DATE_FORMAT(date_message, \'%a, %b %D\') AS day, DATE(date_message) AS date_message FROM mini_chat ORDER BY date_message DESC');
while ($donnees = $dates->fetch())
{
    if($donnees['date_message'] == date("Y-m-d")){
      echo '<div class="col-lg-12 day"><strong>Aujourd\'hui</strong></div>';
    }
    else{
      echo '<div class="col-lg-12 day"><strong>' . $donnees['day'] . '</strong></div>';
    }

    // Récupération des 20 derniers messages
    $reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'%H:%i\') AS date_mes  FROM mini_chat WHERE DATE(date_message) = "' . $donnees['date_message'] . '" ORDER BY ID DESC LIMIT 0, 50');

    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees2 = $reponse->fetch())
    {
        echo '<div class="row message-ligne"><div class="col-lg-1"><small><span style="color:#bebebe">' . htmlspecialchars($donnees2['date_mes']) . '</span></small></div>
        <div class="col-lg-2" style="text-align:right"><strong>' . $donnees2['pseudo'] .'</strong> : </div><div class="col-lg-9">'.  htmlspecialchars($donnees2['message']) . '</div></div>';
    }
}

$reponse->closeCursor();
$dates->closeCursor();

?>
