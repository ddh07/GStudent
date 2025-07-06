<?php
session_start();
require '../../classes/Config.php';

if ($_SESSION['role'] !== 'Administrateur') {
    header("Location: accueil.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newConfig = $_POST;

    $config = new Config();

    // Sauvegarde dans le fichier
    if ($config->saveMyConfig($newConfig)) {
        $_SESSION['message'] = "Les paramètres ont été enregistrés avec succès.";
    } else {
        $_SESSION['error'] = "Impossible d'écrire dans le fichier de configuration.";
    }
    header("Location: /vue/options/option.php");
    exit();
}
?>
