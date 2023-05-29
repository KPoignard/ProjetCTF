<?php
  $page_title = 'Decode md5';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     
    <div class="">
    <form name="login" method="POST" action="">
	    9775595f5c9df9111416665104562308 : <input type="text" name="password" /></br></br>
	    <input onclick="Login()" type="button" value="valider" name="button" />
  </div>
	</form>
    </div>
  </div>
<script>
function Login(){
    
        var password=document.login.password.value;
        password=password.toLowerCase();
        if (password=="bienjoue") {
            alert("BRAVO PASSE A LA SUIVANTE !");
        } else {
            alert("Mauvais hash!");
        }
}
</script>
  <?php include_once('layouts/menu.php'); ?>
