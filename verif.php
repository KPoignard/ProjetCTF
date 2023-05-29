<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if(empty($errors)){
  $user_id = authenticate($username, $password);
  if($user_id){
    //Creation session avec ID
     $session->login($user_id);
    //Mettre à jour le temps de connexion
     updateLastLogIn($user_id);
     $session->msg("s", "Connexion avec succès");
     redirect('home.php',false);

  } else {
    $session->msg("d", "Nom Utilisateur/Mot de passe incorrect.");
    redirect('index.php',false);
  }

} else {
   $session->msg("d", "Information Incorrecte ou Vide");
   redirect('index.php',false);
}

?>
