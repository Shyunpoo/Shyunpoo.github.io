<?php
$serveur = "mysql-jbcaro.alwaysdata.net";
$utilisateur = "jbcaro";
$motDePasse = "Encephale3";
$nomBaseDeDonnees = "jbcaro_quizzsitelol";

// Connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
echo "Connexion réussie à la base de données";
?>
