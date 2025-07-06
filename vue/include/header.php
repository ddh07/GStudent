<?php
session_start();
if (!isset($_SESSION['id_utilisateur'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tableau de bord</title>

  <!-- Bulma is included -->
  <link rel="stylesheet" href="../../public/css/main.min.css">
   <link rel="stylesheet" href="../../public/css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="../../public/js/script.js"></script>

  <script src="../../public/js/all.min.js"></script>
  <script src="../../public/js/main.js"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app">
  <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
      <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
      </a>
      <div class="navbar-item has-control" style="
    font-size: xx-large;
    text-decoration: underline;
    text-decoration-style: double;
">
        <h1>Acceuil</h1>
      </div>
    </div>
    <div class="navbar-brand is-right">
      <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
      </a>
    </div>
    <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
          <a class="navbar-link is-arrowless">
            <div class="is-user-avatar">
              <img src="../../public/imgs/pp_H_3.png" alt="John Doe">
            </div>
            <div class="is-user-name"><?echo $_SESSION['username'];?><span></span></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
          </a>
          <div class="navbar-dropdown">
            <a href="profile.html" class="navbar-item">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              <span>Mon profile</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-settings"></i></span>
              <span>Paramètres</span>
            </a>
    
            <hr class="navbar-divider">
            <a href="/model/connexion/logout_trtm.php" class="navbar-item">
              <span class="icon"><i class="mdi mdi-logout"></i></span>
              <span>Se deconnecter</span>
            </a>
          </div>
        </div>
        <a title="Log out" class="navbar-item is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-logout"></i></span>
          <span>Se deconnecter</span>
        </a>
      </div>
    </div>
  </nav>
  <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>GStudent</b></span>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li>
          <?php if($_SESSION["role"] == "Secrétaire"){ ?>
          <a href="../../vue/secretaire/Acceuil.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Acceuil</span>
          </a>
          <?}else if($_SESSION["role"] == "Professeur"){?>
            <a href="../../vue/prof/Acceuil.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Acceuil</span>
          </a>
          <?}else if($_SESSION["role"] == "Administrateur"){?>
            <a href="../../vue/admin/Acceuil.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Acceuil</span>
          </a>
          <?}?>
        </li>
         <li>
          <?php if($_SESSION["role"] == "Secrétaire"){ ?>
          <a href="../../vue/secretaire/Etudiant.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Etudiants</span>
          </a>
          <?}else if($_SESSION["role"] == "Professeur"){?>
            <a href="../../vue/prof/Etudiant.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Etudiants</span>
          </a>
          <?}else if($_SESSION["role"] == "Administrateur"){?>
            <a href="../../vue/admin/Gestion.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Gestion</span>
          </a>
          <?}?>
        </li>
         <li>
          <?php if($_SESSION["role"] == "Secrétaire"){ ?>
          <a href="../../vue/secretaire/Filiere.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Filière</span>
          </a>
          <?}else if($_SESSION["role"] == "Professeur"){?>
            <a href="../../vue/prof/Filiere.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Filière</span>
          </a>
          <?}else if($_SESSION["role"] == "Administrateur"){?>
            <a href="../../vue/admin/Log.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Logs</span>
          </a>
          <?}?>
        </li>
        
      </ul>
      <p class="menu-label">Outils</p>
      <ul class="menu-list">
       
        <li>
          <?php if($_SESSION["role"] == "Secrétaire"){ ?>
          <a href="../../vue/secretaire/Profile.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Profile</span>
          </a>
          <?}else if($_SESSION["role"] == "Professeur"){?>
            <a href="../../vue/prof/Profile.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Profile</span>
          </a>
          <?}else if($_SESSION["role"] == "Administrateur"){?>
            <a href="../../vue/admin/Profile.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Profile</span>
          </a>
          <?}?>
        </li>
        
        <li>
          <?php if($_SESSION["role"] == "Secrétaire"){ ?>
          <a href="../../vue/secretaire/Parametre.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Paramètre</span>
          </a>
          <?}else if($_SESSION["role"] == "Professeur"){?>
            <a href="../../vue/prof/Parametre.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Paramètre</span>
          </a>
          <?}else if($_SESSION["role"] == "Administrateur"){?>
            <a href="../../vue/admin/Parametre.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Paramètre</span>
          </a>
          <?}?>
        </li>
    </div>
  </aside>