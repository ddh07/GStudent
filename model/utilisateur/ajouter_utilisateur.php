<?php
require '/classes/Connexion.php';
require '/classes/Utilisateur.php';
require '/classes/Securite.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = Securite::validateData($_POST['username']) ?? '';
    $email = Securite::validateEmail($_POST['email']) ?? '';
    $password = Securite::hashPassword($_POST['password']) ?? '';
    $id_role = Securite::validateInteger($_POST['id_role']) ?? null;

    if ($username && $email && $password && $id_role) {
        $pdo = Connexion::getConnection();
        $utilisateur = new Utilisateur($pdo);
        $utilisateur->addUtilisateur($username, $email, $password, $id_role);
        echo "Utilisateur ajouté.";
    } else {
        echo "Champs requis manquants.";
    }
}
exit();
