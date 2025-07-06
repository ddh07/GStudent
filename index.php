<?php
session_start();
require 'logs/MyLogger.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /vue/login.php');
    MyLogger::log("Demmerage");
    exit;
}

?>