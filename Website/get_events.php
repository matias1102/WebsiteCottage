<?php
// Inclure votre fichier de configuration de base de données
include 'config.php';

// Requête pour récupérer les dates et états depuis la table calendar
$sql = "SELECT date, state FROM calendar";
$stmt = $pdo->query($sql);
$events = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $events[] = [
        'title' => $row['state'], // Utilisez l'état comme titre
        'start' => $row['date']
    ];
}

echo json_encode($events);
?>
