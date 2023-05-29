<?php
  $page_title = 'Brute force facile';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     
    <div class="">
    <form name="login" method="POST" action="">
	    Username : <input name="pseudo" /><br/>
	    Password : <input type="password" name="password" /></br></br>
	    <input onclick="Login()" type="button" value="login" name="button" />
  </div>
	</form>
    </div>
  </div>
<script>
function Login(){
        var pseudo=document.login.pseudo.value;
        var username=pseudo.toLowerCase();
        var password=document.login.password.value;
        password=password.toLowerCase();
        if (pseudo=="cdsi" && password=="best_master_ever") {
            alert("BRAVO PASSE A LA SUIVANTE !");
        } else {
            alert("Mauvais mot de passe !");
        }
}
</script>
  <?php include_once('layouts/menu.php'); ?>


  <?php

if( isset( $_GET[ 'login' ] ) ) {
	// Get username
	$user = $_GET[ 'pseudo' ];

	// Get password
	$pass = $_GET[ 'password' ];
	$pass = md5( $pass );

	// Check the database
	$query  = "SELECT * FROM `users` WHERE user = '$user' AND password = '$pass';";
	$result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );

	if( $result && mysqli_num_rows( $result ) == 1 ) {
		// Get users details
		$row    = mysqli_fetch_assoc( $result );
		$avatar = $row["avatar"];

		// Login successful
		$html .= "<p>Welcome to the password protected area {$user}</p>";
		$html .= "<img src=\"{$avatar}\" />";
	}
	else {
		// Login failed
		$html .= "<pre><br />Username and/or password incorrect.</pre>";
	}

	((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}

?>