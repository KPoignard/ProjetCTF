<?php
  require_once('includes/load.php');
  //Verification du niveau d'autorisation
   page_require_level(1);
?>
<?php
  $sup_id = sup_by_id('users',(int)$_GET['id']);
  if($sup_id){
      $session->msg("s","Utilisateur supprimé avec succès.");
      redirect('users.php');
  } else {
      $session->msg("d","Échec de la suppression.");
      redirect('users.php');
  }
?>
