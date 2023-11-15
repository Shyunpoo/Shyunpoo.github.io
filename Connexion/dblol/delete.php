<?php
include('php.php');

// Récupération de l'ID de la question à supprimer
$deleteQuestionId = $_POST['deleteQuestionId'];

// Requête de suppression de la question dans la table "Questions"
$sql_delete_question = "DELETE FROM Questions WHERE id_question='$deleteQuestionId'";

// Exécute la requête de suppression de la question
if ($conn->query($sql_delete_question) === TRUE) {
    // Suppression des réponses associées à la question dans la table "Reponses"
    $sql_delete_responses = "DELETE FROM Reponses WHERE id_question='$deleteQuestionId'";
    $conn->query($sql_delete_responses);

    $response['message'] = "Question supprimée avec succès!";
} else {
    $response['error'] = "Erreur lors de la suppression de la question: " . $conn->error;
}

// Fermeture de la connexion
$conn->close();

// Envoie de la réponse au format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
