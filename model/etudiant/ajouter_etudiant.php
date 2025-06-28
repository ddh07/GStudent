<?php
require '/classes/Connexion.php';
require '/classes/Etudiant.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = Connexion::getConnection();
    $etudiant = new Etudiant($pdo);

    $nom = $_POST['nom_etudiant'] ?? '';
    $prenom = $_POST['Prenom_etudiant'] ?? '';
    $age = $_POST['age'] ?? null;
    $naissance = $_POST['date_naissance'] ?? null;
    $filiere = $_POST['filiere'] ?? null;
    $inscription = $_POST['date_inscription'] ?? date('Y-m-d');
    $photo = $_POST['photo_profil'] ?? null;

    if ($nom && $prenom && $filiere) {
        $etudiant->addEtudiant($nom, $prenom, $age, $naissance, $filiere, $inscription, $photo);
        echo "Étudiant ajouté.";
    } else {
        echo "Champs obligatoires manquants.";
    }
}
