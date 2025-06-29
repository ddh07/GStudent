<?php
require '/classes/Connexion.php';
require '/classes/Etudiant.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = Securite::validateInteger($_POST['Id_etudiant']) ?? null;

    if ($id) {
        $pdo = Connexion::getConnection();
        $etudiant = new Etudiant($pdo);
        $etudiant->deleteEtudiant($id);
        echo "Étudiant supprimé.";
    } else {
        echo "ID requis.";
    }
}
