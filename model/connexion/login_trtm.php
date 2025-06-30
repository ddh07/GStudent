<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require '../../classes/Connexion.php';
require '../../classes/Securite.php';
require '../../classes/Utilisateur.php';

$pdo = Connexion::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = Securite::validateData($_POST['username']) ?? '';
    $password = Securite::validateData($_POST['password']) ?? '';

    if (!empty($username) && !empty($password)) {
        $userModel = new Utilisateur($pdo);
        $user = $userModel->getUtilisateurByUsername($username); // méthode à créer dans la classe Utilisateur

        if ($user && Securite::validatePassword($password,$user["password"])) {
            $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['id_role'] = $user['id_role'];

            echo "Connexion réussie. Bienvenue, " . $user['username'];
        } else {
            echo "username ou mot de passe incorrect.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
