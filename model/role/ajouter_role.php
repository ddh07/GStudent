<?php
require '/classes/Connexion.php';
require '/classes/Role.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = Securite::validateData($_POST['libelle_role']) ?? '';
    $desc = Securite::validateData($_POST['description_role']) ?? null;

    if (!empty($nom)) {
        $pdo = Connexion::getConnection();
        $role = new Role($pdo);
        $role->addRole($nom, $desc);
        echo "Rôle ajouté.";
    } else {
        echo "Le nom du rôle est requis.";
    }
}
