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
    <form action="Brute_force_int.php" method="POST">
	   <label for="login">Nom d'utilisateur :</label>
    <input type="text" id="login" name="login" required><br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Se connecter">
  </div>
	</form>
    </div>
  </div>

  <?php include_once('layouts/menu.php'); ?>

  <?php
// Se connecter à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "m1projet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$login = $_POST['login'];
$password = md5($_POST['password']);

// Requête pour vérifier les informations d'identification de l'utilisateur
$query = "SELECT * FROM usersinjection WHERE user = '$login' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // Authentification réussie
    $row = $result->fetch_assoc();
    // Mettez en œuvre les actions appropriées ici, par exemple, rediriger vers une page sécurisée.
    echo "<div class='errors'> Authentification réussie ! Bienvenue, " . $row['first_name']."</div>";
} else {
    // Authentification échouée
    echo "<div class='errors'>Échec de l'authentification. Veuillez vérifier vos informations d'identification.</div>";
}

$conn->close();
?>