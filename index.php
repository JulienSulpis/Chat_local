<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Minichat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>

    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo"
        <?php if(isset($_COOKIE['pseudo'])) {echo 'value="' . $_COOKIE['pseudo'] . '"';} ?> /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
    </p>
    </form>
    <!-- on affiche la conversation dans la div -->
    <div id="messages"></div>
    
    <script src="minichat.js"></script>
     <!-- on exécute getMessages() toutes les 1000ms -->
    <script>setInterval(getMessages, 500);</script>

    </body>
</html>
