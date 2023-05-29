<?php
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(1);
?>
<?php
  $sup_id = sup_by_id('user_groups',(int)$_GET['id']);
  if($sup_id){
      $session->msg("s","Le groupe à bien été supprimé.");
      redirect('group.php');
  } else {
      $session->msg("d","Échec de la suppression.");
      redirect('group.php');
  }
?>
