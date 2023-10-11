<?php
session_start();

// Vérifiez si l'utilisateur est déjà connecté, redirigez-le vers admin.php
if (isset($_SESSION['authentifie']) && $_SESSION['authentifie'] === true) {
    header('Location: admin.php');
    exit;
}

// Votre logique de traitement de la connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

    // Comparez les identifiants avec vos données de connexion
    $users = [
        ['username' => 'admin', 'password' => 'motdepasse123'],
        // Ajoutez d'autres identifiants ici si nécessaire
    ];

    // Vérifiez si les identifiants sont valides
    $identifiants_valides = false;
    foreach ($users as $user) {
        if ($user['username'] === $usernameInput && $user['password'] === $passwordInput) {
            $identifiants_valides = true;
            break;
        }
    }

    if ($identifiants_valides) {
        // Authentification réussie
        // Vous pouvez stocker des informations d'authentification dans une session
        $_SESSION['authentifie'] = true;
        header('Location: admin.php');
        exit;
    } else {
        // Identifiants incorrects, affichez un message d'erreur
        $messageErreur = 'Identifiants incorrects. Veuillez réessayer.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Ajoutez ici vos mots-clés pour le référencement (balise meta) -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../Js/connexion.js"></script>
</head>
<body>
    <!-- Header (peut être le même que sur les autres pages) -->
    <header>
        <div>
            <img src="../image/LOGO.png" alt="Logo du Gîte"></div>
        <div class="header-content">
            <h1>Figuiès</h1>
        </div>
        <div>
            <a href="../Website/view.php" id="btn-connexion">retour</a>
        </div>
    </header>

    <!-- Page de connexion -->
    <section id="connexion">
        <div class="login-container">
            <h2>Connexion</h2>
            <form action="connexion.php" method="post">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Se connecter</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Pied de page (peut être le même que sur les autres pages) -->
    <footer>
        <!-- Adresse du gîte -->
    </footer>
</body>
</html>
