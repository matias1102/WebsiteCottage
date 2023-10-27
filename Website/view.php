<?php
    include 'config.php'; // Inclure votre fichier de configuration de la base de données
    // Récupérez la description
    $sqlDescription = "SELECT description, price, bedrooms, max_capacity, language, rates, payment_methods FROM site_info";
    $stmtDescription = $pdo->query($sqlDescription);
    $info = $stmtDescription->fetch(PDO::FETCH_ASSOC);

    // Récupérez les informations de contact
    $sqlContact = "SELECT address, phone, email, facebook FROM site_info";
    $stmtContact = $pdo->query($sqlContact);
    $contactInfo = $stmtContact->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Web du Gîte</title>
    <!-- Ajoutez ici vos mots-clés pour le référencement (balise meta) -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Inclure la bibliothèque Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="../Js/navbar.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src="../Js/calendar.js"></script>
</head>
<body>
    <!-- En-tête avec le logo, le nom du gîte et le bouton de connexion -->
    <header>
        <div>
            <img src="../image/LOGO.png" alt="Logo du Gîte"></div>
        <div class="header-content">
            <h1>Figuiès</h1>
        </div>
        <div>
            <a href="../Website/connexion.php" id="btn-connexion">Connexion</a>
        </div>
    </header>


    <!-- Barre de navigation -->
    <nav>
        <ul>
            <li><a href="../Website/view.php">Accueil</a></li>
            <li><a href="#galerie">Galerie</a></li>
            <li><a href="#description">Description</a></li>
            <li><a href="#calendrier">Calendrier</a></li>
            <li><a href="#carte">Localisation</a></li>
            <li><a href="#contact">Contact</a></li>
            
        </ul>
    </nav>

    <!-- Page d'accueil -->
    <section id="accueil">
        <!-- Contenu de la page d'accueil -->
    </section>

    
    <section id="galerie">
    <div class="carousel-container">
        <button id="prevBtn">&#10094;</button>
        <?php
        // Inclure votre fichier de configuration de la base de données
        include 'config.php';

        // Récupérer les images de la base de données
        $sqlImages = "SELECT * FROM photos";
        $stmtImages = $pdo->query($sqlImages);
        $images = $stmtImages->fetchAll(PDO::FETCH_ASSOC);

        foreach ($images as $index => $image) {
            echo '<div class="carousel-slide' . ($index === 0 ? ' active' : '') . '">';
            echo '<img src="../image/' . $image['file_name'] . '" alt="Image ' . ($index + 1) . '">';
            echo '</div>';
        }
        ?>
        <button id="nextBtn">&#10095;</button>
    </div>
    </section>
    
    <section id="description">
    <h2>Description</h2>
    <div class="property-info">
        <div class="property-name">
            Figuiès
        </div>
        <div class="property-description">
            </i> <?php echo $info['description']; ?>
        </div>
        <div class="property-price">
            <i class="fas fa-euro-sign"></i> À partir de <?php echo $info['price']; ?>€ / semaine
        </div>
        <div class="property-capacity">
            <strong>CAPACITÉ</strong><br>
            <i class="fas fa-bed"></i> Chambre : <?php echo $info['bedrooms']; ?><br>
            <i class="fas fa-users"></i> Personne (maximum) : <?php echo $info['max_capacity']; ?>
        </div>
        <div class="property-languages">
            <strong>LANGUES</strong><br>
            <i class="fas fa-language"></i> <?php echo $info['language']; ?>
        </div>
        <div class="property-rates">
            <strong>TARIFS 2023</strong><br>
            <?php echo nl2br($info['rates']); ?>
        </div>
        <div class="property-payment">
            <strong>MOYENS DE PAIEMENT</strong><br>
            <?php echo nl2br($info['payment_methods']); ?>
        </div>
    </div>
</section>
   

    <section id="calendrier">
        <h2>Calendrier</h2>
        <div id="calendar"></div>
    </section>
    
    <section id="carte">
        <h2>Localisation</h2>
        <div id="map"></div>
    </section>    
    
    <section id="contact">
        <h2>Contactez-nous</h2>
        <div class="contact-content">
            <div class="contact-info">
                <!-- Utilisez les informations de contact récupérées depuis la base de données -->
                <p><strong>Adresse :</strong> <?php echo $contactInfo['address']; ?></p>
                <p><strong>Téléphone :</strong> <?php echo $contactInfo['phone']; ?></p>
                <p><strong>Email :</strong> <?php echo $contactInfo['email']; ?></p>
                <p><strong>Facebook :</strong> <a href="<?php echo $contactInfo['facebook']; ?>" target="_blank">Gîte Figuiès</a></p>
            </div>
        </div>
    </section>
    
    <!-- Pied de page -->
    <footer>
        <!-- Adresse du gîte -->
        Gites Figuies © 2023
    </footer>

    <!-- JavaScript pour la gestion AJAX -->
    <script src="../Js/caroussel.js"></script>
    <script src="../Js/map.js"></script>
   

</body>
</html>

