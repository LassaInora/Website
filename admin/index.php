<?php
session_start();

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: /login.php");
    exit;
}

// Logique pour ajouter du contenu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traite le contenu ajouté ici
    $newContent = $_POST['content'];
    // Exemple simple : ajoute à un fichier
    file_put_contents('content.txt', $newContent, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'administration</title>
    <link rel="stylesheet" href="/assets/style.css"> <!-- Même style -->
</head>
<body>
    <div class="admin-container">
        <h2>Bienvenue dans l'espace admin</h2>
        <form method="POST" action="/admin.php">
            <label for="content">Ajouter du contenu :</label>
            <textarea name="content" id="content" required></textarea>
            <button type="submit">Ajouter</button>
        </form>
        <a href="/logout.php">Se déconnecter</a>
    </div>
</body>
</html>
