<?php
// Inclure votre fichier de configuration de base de données
include 'config.php';

// Requête SQL pour récupérer les événements depuis la base de données
$sql = "SELECT date, state FROM calendar";
$stmt = $pdo->query($sql);
$events = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $event = array(
    'title' => $row['state'],
    'start' => $row['date']
  );
  array_push($events, $event);
}

// Renvoyer les événements au format JSON
echo json_encode($events);
?>

