<?php
session_start();

// Vérifiez si l'utilisateur est déjà connecté, redirigez-le vers admin.php
if (isset($_SESSION['authentifie']) && $_SESSION['authentifie'] === true) {
    header('Location: admin.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

    $users = [
        ['username' => 'admin', 'password' => 'motdepasse123'],
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
        $_SESSION['authentifie'] = true;
        header('Location: admin.php');
        exit;
    } else {
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../Js/connexion.js"></script>
</head>
<body>
    <header>
        <div>
            <img src="../image/LOGO.webp" alt="Logo du Gîte"></div>
        <div class="header-content">
            <h1>Figuiès</h1>
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

    <footer>
        Gites Figuies © 2023
    </footer>
</body>
</html>
