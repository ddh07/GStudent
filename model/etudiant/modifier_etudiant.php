<?php
    session_start();
    error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../..//classes/Connexion.php';
require '../../classes/Etudiant.php';
require '../../classes/Securite.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = Connexion::getConnection();
    $etudiant = new Etudiant($pdo);

    $id = Securite::validateInteger($_POST['id_etudiant']) ?? null;
    $nom = Securite::validateData($_POST['nom_etudiant']) ?? '';
    $prenom = Securite::validateData($_POST['prenom_etudiant']) ?? '';
    $age = Securite::validateInteger($_POST['age']) ?? null;
    $naissance = Securite::validateDate($_POST['date_naissance']) ?? null;
    $filiere = Securite::validateData($_POST['filiere']) ?? null;
    $inscription = Securite::validateDate($_POST['date_inscription']) ?? null;

    if ($id && $nom && $prenom && $filiere) {
        $etudiant->updateEtudiant($id, $nom, $prenom, $age, $naissance, $filiere, $inscription);
        echo "Étudiant modifié.";
        header("Location: /vue/secretaire/Acceuil.php");
    } else {
        echo "Données incomplètes.";
    }
}
exit();