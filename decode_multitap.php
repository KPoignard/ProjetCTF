<?php
  $page_title = 'Decode multitap';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     
    <div class="">
    <form name="login" method="POST" action="">

	    8 88 0 2 7777 0 8 777 666 88 888 33 0 555 33 0 222 666 3 33 : <input type="text" name="password" /></br></br>
	    <input onclick="Login()" type="button" value="valider" name="button" />
  </div>
	</form>
    </div>
  </div>
<script>
function Login(){
        var password=document.login.password.value;
        password=password.toLowerCase();
        if (password=="tu as trouvé le code") {
            alert("BRAVO PASSE A LA SUIVANTE !");
        } else {
            alert("Mauvais hash!");
        }
}
</script>
  <?php include_once('layouts/menu.php'); ?>
