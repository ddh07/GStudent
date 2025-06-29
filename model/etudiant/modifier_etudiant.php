<?php
require '/classes/Connexion.php';
require '/classes/Etudiant.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = Connexion::getConnection();
    $etudiant = new Etudiant($pdo);

    $id = Securite::validateInteger($_POST['Id_etudiant']) ?? null;
    $nom = Securite::validateData($_POST['nom_etudiant']) ?? '';
    $prenom = Securite::validateData($_POST['Prenom_etudiant']) ?? '';
    $age = Securite::validateInteger($_POST['age']) ?? null;
    $naissance = Securite::validateDate($_POST['date_naissance']) ?? null;
    $filiere = Securite::validateData($_POST['filiere']) ?? null;
    $inscription = Securite::validateDate($_POST['date_inscription']) ?? null;
    $photo = $_POST['photo_profil'] ?? null;

    if ($id && $nom && $prenom && $filiere) {
        $etudiant->updateEtudiant($id, $nom, $prenom, $age, $naissance, $filiere, $inscription, $photo);
        echo "Étudiant modifié.";
    } else {
        echo "Données incomplètes.";
    }
}
