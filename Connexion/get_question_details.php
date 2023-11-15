<?php
include('php.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $questionId = $_GET["id"];

    // Récupérer les détails de la question depuis la base de données
    $sql = "SELECT * FROM Questions WHERE id_question=$questionId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $questionDetails = $result->fetch_assoc();

        // Récupérer les options de réponse
        $sqlOptions = "SELECT option_texte, est_correct FROM Reponses WHERE id_question=$questionId";
        $resultOptions = $conn->query($sqlOptions);

        if ($resultOptions->num_rows > 0) {
            $options = array();

            while ($row = $resultOptions->fetch_assoc()) {
                $options[] = $row;
            }

            $questionDetails["options"] = $options;
        }

        // Convertir en JSON et envoyer la réponse
        header('Content-Type: application/json');
        echo json_encode($questionDetails);
    } else {
        // Question non trouvée
        echo "Erreur: Question non trouvée";
    }
}
?>

