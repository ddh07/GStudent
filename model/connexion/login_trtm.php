<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require '../../classes/Connexion.php';
require '../../classes/Securite.php';
require '../../classes/Utilisateur.php';
require '../../classes/Role.php';

require '../../logs/logger.php';

$pdo = Connexion::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = Securite::validateData($_POST['username']) ?? '';
    $password = Securite::validateData($_POST['password']) ?? '';

    if (!empty($username) && !empty($password)) {
        $userModel = new Utilisateur($pdo);
        $user = $userModel->getUtilisateurByUsername($username);

        if ($user && Securite::validatePassword($password,$user["password"])) {
            $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['id_role'] = $user['id_role'];

            $roleModel = new Role($pdo);
            $role = $roleModel->getRoleById($user['id_role']);

            switch($role['libelle_role']){
                case "Administreur":
                    header('Location: /vue/admin/Acceuil.php');
                    break;
                case "Secrétaire":
                    header('Location: /vue/secretaire/Acceuil.php');
                    break;
                case "Professeur":
                    header('Location: /vue/prof/Acceuil.php');
                    break;
                default:
            }

            echo "Connexion réussie. Bienvenue, " . $user['username'];
            logger::log("Tentative de connexion a l'utilisateur ".$username." reussite.");
            header('Location: /vue/admin/acceuil_admin.php');
        } else {
            echo "username ou mot de passe incorrect.";
            logger::log("Echec de tentative de connexion a l'utilisateur ".$username);
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
