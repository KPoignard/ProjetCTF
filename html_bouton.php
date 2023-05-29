<link rel="stylesheet" type="text/css" href="styles.css">
<?php
  $page_title = 'Brute force intermediaire';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     
    <div class="">
   <form action="html_bouton.php" method="GET" onsubmit="showAlert()">
      <label for="search">Recherche :</label>
      <input type="text" id="search" name="search" placeholder="admin" required><br><br>

      <input type="submit" value="Rechercher" disabled hidden>
    </form>
  </div>

  <script>
    function showAlert() {
      alert("Vous avez cliqué sur le bouton de recherche !");
    }
  </script>
  <?php include_once('layouts/menu.php'); ?>

 