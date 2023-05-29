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
    <form action="injectionSql_facile.php" method="GET">
    <label for="search">Recherche :</label>
    <input type="text" id="search" name="search" required><br><br>

    <input type="submit" value="Rechercher">
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

// Récupérer la valeur de recherche depuis la requête GET
$search = $_GET['search'];

// Exécuter une requête SQL vulnérable à l'injection SQL
$query = "SELECT * FROM usersinjection WHERE user = '$search'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Afficher les résultats de la requête
    while ($row = $result->fetch_assoc()) {
        echo "<div class='errors'>Utilisateur trouvé : " . $row['user'] . "<br></div>";
    }
} else {
    echo "Aucun utilisateur trouvé.";
}
$conn->close();
?>