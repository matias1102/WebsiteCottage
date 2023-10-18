<?php
// Informations de connexion à la base de données
$servername = "localhost"; // Adresse du serveur MySQL (généralement 'localhost' pour XAMPP)
$username = "root"; // Votre nom d'utilisateur MySQL
$password = ""; // Votre mot de passe MySQL
$database = "cottage"; // Le nom de votre base de données

try {
    // Création d'une connexion PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Configuration de PDO pour générer des exceptions en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
