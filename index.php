<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Le chat de l'ambiance</title>
  <link rel="icon" type="image/png" href="img/me.png">
  <link href="bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet">
  <link href="stylesheet.css" rel="stylesheet">

</head>


<body>
  <header>
    <h1>Le chat de l'ambiance</h1>
  </header>
  <div class="container">


    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <form id="formulaire" action="chat_post.php" method="post" class="form-horizontal col-xs-12">

            <div class="form-group col-xs-12">
              <div class="row">
                <?php echo'<div class="col-xs-4';
                if(isset($_GET['pseudo'])){echo ' has-error has-feedback">';}
                else{echo '">';}?>
                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo"
                <?php if(isset($_COOKIE['pseudo'])) {echo 'value="' . $_COOKIE['pseudo'] . '"';}
                else{ echo 'autofocus="autofocus"';}
                echo '/>';
                if(isset($_GET['pseudo'])){
                  echo '<span class="glyphicon glyphicon-remove form-control-feedback"></span>
                  <span class="help-block" style="margin-bottom:-8px">Pseudo incorrect</span>';}?>
                </div>
                <div class="col-xs-8">
                  <label for="memo" class="checkbox">
                    <input type="checkbox" name="memo"><span style="font-weight:normal"> Se souvenir de moi</span>
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group col-xs-12">
              <?php if(isset($_GET['message'])){echo '<div class="has-error has-feedback">';}?>
                <input type="text" class="form-control" name="message" placeholder="Message" autofocus="autofocus" id="message"/>
                <?php if(isset($_GET['message'])){echo '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block" style="margin-bottom:-8px">Message incorrect</span></div>';}?>
                </div>
                <button class="btn btn-primary col-lg-1" type="submit" style="display:none">Envoyer</button>
              </form>

              <!-- on affiche la conversation dans la div -->
              <div id="messages"></div>
            </div>

          </div>

          <div class="col-md-offset-1 col-md-3 participants">
            <!-- on insère les pseudos -->
            <table class="table">
              <caption>
                <h2>Participants</h2>
              </caption>
              <tbody>
                <?php include "getPseudos.php" ?>
              </tbody>
            </table>
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
