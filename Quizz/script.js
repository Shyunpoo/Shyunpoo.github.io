// Mise en place des questions (Début)
const quizData = [
    {
        question: "Question 1 : A qui appartient ce splashart ? ",
        image: "ASSETS/samira.jpg",
        options: ["Samira", "Miss Fortune", "Lillia", "Katarina"],
        correctAnswer: 0,
        comment: "Ce splashart appartient à Samira"
    },
    {
        question: " Question 2 : A qui appartient ce sort ?",
        image: "ASSETS/Compétence.png",
        options: ["Thresh", "Pyke", "Nautilus", "Blitzcrank"],
        correctAnswer: 2,
        comment: "Ce sort appartient à Nautilus (Z)"
    },
    {
        question: " Question 3 : Combien coûte cet item ?",
        image: "ASSETS/Objet.png",
        options: ["3000 po", "3400 po", "2900 po", "3200 po"],
        correctAnswer: 3,
        comment: "L'objet coeuracier coûte 3200 po"
    },
    {
        question: " Question 4 : Quel est le nom de ce personnage de la série Arcane ?",
        image: "ASSETS/Arcane.png",
        options: ["Singed", "Wander", "Silco", "Ekko"],
        correctAnswer: 2,
        comment: "Ce personne est le méchant dans arcane et il se nomme Silco"
    },
    {
        question: " Question 5 : De quel arbre fait parti cette rune ?",
        image: "ASSETS/Rune.png",
        options: ["Domination", "Sorcellerie", "Inspiration", "Précision"],
        correctAnswer: 0,
        comment: "La rune Coup bas appartient à l'arbre domination des runes"
    },
    {
        question: " Question 6 : Qui a prononcé cette phrase : Never become a monster to defeat one.",
        image: "",
        options: ["Sona", "Karma", "Séraphine", "Ahri"],
        correctAnswer: 1,
        comment: "Cette citation a été prononcée par Karma"
    },
    {
        question: " Question 7 : Quel personnage possède ces stats de base ?",
        image: "ASSETS/Stats.png",
        options: ["Lillia", "Caitlyn", "Belveth", "Sejuani"],
        correctAnswer: 2,
        comment: "Ce sont les statistiques de bases de Belveth"
    },
    {
        question: " Question 8 : Quel boost donne le void 2 (une fois 6 void sur votre plateau) ?",
        image: "",
        options: ["Le remora", "L'ultime de Belveth", "L'hérald", "Le Nashor"],
        correctAnswer: 2,
        comment: "Sur TFT le boost void 2 est l'hérald, le boost 1 étant le remora, et le boost 3 le nashor"
    },
    {
        question: " Question 9 : A qui appartient ce sort ?",
        image: "ASSETS/Compétence2.png",
        options: ["Zed", "Akali", "Katarina", "Vladimir"],
        correctAnswer: 2,
        comment: "Ce sort appartient à Katarina (Z)"
    },
    {
        question: " Question 10 : Qui a prononcé cette célèbre citation : Ce monde ne sera pas oublié. Je le remplacerai, tel un enfant dévorant ses parents",
        image: "",
        options: ["Chogath", "Tahm Kench", "Akali", "Belveth"],
        correctAnswer: 3,
        comment: "Cette citation a été prononcé par l'impératrice du néant Belveth"
    },
    {
        question: " Question 11 : A quel champion correspond ce titre ? Renard à neuf queues",
        image: "",
        options: ["Ahri", "Neeko", "Nidalee", "Evelynn"],
        correctAnswer: 0,
        comment: "le champion correspondant au titre Renard à neuf queues est Ahri"
    },
    {
        question: " Question 12 : Quel est le nom de cet item ? ",
        image: "ASSETS/Items2.webp",
        options: ["Encensoir ardent", "Miroir en verre de Bandle", "Mandat impérial", "Régénérateur de pierre de lune"],
        correctAnswer: 2,
        comment: "L'item est l'impérial mandate"
    },
    {
        question: " Question 13 : Quel est le nom de cet item ? 😂",
        image: "ASSETS/Items3.jpeg",
        options: ["Crochet de serpent", "Verute radieuse", "Masque Abyssal", "Statikk Shiv"],
        correctAnswer: 3,
        comment: "L'item est le Statikk Shiv"
    },
    {
        question: " Question 14 : Quel champion décrivent ces émojis ? 💨 🌩 🥷",
        image: "ASSETS/Items3.jpeg",
        options: ["Zed", "Volibear", "Kennen", "Akali"],
        correctAnswer: 2,
        comment: "Ces émojis décrivent Kennen"
    }
];
// Mise en place des questions (Fin)

// Déclare et initialise les variables pour suivre la question actuelle & le score du joueur
let currentQuestion = 0; 
let score = 0;

