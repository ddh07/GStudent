<?php
require '/classes/Connexion.php';
require '/classes/Role.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_role'] ?? null;

    if (!empty($id)) {
        $pdo = Connexion::getConnection();
        $role = new Role($pdo);
        $role->deleteRole($id);
        echo "Rôle supprimé.";
    } else {
        echo "ID requis.";
    }
}
