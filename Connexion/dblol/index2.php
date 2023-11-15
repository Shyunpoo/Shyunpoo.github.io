<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <img src="Logo.png" alt="Dashboard Image" class="dashboard-image">
        <ul>
            <li><a href="#" onclick="showCreateQuestion()"><i class="fas fa-plus"></i> Créer une question</a></li>
            <li><a href="#" onclick="showUpdateQuestion()"><i class="fas fa-edit"></i> Mettre à jour une question</a></li>
            <li><a href="#" onclick="showDeleteQuestion()"><i class="fas fa-trash"></i> Supprimer une question</a></li>            
        </ul>
    </div>

    <div class="container">     
    <!-- Ajouter une question -->
    <div id="addQuestionForm" style="display: none;">
        <h2>Ajouter une question</h2>
        <form id="addForm" onsubmit="addQuestion(event)" enctype="multipart/form-data">
            <label for="question_text">Question:</label>
            <input type="text" id="question_text" required>

            <label for="question_image">Image:</label>
            <input type="file" id="question_image" accept="image/*">

            <label for="option1">Option 1:</label>
            <input type="text" id="option1" required>

            <label for="option2">Option 2:</label>
            <input type="text" id="option2" required>

            <label for="option3">Option 3:</label>
            <input type="text" id="option3" required>

            <label for="option3">Option 4:</label>
            <input type="text" id="option4" required>

            <label for="correct_option">Option correcte (1, 2, 3 ou 4):</label>
            <input type="number" id="correct_option" required>

            <label for="Feedback">Feedback</label>
            <input type="text" id="Feedback" required>

            <button type="submit">Ajouter</button>
        </form>
    </div>

    <!-- Modifier une question -->
    <div id="updateQuestionForm" style="display: none;">
        <h2>Modifier une question</h2>
        <form id="updateForm" onsubmit="updateQuestion(event)">
            <!-- Ajouter la liste déroulante pour la sélection de la question -->
            <label for="selectUpdateQuestion">Sélectionner une question à mettre à jour :</label>
            <select id="selectUpdateQuestion" onchange="loadQuestionForUpdate(this.value)" required></select>

            <label for="update_question_text">Question:</label>
            <input type="text" id="update_question_text" required>

            <label for="update_question_image">Image:</label>
            <input type="file" id="update_question_image" accept="image/*">

            <label for="update_option1">Option 1:</label>
            <input type="text" id="update_option1" required>

            <label for="update_option2">Option 2:</label>
            <input type="text" id="update_option2" required>

            <label for="update_option3">Option 3:</label>
            <input type="text" id="update_option3" required>

            <label for="update_option4">Option 4:</label>
            <input type="text" id="update_option4" required>

            <label for="update_correct_option">Option correcte (1, 2, 3 ou 4):</label>
            <input type="number" id="update_correct_option" required>

            <label for="update_Feedback">Feedback:</label>
            <input type="text" id="update_Feedback" required>

            <input type="hidden" id="update_question_id">

            <button type="submit">Mettre à jour</button>
        </form>
    </div>



        <!-- Supprimer une question -->
        <div id="deleteQuestionForm" style="display: none;">
            <h2>Supprimer une question</h2>
            <form id="deleteForm" onsubmit="deleteQuestion(event)">
                <label for="deleteQuestionId">ID de la question à supprimer :</label>
                <input type="number" id="deleteQuestionId" required>
        
                <button type="submit">Supprimer</button>
            </form>
        </div>

    <script src="script.js"></script>
</body>
</html>
