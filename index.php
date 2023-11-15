<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Différents quizz liés au jeu League of Legends">
    <meta name="keywords" content="quizz, lol, splashart, items, compétences">
    <meta name="author" content="Jean-Baptiste et Caroline">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <img src="ASSETS/Logo.png" alt="Logo">
        </div>
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <div class="menu" id="menu">
            <button onclick="window.open('Quizz/index.html', '_blank')"> Partie rapide </button>
            <ul class="menu-list">
                <li><a href="#Objets">Objets</a></li>
                <li><a href="#Citations">Citations</a></li>
                <li><a href="#Compétences">Compétences</a></li>
                <li><a href="#Splashart">Splashart</a></li>
                <li><a href="#Runes">Runes & Sums</a></li>
                <li><a href="#Arcane">Arcane</a></li>
            </ul>
            <button onclick="window.location.href='Connexion/index.php'">Se connecter</button>
        </div>

    </nav>
    <div class="ImageHaut" >
        <img id="drag-image" src="ASSETS/tee.png" alt="Draggable Image" draggable="true" ondragstart="drag(event)">
    </div>

    <div class="section" id="Objets">
        <div class="content">
            <div class="image">
                <img src="ASSETS/SECTIONS/Objets.png" alt="Image encadrée">   
            </div>
            <div class="text">
                <h2>De Doran à Divine Sunderer</h2>
                <p>Testez vos connaissances sur les objets emblématiques, des épées enchantées aux reliques mystiques. Êtes-vous prêt à devenir un expert en équipement </p>
                <button>Quizz Objets</button>
            </div>
        </div>
    </div>

    <div class="section" id="Citations">
        <div class="content">
            <div class="text">
                <h2>Citations Mémorables</h2>
                <p>Plongez-vous dans l'univers épique de League of Legends ! Êtes-vous prêt à identifier les champions qui ont prononcé ces phrases mémorables ? Mettez vos connaissances à l'épreuve et découvrez si vous êtes un véritable expert de l'Arène de Justice !</p>
                <button>Quizz Citations</button>
            </div>
            <div class="image" id="Compétences">
                <img src="ASSETS/SECTIONS/Citations.png" alt="Image encadrée">
            </div>
        </div>
    </div>

    <div class="section" id="Compétences">
        <div class="content">
            <div class="image">
                <img src="ASSETS/SECTIONS/Compétences.png" alt="Image encadrée">
            </div>
            <div class="text">
                <h2>Fill player ?</h2>
                <p>Êtes-vous capable d'identifier les personnages et leurs compétences qui leurs correspondent ? Etes-vous un joueur assez polyvalent pour cela ?</p>
                <button>Quizz Compétences</button>
            </div>
        </div>
    </div>

    <div class="section" id="Splashart">
        <div class="content">
            <div class="text">
                <h2>Reconnaissance en or</h2>
                <p>Êtes-vous un expert en reconnaissance des champions de League of Legends ? Mettez vos compétences à l'épreuve en identifiant ces champions à partir de leurs magnifiques Splasharts</p>
                <button>Quizz Splashart</button>
            </div>
            <div class="image">
                <img src="ASSETS/SECTIONS/Splashart.png" alt="Image encadrée">
            </div>
        </div>
    </div>

    <div class="section" id="Runes">
        <div class="content">
            <div class="image">
                <img src="ASSETS/SECTIONS/Runes.png" alt="Image encadrée">
            </div>
            <div class="text">
                <h2>Maîtrise des Runes</h2>
                <p>Prouvez que vous maîtrisez l'art des runes dans League of Legends ! Êtes-vous capable d'identifier les runes à partir de leurs symboles ?</p>
                <button>Quizz Runes</button>
            </div>
        </div>
    </div>

    <div class="section" id="Arcane">
        <div class="content">
            <div class="text">
                <h2>Arcane</h2>
                <p>De Piltover à Zaun, explorez les mystères de l'univers d'Arcane. Que pensez-vous savoir sur Jinx, Vi et les autres personnages ?</p>
                <button>Quizz Arcane</button>
            </div>
            <div class="image" id="Compétences">
                <img src="ASSETS/SECTIONS/Arcane.png" alt="Image encadrée">
            </div>
        </div>
    </div>

<footer>
    <p>Quizz LOL a été créé en application de la politique juridique Riot Games intitulée « Jargon juridique » relative à l'utilisation d'actifs de Riot Games. Riot Games ne soutient ni ne sponsorise celui-ci.</p>
</footer>

    <script src="script.js"></script>
</body>
</html>
