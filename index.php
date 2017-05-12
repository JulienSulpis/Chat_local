<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Chat local</title>
  <link href="bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet">
  <style type="text/css">
    .container {background-color: inherit;}
  </style>

</head>


<body>
  <div class="container">
    <header class="page-header">
      <h1>Chat local</h1>
    </header>

    <div class="row">
      <div class="col-lg-7">
        <div class="row">
          <div class="col-lg-12">
            <form action="minichat_post.php" method="post">
              <p>
                <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo"
                <?php if(isset($_COOKIE['pseudo'])) {echo 'value="' . $_COOKIE['pseudo'] . '"';} ?> /><br />
                <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

                <input type="submit" value="Envoyer" />
              </p>
            </form>
          </div>
          <div class="col-lg-12">
            <!-- on affiche la conversation dans la div -->
            <div id="messages"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-offset-2 col-lg-3">
        <!-- on insère les pseudos -->
        <h2>Participants :</h2>
        <ul>
          <div id="pseudos"></div>
        </ul>
      </div>
    </div>

    <script src="getMessages.js"></script>
    <script src="getPseudos.js"></script>
    <!-- on exécute getMessages() toutes les 500ms -->
    <script>setInterval(getMessages, 500);</script>
    <script>setInterval(getPseudos, 500);</script>
  </div>
</body>
</html>
