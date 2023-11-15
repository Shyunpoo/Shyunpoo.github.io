<?php
include('php.php');

// Traitement des actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "update") {
        // Action pour mettre à jour une question
        $questionId = $_POST["question_id"];
        $questionText = $_POST["question_text"];
        $questionImage = $_POST["question_image"];
        $option1 = $_POST["option1"];
        $option2 = $_POST["option2"];
        $option3 = $_POST["option3"];
        $option4 = $_POST["option4"];
        $correctOption = $_POST["correct_option"];
        $questionFeedback = $_POST["Feedback"];

        // Échapper les valeurs pour éviter les injections SQL 
        $questionText = $conn->real_escape_string($questionText);
        $questionImage = $conn->real_escape_string($questionImage);
        $option1 = $conn->real_escape_string($option1);
        $option2 = $conn->real_escape_string($option2);
        $option3 = $conn->real_escape_string($option3);
        $option4 = $conn->real_escape_string($option4);
        $correctOption = $conn->real_escape_string($correctOption);
        $questionFeedback = $conn>real_escape_string($questionFeedback);

        // Mettre à jour la question dans la base de données
        $sql = "UPDATE Questions SET question='$questionText', image='$questionImage', feedback='$questionFeedback' WHERE id_question=$questionId";
        $conn->query($sql);

        // Mettre à jour les options dans la table Réponses
        $sqlOptions = "UPDATE Reponses SET option_texte=?, est_correct=? WHERE id_question=?";

        $stmt = $conn->prepare($sqlOptions);
        $stmt->bind_param("sii", $option, $isCorrect, $questionId);

        $options = array($option1, $option2, $option3, $option4);
        foreach ($options as $index => $option) {
            $isCorrect = ($correctOption == $index + 1) ? 1 : 0;
            $stmt->execute();
        }

        echo "Question mise à jour avec succès!";
    }
}
?>
