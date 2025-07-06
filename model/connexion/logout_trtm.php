<?php
require '../../logs/MyLogger.php';

MyLogger::log("Deconnexion de l'utilisateur ".$_SESSION['username']."...");
session_start();
session_unset(); 
session_destroy();

echo "Déconnexion réussie.";
MyLogger::log("Deconnexion reussite.");

header('Location: /vue/login.php');

?>