<?php
require '/classes/Connexion.php';
require '/classes/Utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = Securite::validateInteger($_POST['id_utilisateur']) ?? null;

    if ($id) {
        $pdo = Connexion::getConnection();
        $utilisateur = new Utilisateur($pdo);
        $utilisateur->deleteUtilisateur($id);
        echo "Utilisateur supprimé.";
    } else {
        echo "ID requis.";
    }
}
