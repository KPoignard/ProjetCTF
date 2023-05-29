
<?php
  $page_title = 'javascript';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
<script type="text/javascript">
             
              pass = '%6C%65%6D%65%69%6C%6C%65%75%72%6D%61%73%74%65%72';
              h = window.prompt('Entrez le mot de passe');
              if(h == unescape(pass)) {
                  alert('Reussi');
              } else {
                  alert('Recommence');
              }
          </script>
  <?php include_once('layouts/menu.php'); ?>