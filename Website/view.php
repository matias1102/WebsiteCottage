
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
            <div class="carousel-slide">
                <img src="../image/image1.jpg" alt="Image 1">
            </div>
            <div class="carousel-slide">
                <img src="../image/image2.jpg" alt="Image 2">
            </div>
            <div class="carousel-slide">
                <img src="../image/image3.jpg" alt="Image 3">
            </div>
            <button id="nextBtn">&#10095;</button>
        </div>
    </section>
    
    <section id="description">
        <h2>Description</h2>
        <div class="property-info">
            <div class="property-name">
                Figuiès
            </div>
            <div class="property-price">
                <i class="fas fa-euro-sign"></i> À partir de 550€ / semaine
            </div>
            <div class="property-description">
                Notre maison en pierre, située sur les hauteurs, entre vignes, falaises et le causse vous séduira par sa vue magnifique et son environnement agréable.
            </div>
            <div class="property-capacity">
                <strong>CAPACITÉ</strong><br>
                <i class="fas fa-users"></i> Personne : 4<br>
                <i class="fas fa-bed"></i> Chambre : 2<br>
                <i class="fas fa-users"></i> Personne (maximum) : 4
            </div>
            <div class="property-amenities">
                <strong>ÉQUIPEMENTS ET SERVICES</strong><br>
                <i class="fas fa-paw"></i> Animaux acceptés<br>
                <i class="fas fa-car"></i> Parking<br>
                <i class="fas fa-sun"></i> Terrasse<br>
                <i class="fas fa-tv"></i> Télévision
            </div>
            <div class="property-languages">
                <strong>LANGUES</strong><br>
                <i class="fas fa-language"></i> Francais
            </div>
            <div class="property-rates">
                <strong>TARIFS 2023</strong><br>
                - Semaine Moyenne saison à 550€<br>
                - Nuitée Moyenne saison à 85€<br>
                - Semaine Haute Saison à 650€<br>
                - Nuitée Haute Saison à 110€
            </div>
            <div class="property-payment">
                <strong>MOYENS DE PAIEMENT</strong><br>
                <i class="fas fa-money-check-alt"></i> Chèque<br>
                <i class="fas fa-money-bill-wave"></i> Espèce<br>
                <i class="fas fa-exchange-alt"></i> Virements
            </div>
        </div>
    </section>    


    <section id="carte">
        <h2>Localisation</h2>
        <div id="map"></div>
    </section>    
    
    <section id="contact">
        <h2>Contactez-nous</h2>
        <div class="contact-content">
            <div class="contact-info">
                <p><strong>Adresse :</strong> 140 rue de Figuiès 12330 Salles-la-Source</p>
                <p><strong>Téléphone :</strong> +33(0) 6 41 57 73 20</p>
                <p><strong>Email :</strong> beatrice.boyer29@orange.fr</p>
                <p><strong>Facebook :</strong> <a href="https://www.facebook.com/gitefiguies" target="_blank">Gîte Figuiès</a></p>

            </div>
        </div>
    </section>
    
    <!-- Pied de page -->
    <footer>
        <!-- Adresse du gîte -->
    </footer>

    <!-- JavaScript pour la gestion AJAX -->
    <script src="../Js/caroussel.js"></script>
    <script src="../Js/map.js"></script>
</body>
</html>
