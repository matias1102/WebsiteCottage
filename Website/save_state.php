<?php
include '../Website/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $state = $_POST['state'];

    // Vérifiez la valeur du bouton soumis (Disponible ou Indisponible)
    $action = $_POST['action'];

    // Maintenant, en fonction de la valeur de $action, mettez à jour la base de données.
    if ($action === 'disponible') {
        // Mettez à jour la table calendar pour marquer la date comme disponible
        $sql = "UPDATE calendar SET state = 'disponible' WHERE date = :date";
    } elseif ($action === 'indisponible') {
        // Mettez à jour la table calendar pour marquer la date comme indisponible
        $sql = "UPDATE calendar SET state = 'indisponible' WHERE date = :date";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo 'État mis à jour avec succès';
    } else {
        echo 'Erreur lors de la mise à jour de l\'état';
    }
}
?>
