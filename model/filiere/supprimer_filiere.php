<?php
require '/classes/Connexion.php';
require '/classes/Filiere.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = Securite::validateInteger($_POST['id_filiere']) ?? null;

    if (!empty($id)) {
        $pdo = Connexion::getConnection();
        $filiere = new Filiere($pdo);
        $filiere->deleFiliere($id);
        echo "Filière supprimée.";
    } else {
        echo "ID requis.";
    }
}
