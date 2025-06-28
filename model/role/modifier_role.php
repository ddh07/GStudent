<?php
require '/classes/Connexion.php';
require '/classes/Role.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_role'] ?? null;
    $nom = $_POST['libelle_role'] ?? '';
    $desc = $_POST['description_role'] ?? null;

    if (!empty($id) && !empty($nom)) {
        $pdo = Connexion::getConnection();
        $role = new Role($pdo);
        $role->updateRole($id, $nom, $desc);
        echo "Rôle modifié.";
    } else {
        echo "ID et nom requis.";
    }
}
