
<?php
  $page_title = 'javascript_auth';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>

<script>

function connexion() {
  var username = prompt("Username:", "");
  var password = prompt("Password:", "");
  var TheLists = ["EUh:Non"];

  for (var i = 0; i < TheLists.length; i++) {
    var TheSplit = TheLists[i].split(":");
    var TheUsername = TheSplit[0];
    var ThePassword = TheSplit[1];

    if (username === TheUsername && password === ThePassword) {
      alert("Bien joué !");
      return; 
    }
  }

  alert("Erreur !");
}

connexion();

</script>
  <?php include_once('layouts/menu.php'); ?>