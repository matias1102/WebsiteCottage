<?php
include 'config.php';

if (isset($_GET['id'])) {
    $imageID = $_GET['id'];

    // Récupérer le nom du fichier de l'image
    $query = $pdo->prepare("SELECT file_name FROM photos WHERE id = :id");
    $query->bindParam(':id', $imageID, PDO::PARAM_INT);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $fileName = $row['file_name'];

        // Supprimer l'image du dossier
        $filePath = '../image/' . $fileName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Supprimer l'image de la base de données
        $deleteQuery = $pdo->prepare("DELETE FROM photos WHERE id = :id");
        $deleteQuery->bindParam(':id', $imageID, PDO::PARAM_INT);
        $deleteQuery->execute();

        // Redirection vers la page admin.php après la suppression
        header('Location: admin.php');
        exit;
    }
}

// Si l'ID de l'image n'est pas spécifié, redirigez vers admin.php
header('Location: admin.php');
exit;
