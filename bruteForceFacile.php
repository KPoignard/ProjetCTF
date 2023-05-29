

<?php
// Se connecter à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dvwa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$login = $_POST['login'];
$password = md5($_POST['password']);

// Requête pour vérifier les informations d'identification de l'utilisateur
$query = "SELECT * FROM users WHERE user = '$login' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // Authentification réussie
    $row = $result->fetch_assoc();
    // Mettez en œuvre les actions appropriées ici, par exemple, rediriger vers une page sécurisée.
    echo "Authentification réussie ! Bienvenue, " . $row['first_name'];
} else {
    // Authentification échouée
    echo "Échec de l'authentification. Veuillez vérifier vos informations d'identification.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulaire de connexion</title>
</head>
<body>
  <h2>Connexion</h2>
  <form action="bruteForceFacile.php" method="POST">
    <label for="login">Nom d'utilisateur :</label>
    <input type="text" id="login" name="login" required><br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Se connecter">
  </form>
</body>
</html>
