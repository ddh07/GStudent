<?php
require '/classes/Connexion.php';
require '/classes/Etudiant.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = Securite::validateData($_POST['nom_etudiant']) ?? '';
    $prenom = Securite::validateData($_POST['Prenom_etudiant']) ?? '';
    $age = Securite::validateInteger($_POST['age']) ?? null;
    $naissance = Securite::validateDate($_POST['date_naissance']) ?? null;
    $filiere = Securite::validateData($_POST['filiere']) ?? null;
    $inscription = Securite::validateDate($_POST['date_inscription']) ?? date('Y-m-d');
    $photo = $_POST['photo_profil'] ?? null;

    if ($nom && $prenom && $filiere) {
        $pdo = Connexion::getConnection();
        $etudiant = new Etudiant($pdo);
        $etudiant->addEtudiant($nom, $prenom, $age, $naissance, $filiere, $inscription, $photo);
        echo "Étudiant ajouté.";
    } else {
        echo "Champs obligatoires manquants.";
    }
}
