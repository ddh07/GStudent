<?php
require '/classes/Connexion.php';
require '/classes/Filiere.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_filiere'] ?? null;
    $libelle = $_POST['libelle_filiere'] ?? '';
    $description = $_POST['description_filiere'] ?? null;

    if (!empty($id) && !empty($libelle)) {
        $pdo = Connexion::getConnection();
        $filiere = new Filiere($pdo);
        $filiere->updateFiliere($id, $libelle, $description);
        echo "Filière modifiée avec succès.";
    } else {
        echo "ID et libellé requis.";
    }
}
