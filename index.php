<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Chat local</title>
  <link href="bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet">
  <style type="text/css">
  .container {
    background-color: inherit;
  }
  .day {
    text-align: center;
    border-bottom: 1px solid #eee;
    background-color: #f2f2f2;
    border-radius: 6px;
    line-height: 20px;
  }
  .message-ligne{
    margin-bottom: 5px;
    border-bottom: 1px solid #eee
  }
  form {margin-bottom: 30px}
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
          <form action="chat_post.php" method="post" class="form-horizontal col-lg-12">

            <div class="row">
              <div class="form-group">
                <label for="pseudo" class="col-lg-2 control-label">Pseudo :</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="pseudo" id="pseudo"
                  <?php if(isset($_COOKIE['pseudo'])) {echo 'value="' . $_COOKIE['pseudo'] . '"';} ?> />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <label for="message" class="col-lg-2 control-label">Message :</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="message" id="message" />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="checkbox col-lg-offset-2 col-lg-4">
                <label for="yes" class="checkbox">
                  <input type="checkbox" name="memo" value="yes">Se souvenir de moi
                </label>
              </div>
              <button class="btn btn-primary col-lg-offset-4 col-lg-2" type="submit">Envoyer</button>
            </div>

          </form>

            <!-- on affiche la conversation dans la div -->
            <div id="messages"></div>

        </div>
      </div>

      <div class="col-lg-offset-2 col-lg-3">
        <!-- on insère les pseudos -->
        <table class="table">
          <caption>
            <h2>Participants</h2>
          </caption>
          <tbody>
            <?php include "getPseudos.php" ?>
            <!--<div id="pseudos"></div>-->
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