// Récupère les éléments HTML avec les ID 'options' 'questions' 'next-btn' 'resetbutton'
const questionElement = document.getElementById('question');
const optionsElement = document.getElementById('options');
const nextButton = document.getElementById('next-btn');
const resetButton = document.getElementById('resetButton');

document.getElementById('resetButton').addEventListener('click', function () {
    // Recharge la page pour revenir à la première page
    window.location.reload();
});

document.getElementById('next-btn').addEventListener('click', function () {
    // Recharge la page pour revenir à la première page
    nextButton.style.display = 'none'
});

if (currentQuestion >= 0 && currentQuestion < 10) {
    // Cacher le bouton si la condition est remplie
    resetButton.style.display = 'none';
} else {
    // Afficher le bouton dans tous les autres cas
    resetButton.style.display = 'block';
}


// Afficher la question et son contenu (image, choix de réponses)
function loadQuestion() {
    const currentQuizData = quizData[currentQuestion]; // Récupère les données de la question actuelle
    questionElement.textContent = currentQuizData.question; // Met à jour le texte de la question
    optionsElement.innerHTML = ''; // Efface les options de réponse précédentes

    const imageElement = document.getElementById('question-image'); // Récupère l'élément d'image
    imageElement.src = currentQuizData.image;  // Met à jour l'URL de l'image de la question actuelle
    


    currentQuizData.options.forEach((option, index) => {
        const optionElement = document.createElement('button'); // Crée un élément de bouton pour chaque option
        optionElement.textContent = option; // Définit le texte du bouton sur l'option
        optionElement.classList.add('option-btn'); // Ajoute une classe pour le style du bouton
        optionElement.addEventListener('click', () => checkAnswer(index));   // Ajoute un gestionnaire d'événements pour vérifier la réponse
        optionsElement.appendChild(optionElement); 
    });
}


let userResponses = []; // Tableau pour enregistrer les réponses de l'utilisateur

// Fonction pour vérifier la réponse de l'utilisateur
function checkAnswer(selectedOption) {
    if (selectedOption === quizData[currentQuestion].correctAnswer) { // Vérifie si l'option sélectionnée est la réponse correcte
        score++; // Incrémente le score si la réponse est correcte
        userResponses.push({ question: quizData[currentQuestion].question, answer: "Correct" });
    } else {
        userResponses.push({ question: quizData[currentQuestion].question, answer: "Incorrect" });
    }

    currentQuestion++; // Passe à la prochaine question

    if (currentQuestion < quizData.length) { 
        loadQuestion(); // Charge la prochaine question si elles existent
    } else {
        showResult(); // Affiche le résultat final si toutes les questions sont passées
    }
}

// Afficher les résultats du quiz
function showResult() {
    questionElement.textContent = `Vous avez terminé le quiz! Votre score est de ${score} sur ${quizData.length} Scrollez vers le bas pour voir vos réponses, attention vous serez spoil !.`;  // Affiche un message de fin de quiz avec le score
    optionsElement.innerHTML = '';
    nextButton.style.display = 'none'; // Cache le bouton "Suivant"

    // Affiche le bouton de réinitialisation si toutes les questions sont passées
    if (currentQuestion < quizData.length) {
        nextButton.style.display = 'none';
    } else {
        resetButton.style.display = 'block';
    }
    resetButton.style.display = 'flex';

    // Affiche les réponses de l'utilisateur
    const responsesContainer = document.getElementById('responses-container');
    responsesContainer.classList.remove('hidden');
    responsesContainer.innerHTML = '<h2>Réponses :</h2>';
    userResponses.forEach((response) => {
        const responseElement = document.createElement('p');
        responseElement.textContent = response.question + ' - ' + response.answer;

        const commentElement = document.createElement('span'); // Récupère le commentaire associé à la question
        commentElement.textContent = quizData.find(q => q.question === response.question).comment;

        // Ajoute un saut de ligne entre le mot "Correct"/"Incorrect" et le commentaire
        responseElement.appendChild(document.createElement('br'));
          // Ajoute une classe CSS basée sur "Correct" ou "Incorrect"
        responseElement.classList.add(response.answer.toLowerCase());
        responseElement.appendChild(commentElement);
        // Ajoute la réponse à l'élément des réponses
        responsesContainer.appendChild(responseElement);
        document.body.classList.add('hide-background');
    });
    
}

// Fonction pour réinitialiser le quiz
function resetFeedback() {
    const responsesContainer = document.getElementById('responses-container');
    responsesContainer.innerHTML = '';
}

nextButton.addEventListener('click', loadQuestion);


// Ajoute un gestionnaire d'événements pour le bouton de réinitialisation
document.getElementById('resetButton').addEventListener('click', function() {
    currentQuestion = 0;
    score = 0;
    userResponses = [];
    loadQuestion();
    resetFeedback();
});
