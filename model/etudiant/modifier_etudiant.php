<?php
require '/classes/Connexion.php';
require '/classes/Etudiant.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = Connexion::getConnection();
    $etudiant = new Etudiant($pdo);

    $id = $_POST['Id_etudiant'] ?? null;
    $nom = $_POST['nom_etudiant'] ?? '';
    $prenom = $_POST['Prenom_etudiant'] ?? '';
    $age = $_POST['age'] ?? null;
    $naissance = $_POST['date_naissance'] ?? null;
    $filiere = $_POST['filiere'] ?? null;
    $inscription = $_POST['date_inscription'] ?? null;
    $photo = $_POST['photo_profil'] ?? null;

    if ($id && $nom && $prenom && $filiere) {
        $etudiant->updateEtudiant($id, $nom, $prenom, $age, $naissance, $filiere, $inscription, $photo);
        echo "Étudiant modifié.";
    } else {
        echo "Données incomplètes.";
    }
}
