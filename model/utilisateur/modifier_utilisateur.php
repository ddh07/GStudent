<?php
require '/classes/Connexion.php';
require '/classes/Utilisateur.php';
require '/Classes/Securite.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_utilisateur'] ?? null;
    $username = Securite::validateData($_POST['username']) ?? '';
    $id_role = Securite::validateInteger($_POST['id_role']) ?? null;
    $password = Securite::hashPassword($_POST['password']) ?? null;

    if ($id && $username && $email && $id_role) {
        $pdo = Connexion::getConnection();
        $utilisateur = new Utilisateur($pdo);
        $utilisateur->updateUtilisateur($id, $username, $email, $id_role, $password);
        echo "Utilisateur modifié.";
    } else {
        echo "Données incomplètes.";
    }
}
exit();