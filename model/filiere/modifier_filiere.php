<?php
require '/classes/Connexion.php';
require '/classes/Filiere.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = Securite::validateInteger($_POST['id_filiere']) ?? null;
    $libelle = Securite::validateData($_POST['libelle_filiere']) ?? '';
    $description = Securite::validateData($_POST['description_filiere']) ?? null;

    if (!empty($id) && !empty($libelle)) {
        $pdo = Connexion::getConnection();
        $filiere = new Filiere($pdo);
        $filiere->updateFiliere($id, $libelle, $description);
        echo "Filière modifiée avec succès.";
    } else {
        echo "ID et libellé requis.";
    }
}
exit();