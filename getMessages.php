<?php
// Connexion à la base de données
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=me;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }


  $dates = $bdd->query('SELECT DISTINCT DATE_FORMAT(date_message, \'%a, %b %D\') AS day, DATE(date_message) AS date_message FROM mini_chat ORDER BY date_message DESC');
  while ($donnees = $dates->fetch())
  {
    if($donnees['date_message'] == date("Y-m-d")){
      //echo '<div class="col-lg-12 day"><strong>Aujourd\'hui</strong></div>';
    }
    else{
      echo '<div class="col-lg-12 day"><strong>' . $donnees['day'] . '</strong></div>';
    }

    // Récupération des 20 derniers messages
    $reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'%H:%i\') AS date_mes  FROM mini_chat WHERE DATE(date_message) = "' . $donnees['date_message'] . '" ORDER BY ID DESC LIMIT 0, 50');
    
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees2 = $reponse->fetch())
    {
      ?>
      <div class="col-xs-12 message-ligne">
        <div class="col-xs-6 col-sm-3 en-tete">
          <div class="row">
            <div class="col-xs-offset-1 col-xs-1" style="text-align:right; padding-left:0px;color:#c8c8c8">
              <small> <?php echo htmlspecialchars($donnees2['date_mes']) ?> </small>
            </div>
            <div class="col-xs-8" style="text-align:right; padding-right:0px; color:#fbbb01">
              <strong> <?php echo $donnees2['pseudo'] ?></strong>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-9"> <?php echo htmlspecialchars($donnees2['message']) ?>
        </div>
      </div>
      <?php
    }
  }

  $reponse->closeCursor();
  $dates->closeCursor();

  ?>
