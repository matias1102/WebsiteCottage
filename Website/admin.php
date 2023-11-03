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

// Récupérez les informations du site depuis la base de données
$sqlInfo = "SELECT description, price, bedrooms, max_capacity, language, rates, payment_methods, address, phone, email, facebook FROM site_info";
$stmtInfo = $pdo->query($sqlInfo);
$info = $stmtInfo->fetch(PDO::FETCH_ASSOC);

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

if (isset($_POST['update_info'])) {
    $newDescription = $_POST['new_description'];
    $newPrice = $_POST['new_price'];
    $newBedrooms = $_POST['new_bedrooms'];
    $newMaxCapacity = $_POST['new_max_capacity'];
    $newLanguage = $_POST['new_language'];
    $newRates = $_POST['new_rates'];
    $newPaymentMethods = $_POST['new_payment_methods'];

    $sql = "UPDATE site_info SET description = :description, price = :price, bedrooms = :bedrooms, max_capacity = :max_capacity, language = :language, rates = :rates, payment_methods = :payment_methods";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':description', $newDescription, PDO::PARAM_STR);
    $stmt->bindParam(':price', $newPrice, PDO::PARAM_STR);
    $stmt->bindParam(':bedrooms', $newBedrooms, PDO::PARAM_INT);
    $stmt->bindParam(':max_capacity', $newMaxCapacity, PDO::PARAM_INT);
    $stmt->bindParam(':language', $newLanguage, PDO::PARAM_STR);
    $stmt->bindParam(':rates', $newRates, PDO::PARAM_STR);
    $stmt->bindParam(':payment_methods', $newPaymentMethods, PDO::PARAM_STR);
    $stmt->execute();

    header('Location: admin.php');
    exit();
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <script src="../Js/calendar.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src="../Js/admin_calendar.js"></script>
    <link href="../Website/node_modules/fullcalendar/main.css" rel="stylesheet">
    <script src="../Website/node_modules/fullcalendar/main.js"></script>
</head>

<body>
    <header>
        <div>
            <img src="../image/LOGO.webp" alt="Logo du Gîte">
        </div>
        <div class="header-content">
            <h1>Figuiès</h1>
        </div>
        <form method="post">
            <button type="submit" name="deconnexion">Déconnexion</button>
        </form>
    </header>

    <h1>Liste des Photos</h1>
    <ul>
    <?php
    // Get images from the database
    $query = $pdo->query("SELECT * FROM photos ORDER BY id DESC");

    if ($query->rowCount() > 0) {
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $imageURL = '../image/' . $row["file_name"];
            $imageID = $row["id"]; // Récupérer l'ID de l'image

            echo '<li class="image-container">';
            echo '<img class="preview" src="' . $imageURL . '" alt="" />';
            echo '<div class="button-container">';
            echo '<a class="delete-button" href="delete_photo.php?id=' . $imageID . '">Supprimer</a>';
            echo '</div>';
            echo '</li>';
        }
    } else {
        echo '<p>No image(s) found...</p>';
    }
    ?>
    </ul>




    <h1>ajouter des Photos</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <!-- Select Image File to Upload: -->
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>


    <h1>Modifier les Informations</h1>
<form method="post">
    <!-- Modifier la description -->
    <div>
        <label>Description :</label>
        <textarea name="new_description"><?php echo $info['description']; ?></textarea>
    </div>
    <div>
        <label>Prix :</label>
        <input type="text" name="new_price" value="<?php echo $info['price']; ?>">
    </div>
    <div>
        <label>Nombre de chambres :</label>
        <input type="number" name="new_bedrooms" value="<?php echo $info['bedrooms']; ?>">
    </div>
    <div>
        <label>Personne (maximum) :</label>
        <input type="number" name="new_max_capacity" value="<?php echo $info['max_capacity']; ?>">
    </div>
    <div>
        <label>Langues :</label>
        <input type="text" name="new_language" value="<?php echo $info['language']; ?>">
    </div>
    <div>
        <label>Tarifs :</label>
        <textarea name="new_rates"><?php echo $info['rates']; ?></textarea>
    </div>
    <div>
        <label>Moyens de paiement :</label>
        <textarea name="new_payment_methods"><?php echo $info['payment_methods']; ?></textarea>
    </div>
    <input type="submit" name="update_info" value="Mettre à jour les informations">
    </form>


    <h1>Gérer la disponibilité</h1>
    <section id=calendrier>
        <div id="admin-calendar"></div>
        <div id="buttons">
            <button id="availableButton">Disponible</button>
            <button id="unavailableButton">Indisponible</button>
        </div>
    </section>

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

<footer>
        <!-- Adresse du gîte -->
        Gites Figuies © 2023
</footer>

</html>