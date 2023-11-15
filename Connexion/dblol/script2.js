function showCreateQuestion() {
    document.getElementById('addQuestionForm').style.display = 'block';
    document.getElementById('updateQuestionForm').style.display = 'none';
    document.getElementById('deleteQuestionForm').style.display = 'none';
}

function showUpdateQuestion() {
    document.getElementById('addQuestionForm').style.display = 'none';
    document.getElementById('updateQuestionForm').style.display = 'block';
    document.getElementById('deleteQuestionForm').style.display = 'none';
}

function showDeleteQuestion() {
    document.getElementById('addQuestionForm').style.display = 'none';
    document.getElementById('updateQuestionForm').style.display = 'none';
    document.getElementById('deleteQuestionForm').style.display = 'block';
}


// AJOUT D'UNE QUESTION DANS LA BASE DE DONNEES (DEBUT)
function addQuestion(event) {
    event.preventDefault(); // Empêche la soumission du formulaire classique

    // Récupérer les données du formulaire
    var questionText = document.getElementById('question_text').value;
    var questionImage = document.getElementById('question_image').value; // Note: pour un fichier, vous devrez traiter cela différemment
    var option1 = document.getElementById('option1').value;
    var option2 = document.getElementById('option2').value;
    var option3 = document.getElementById('option3').value;
    var option4 = document.getElementById('option4').value;
    var correctOption = document.getElementById('correct_option').value;
    var Feedback = document.getElementById('Feedback').value;

    // Effectuer une requête AJAX pour envoyer les données au serveur
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        console.log("ReadyState :", xhr.readyState);
        console.log("Status :", xhr.status);

        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Gérer la réponse du serveur ici
                console.log(xhr.responseText);
                console.log("Réponse du serveur :", xhr.responseText);

                // Afficher une confirmation
                alert("Question ajoutée avec succès pour l'administrateur!");

                // Actualiser la page
                location.reload();
                // Vous pouvez ajouter du code pour traiter la réponse, par exemple, actualiser la liste des questions
            } else {
                // Gérer les erreurs ici
                console.error("Erreur lors de la requête AJAX");
            }
        }
    };

    xhr.open("POST", "createquestion.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Construire les données à envoyer
    var data = "action=add&question_text=" + encodeURIComponent(questionText) +
               "&question_image=" + encodeURIComponent(questionImage) +
               "&option1=" + encodeURIComponent(option1) +
               "&option2=" + encodeURIComponent(option2) +
               "&option3=" + encodeURIComponent(option3) +
               "&option4=" + encodeURIComponent(option4) +
               "&correct_option=" + encodeURIComponent(correctOption) +
               "&Feedback=" + encodeURIComponent(Feedback);

    // Console.log de la variable 'data'
    console.log("Données à envoyer :", data);

    // Envoyer les données
    xhr.send(data);
}
// AJOUT D'UNE QUESTION DANS LA BASE DE DONNEES (FIN)




// MODIFICATION D'UNE QUESTION DANS LA BASE DE DONNEES (DEBUT)
function loadQuestionsForUpdate() {
    var selectUpdateQuestion = document.getElementById('selectUpdateQuestion');

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        console.log("ReadyState (loadQuestionsForUpdate):", xhr.readyState); // Ajout pour le débogage
        console.log("Status (loadQuestionsForUpdate):", xhr.status); // Ajout pour le débogage

        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var questions = JSON.parse(xhr.responseText);
                console.log("Questions (loadQuestionsForUpdate):", questions); // Ajout pour le débogage

                // Remplir la liste déroulante avec les questions
                for (var i = 0; i < questions.length; i++) {
                    var option = document.createElement('option');
                    option.value = questions[i].id_question;
                    option.textContent = questions[i].question;
                    selectUpdateQuestion.appendChild(option);
                }

                // Charger la première question lors du chargement de la page
                loadQuestionForUpdate(selectUpdateQuestion.value);
            } else {
                console.error("Erreur lors du chargement des questions pour la mise à jour");
            }
        }
    };

    xhr.open("GET", "get_questions.php", true);
    xhr.send();
}

// Fonction pour charger les détails de la question sélectionnée pour la mise à jour
function loadQuestionForUpdate(questionId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        console.log("ReadyState (loadQuestionForUpdate):", xhr.readyState); // Ajout pour le débogage
        console.log("Status (loadQuestionForUpdate):", xhr.status); // Ajout pour le débogage

        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var questionDetails = JSON.parse(xhr.responseText);
                console.log("QuestionDetails (loadQuestionForUpdate):", questionDetails); // Ajout pour le débogage

                // Pré-remplir les champs avec les données existantes
                document.getElementById('update_question_text').value = questionDetails.question;
                // Assurez-vous d'avoir un élément pour afficher l'image existante et/ou permettre son changement
                document.getElementById('update_option1').value = questionDetails.option1;
                document.getElementById('update_option2').value = questionDetails.option2;
                document.getElementById('update_option3').value = questionDetails.option3;
                document.getElementById('update_option4').value = questionDetails.option4;
                document.getElementById('update_correct_option').value = questionDetails.correct_option;
                document.getElementById('update_Feedback').value = questionDetails.feedback;
                document.getElementById('update_question_id').value = questionDetails.id_question;
            } else {
                console.error("Erreur lors du chargement des détails de la question pour la mise à jour");
            }
        }
    };

    xhr.open("GET", "get_question_details.php?id=" + questionId, true);
    xhr.send();
}
// MODIFICATION D'UNE QUESTION DANS LA BASE DE DONNEES (FIN)




// SUPPRESSION D'UNE QUESTION DANS LA BASE DE DONNEES (DEBUT)
// Fonction pour supprimer une question
function deleteQuestion(event) {
    event.preventDefault();

    // Récupère l'ID de la question à supprimer
    var deleteQuestionId = document.getElementById('deleteQuestionId').value;

    // Envoie la requête fetch vers le serveur PHP
    fetch('delete.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            deleteQuestionId: deleteQuestionId
        })
    })
    .then(response => response.json())
    .then(data => {
        // Traite la réponse du serveur ici
        console.log('Data from server:', data);

        // Rafraîchit la liste des questions ou effectue d'autres actions nécessaires
        // ...

        // Efface le formulaire ou effectue d'autres actions nécessaires
        // ...
    })
    .catch(error => console.error('Erreur:', error));
}
// SUPPRESSION D'UNE QUESTION DANS LA BASE DE DONNEES (FIN)