<?php
require 'logs/logs.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /vue/login.php');
    Logger::log("Demmerage");
    exit;
}

?>