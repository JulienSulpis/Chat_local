// la fonction appelle le fichier minichat_get.php
function getPseudos() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         // on insère dans la div ce que getPseudos.php affiche via echo
         document.getElementById("pseudos").innerHTML = xhttp.responseText;
      }
  };
  xhttp.open("GET", "getPseudos.php", true);
  xhttp.send();
}
