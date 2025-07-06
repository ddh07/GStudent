<?php
require '/classes/Connexion.php';
require '/classes/Gestion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = Securite::validateInteger($_POST['id_utilisateur']) ?? null;
    $id_etudiant = Securite::validateInteger($_POST['id_etudiant']) ?? null;
    $action = Securite::validateData($_POST['action']) ?? '';

    if ($id_user && $id_etudiant && in_array($action, ['Creation', 'Modification', 'Suppression'])) {
        $pdo = Connexion::getConnection();
        $gestion = new Gestion($pdo);
        $gestion->saveAction($id_user, $id_etudiant, $action);
        echo "Action enregistrée.";
    } else {
        echo "Données invalides.";
    }
}
exit();