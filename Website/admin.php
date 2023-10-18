<?php
session_start();
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
// Inclure votre fichier de configuration de base de données
include 'config.php';

// Gérer la modification des photos
if (isset($_POST['upload_photo'])) {
    // Gérez ici le téléchargement et l'ajout de nouvelles photos dans la base de données
    // Assurez-vous de valider les fichiers et de les stocker correctement

    // Redirigez après l'ajout des photos
    header('Location: admin.php');
    exit();
}

// Gérer la modification de la description
if (isset($_POST['update_description'])) {
    $newDescription = $_POST['new_description'];

    // Effectuez une requête SQL pour mettre à jour la description dans la base de données
    $sql = "UPDATE site_info SET description = :description";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':description', $newDescription, PDO::PARAM_STR);
    $stmt->execute();

    // Redirigez après la mise à jour de la description
    header('Location: admin.php');
    exit();
}

// Gérer la modification des informations de contact
if (isset($_POST['update_contact'])) {
    $newAddress = $_POST['new_address'];
    $newPhone = $_POST['new_phone'];
    $newEmail = $_POST['new_email'];
    $newFacebook = $_POST['new_facebook'];

    // Effectuez une requête SQL pour mettre à jour les informations de contact dans la base de données
    $sql = "UPDATE site_info SET address = :address, phone = :phone, email = :email, facebook = :facebook";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':address', $newAddress, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $newPhone, PDO::PARAM_STR);
    $stmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $stmt->bindParam(':facebook', $newFacebook, PDO::PARAM_STR);
    $stmt->execute();

    // Redirigez après la mise à jour des informations de contact
    header('Location: admin.php');
    exit();
}

// Récupérez les photos depuis la base de données
$sql = "SELECT * FROM photos";
$stmt = $pdo->query($sql);
$photos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérez la description et les informations de contact depuis la base de données
$sql = "SELECT * FROM site_info";
$stmt = $pdo->query($sql);
$info = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
    <header>
        <div>
            <img src="../image/LOGO.png" alt="Logo du Gîte"></div>
        <div class="header-content">
            <h1>Figuiès</h1>
        </div>
        <form method="post">
            <button type="submit" name="deconnexion">Déconnexion</button>
        </form>
    </header>

    <h1>Liste des Photos</h>
    <ul>
        <?php foreach ($photos as $photo): ?>
            <li>
                <!-- Afficher les photos et les options de suppression -->
                <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>">
                <a href="delete_photo.php?id=<?php echo $photo['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <h1>ajouter des Photos</h1>
    <form method="post" enctype="multipart/form-data">
        <!-- Ajouter de nouvelles photos -->
        <input type="file" name="new_photos[]" multiple>
        <input type="submit" name="upload_photo" value="Ajouter des photos">
    </form>
    

    <h1>Modifier la Description</h1>
    <form method="post">
        <!-- Modifier la description -->
        <textarea name="new_description"><?php echo $info['description']; ?></textarea>
        <input type="submit" name="update_description" value="Mettre à jour la description">
    </form>

    <h1>Modifier les Informations de Contact</h1>
    <form method="post">
        <!-- Modifier les informations de contact -->
        <p>
            Adresse : <input type="text" name="new_address" value="<?php echo $info['address']; ?>" placeholder="[placeholder]">
        </p>
        <p>
            Téléphone : <input type="text" name="new_phone" value="<?php echo $info['phone']; ?>" placeholder="[placeholder]">
        </p>
        <p>
            Email : <input type="text" name="new_email" value="<?php echo $info['email']; ?>" placeholder="[placeholder]">
        </p>
        <p>
            Facebook : <input type="text" name="new_facebook" value="<?php echo $info['facebook']; ?>" placeholder="[placeholder]">
        </p>
        <input type="submit" name="update_contact" value="Mettre à jour les informations de contact">
    </form>
</body>
</html>
