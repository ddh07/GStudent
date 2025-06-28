<?php
require '/classes/Connexion.php';
require '/classes/Filiere.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libelle = $_POST['libelle_filiere'] ?? '';
    $description = $_POST['description_filiere'] ?? null;

    if (!empty($libelle)) {
        $pdo = Connexion::getConnection();
        $filiere = new Filiere($pdo);
        $filiere->addFiliere($libelle, $description);
        echo "Filière ajoutée avec succès.";
    } else {
        echo "Le libellé est obligatoire.";
    }
}
