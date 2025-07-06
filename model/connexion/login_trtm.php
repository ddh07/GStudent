<?php
    session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


require '../../classes/Connexion.php';
require '../../classes/Securite.php';
require '../../classes/Utilisateur.php';
require '../../classes/Role.php';

$pdo = Connexion::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = Securite::validateData($_POST['username']) ?? '';
    $password = Securite::validateData($_POST['password']) ?? '';

   if (!empty($username) && !empty($password)) {
    $userModel = new Utilisateur($pdo);
    $user = $userModel->getUtilisateurByUsername($username);

    if ($user && Securite::validatePassword($password, $user["password"])) {
        $roleModel = new Role($pdo);
        $role = $roleModel->getRoleById($user['id_role']);

        $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $role['libelle_role'];

        MyLogger::log("Tentative de connexion de l'utilisateur avec le rôle " . $role['libelle_role'] . " réussie.");

        switch ($role['libelle_role']) {
            case "Administrateur":
                header('Location: /vue/admin/Acceuil.php');
                exit;
            case "Secrétaire":
                header('Location: /vue/secretaire/Acceuil.php');
                exit;
            case "Professeur":
                header('Location: /vue/prof/Acceuil.php');
                exit;
            default:
                $_SESSION['notif'] = [
                    'type' => 'danger',
                    'message' => "Rôle inconnu."
                ];
                header('Location: /vue/login.php');
                exit;
        }

    } else {
        $_SESSION['notif'] = [
            'type' => 'danger',
            'message' => "Identifiants invalides."
        ];
        MyLogger::log("Échec de tentative de connexion pour l'utilisateur " . $username);
        header('Location: /vue/login.php');
        exit;
    }
} else {
    echo "Veuillez remplir tous les champs."; 
}


}
