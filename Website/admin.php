<?php
session_start();

// Vérifiez si l'utilisateur est authentifié, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION['authentifie']) || $_SESSION['authentifie'] !== true) {
    header('Location: connexion.php');
    exit;
}

// Vérifiez si le bouton de déconnexion a été cliqué
if (isset($_POST['deconnexion'])) {
    // Détruisez la session et redirigez vers la page de connexion
    session_destroy();
    header('Location: connexion.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration</title>
    <!-- Ajoutez ici vos mots-clés pour le référencement (balise meta) -->
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
    <!-- En-tête avec le logo -->
    <header>
        <div>
            <img src="../image/LOGO.png" alt="Logo du Gîte">
        </div>
        <div class="header-content">
            <h1>Figuiès</h1>
        </div>
        <form method="post">
            <button type="submit" name="deconnexion" id=btn-deco>Déconnexion</button>
        </form>
    </header>

    <!-- Barre de navigation de la page d'administration -->
    <nav>
        <ul>
            <li><a href="#modifier_photos">Modifier les photos</a></li>
            <li><a href="#modifier_description">Modifier la description</a></li>
            <li><a href="#modifier_localisation">Modifier la localisation</a></li>
            <li><a href="#modifier_contact">Modifier contact</a></li>
            <!-- Ajoutez d'autres liens pour d'autres sections à modifier -->
        </ul>
    </nav>


     <!-- Section pour modifier les photos -->
     <section id="modifier_photos">
        <h2>Modifier les photos</h2>
        <form action="traitement_photos.php" method="post" enctype="multipart/form-data">
            <input type="file" name="nouvelle_photo" accept="image/*">
            <button type="submit">Télécharger</button>
        </form>
    </section>

    <!-- Section pour modifier la description -->
    <section id="modifier_description">
        <h2>Modifier la description</h2>
        <form action="traitement_description.php" method="post">
            <textarea name="nouvelle_description" rows="4" cols="50"></textarea>
            <button type="submit">Enregistrer</button>
        </form>
    </section>

    <!-- Section pour modifier la localisation -->
    <section id="modifier_localisation">
        <h2>Modifier la localisation</h2>
        <form action="traitement_localisation.php" method="post">
            <input type="text" name="nouvelle_adresse" placeholder="Nouvelle adresse">
            <button type="submit">Enregistrer</button>
        </form>
    </section>

    <!-- Section pour modifier le contact -->
    <section id="modifier_contact">
        <h2>Modifier contact</h2>
        <form action="traitement_contact.php" method="post">
            <textarea name="nouvelle_description" rows="4" cols="50"></textarea>
            <button type="submit">Enregistrer</button>
        </form>
    </section>

    <!-- Pied de page (peut être le même que sur les autres pages) -->
    <footer>
        <!-- Adresse du gîte -->
    </footer>
</body>
</html>