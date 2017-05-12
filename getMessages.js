// la fonction appelle le fichier minichat_get.php
function getMessages() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         // on insère dans la div ce que minichat_get.php affiche via echo
         document.getElementById("messages").innerHTML = xhttp.responseText;
      }
  };
  xhttp.open("GET", "chat_get.php", true);
  xhttp.send();
}
