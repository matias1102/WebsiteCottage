<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $state = $_POST['state'];

    // Vérifier si la date existe dans la table
    $existingDate = $pdo->prepare("SELECT date FROM calendar WHERE date = :date");
    $existingDate->bindParam(':date', $date, PDO::PARAM_STR);
    $existingDate->execute();

    if ($existingDate->fetchColumn()) {
        // Si la date existe, effectuez une mise à jour de l'état
        $sql = "UPDATE calendar SET state = :state WHERE date = :date";
    } else {
        // Sinon, insérez une nouvelle entrée
        $sql = "INSERT INTO calendar (date, state) VALUES (:date, :state)";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':state', $state, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo 'État enregistré avec succès';
    } else {
        echo 'Erreur lors de l\'enregistrement de l\'état';
    }
} else {
    echo 'Méthode non autorisée';
}
?>

