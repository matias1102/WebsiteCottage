<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $state = $_POST['state'];

    // Insérer l'état dans la table calendar
    $sql = "INSERT INTO calendar (date, state) VALUES (:date, :state)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':state', $state, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo 'État enregistré avec succès';
    } else {
        echo 'Erreur lors de lenregistrement de létat';
    }
} else {
    echo 'Méthode non autorisée';
}
?>
