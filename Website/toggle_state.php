<?php
// Inclure le fichier de configuration de la base de données
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $state = $_POST['state'];

    // Vérifiez si la date a déjà l'état dans la base de données
    $sql = "SELECT * FROM calendar WHERE date = :date AND state = :state";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':state', $state, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Si l'état existe, supprimez-le de la base de données
        $deleteSql = "DELETE FROM calendar WHERE date = :date AND state = :state";
        $deleteStmt = $pdo->prepare($deleteSql);
        $deleteStmt->bindParam(':date', $date, PDO::PARAM_STR);
        $deleteStmt->bindParam(':state', $state, PDO::PARAM_STR);
        $deleteStmt->execute();
    } else {
        // Si l'état n'existe pas, ajoutez-le dans la base de données
        $insertSql = "INSERT INTO calendar (date, state) VALUES (:date, :state)";
        $insertStmt = $pdo->prepare($insertSql);
        $insertStmt->bindParam(':date', $date, PDO::PARAM_STR);
        $insertStmt->bindParam(':state', $state, PDO::PARAM_STR);
        $insertStmt->execute();
    }

    // Vous pouvez renvoyer une réponse JSON indiquant le succès ou l'échec de l'opération
    echo json_encode(['success' => true]);
}
?>
