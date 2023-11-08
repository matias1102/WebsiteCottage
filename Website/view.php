<?php
    include 'config.php'; 
    $sqlDescription = "SELECT description, price, bedrooms, max_capacity, language, rates, payment_methods FROM site_info";
    $stmtDescription = $pdo->query($sqlDescription);
    $info = $stmtDescription->fetch(PDO::FETCH_ASSOC);

    $sqlContact = "SELECT address, phone, email, facebook FROM site_info";
    $stmtContact = $pdo->query($sqlContact);
    $contactInfo = $stmtContact->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="icon" href="../image/favicon.ico" type="image/x-icon">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="../Js/navbar.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src="../Js/calendar.js"></script>
    <script src="../Js/caroussel.js"></script>
    <script src="../Js/map.js"></script>
</head>
<body>
    
    <header>
        <div>
            <img src="../image/LOGO.webp" alt="Logo du Gîte" loading="lazy"></div>
        <div class="header-content">
            <h1>Figuiès</h1>
        </div>
    </header>

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


    <section id="accueil">
    </section>

    
    <section id="galerie">
        <div class="carousel-container">
            
            <?php
            include 'config.php';
            $sqlImages = "SELECT * FROM photos";
            $stmtImages = $pdo->query($sqlImages);
            $images = $stmtImages->fetchAll(PDO::FETCH_ASSOC);

        foreach ($images as $index => $image) {
            echo '<div class="carousel-slide' . ($index === 0 ? ' active' : '') . '">';
            echo '<img src="../image/' . $image['file_name'] . '" alt="Image ' . ($index + 1) . '" loading="lazy">';
            echo '</div>';
        }
        ?>
        <button id="prevBtn">&#10096;</button>
        <button id="nextBtn">&#10097;</button>
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
        <div class="property-amenities">
            <strong>ÉQUIPEMENTS ET SERVICES</strong><br>
            <i class="fas fa-dog"></i> Animaux acceptés<br>
            <i class="fas fa-car"></i> Parking<br>
            <i class="fas fa-sun"></i> Terrasse<br>
            <i class="fas fa-tv"></i> Télévision<br>
        </div>
        <div class="property-languages">
            <strong>LANGUES</strong><br>
            <i class="fas fa-language"></i> <?php echo $info['language']; ?>
        </div>
        <div class="property-rates">
            <strong>TARIFS</strong><br>
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
                <p><strong>Adresse :</strong> <?php echo $contactInfo['address']; ?></p>
                <p><strong>Téléphone :</strong> <?php echo $contactInfo['phone']; ?></p>
                <p><strong>Email :</strong> <?php echo $contactInfo['email']; ?></p>
                <p><strong>Facebook :</strong> <a href="<?php echo $contactInfo['facebook']; ?>" target="_blank">Gîte Figuiès</a></p>
            </div>
        </div>
    </section>
    
    <footer>
        Gites Figuies © 2023
    </footer>
   

</body>
</html>

