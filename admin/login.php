<?php
session_start();

// Si l'utilisateur est déjà connecté, redirige vers la page d'administration
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: /admin.php");
    exit;
}

// Gestion du login
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Remplace avec ton propre nom d'utilisateur et mot de passe
    $valid_username = 'admin';
    $valid_password = 'password123'; // Remplace cela par un mot de passe sécurisé

    if ($username === $valid_username && password_verify($password, password_hash($valid_password, PASSWORD_DEFAULT))) {
        // Connexion réussie
        $_SESSION['loggedin'] = true;
        header("Location: /admin.php"); // Redirige vers la page d'administration
        exit;
    } else {
        $error = 'Nom d’utilisateur ou mot de passe incorrect.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="/assets/style.css"> <!-- Utilise le même style pour uniformiser -->
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form method="POST" action="/login.php">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Se connecter</button>
        </form>
        <p style="color: red;"><?php echo $error; ?></p>
    </div>
</body>
</html>
