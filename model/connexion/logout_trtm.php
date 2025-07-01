<?php
require '../../logs/logger.php';

Logger::log("Deconnexion de l'utilisateur ".$_SESSION['username']."...");
session_start();
session_unset(); 
session_destroy();

echo "Déconnexion réussie.";
Logger::log("Deconnexion reussite.");

?>