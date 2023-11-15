<?php
include('php.php');

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Traitement des actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "add") {
        // Action pour ajouter une question
        $questionText = $_POST["question_text"];
        $questionImage = $_POST["question_image"];
        $option1 = $_POST["option1"];
        $option2 = $_POST["option2"];
        $option3 = $_POST["option3"];
        $option4 = $_POST["option4"];
        $correctOption = $_POST["correct_option"];
        $questionFeedback = $_POST["Feedback"];

        // Échapper les valeurs pour éviter les injections SQL (utilisez des requêtes préparées dans un environnement de production)
        $questionText = $connexion->real_escape_string($questionText);
        $questionImage = $connexion->real_escape_string($questionImage);
        $option1 = $connexion->real_escape_string($option1);
        $option2 = $connexion->real_escape_string($option2);
        $option3 = $connexion->real_escape_string($option3);
        $option4 = $connexion->real_escape_string($option4);
        $correctOption = $connexion->real_escape_string($correctOption);

        // Insérer la question dans la base de données
        $sql = "INSERT INTO Questions (question, image, feedback) VALUES ('$questionText', '$questionImage', '$questionFeedback')";
        $connexion->query($sql);

        // Récupérer l'ID de la question que vous venez d'ajouter
        $questionId = $connexion->insert_id;

        // Insérer les options dans la table Réponses
        $sqlOptions = "INSERT INTO Options (id_question, option_texte, est_correct) VALUES ";
        $sqlOptions .= "('$questionId', '$option1', " . ($correctOption == 1 ? '1' : '0') . "), ";
        $sqlOptions .= "('$questionId', '$option2', " . ($correctOption == 2 ? '1' : '0') . "), ";
        $sqlOptions .= "('$questionId', '$option3', " . ($correctOption == 3 ? '1' : '0') . "), ";
        $sqlOptions .= "('$questionId', '$option4', " . ($correctOption == 4 ? '1' : '0') . ")";

        $connexion->query($sqlOptions);

        echo "Question ajoutée avec succès!";
    }

    // ... Continuer avec les actions pour la mise à jour et la suppression ...
}

// Fermer la connexion à la base de données
$connexion->close();
?>
