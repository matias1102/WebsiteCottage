<?php
include 'config.php';

$sql = "SELECT date, state FROM calendar";
$stmt = $pdo->query($sql);
$events = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $events[] = [
        'title' => $row['state'], 
        'start' => $row['date']
    ];
}

echo json_encode($events);
?>

