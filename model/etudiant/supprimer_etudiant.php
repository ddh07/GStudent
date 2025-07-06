<?php
require '../../classes/Connexion.php';
require '../../classes/Etudiant.php';
require '../../classes/Securite.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = Securite::validateInteger($_GET['id']) ?? null;

    if ($id) {
        $pdo = Connexion::getConnection();
        $etudiant = new Etudiant($pdo);

        if($etudiant->deleteEtudiant($id)){

        }else{
            
        }

        header('Location: /vue/secretaire/Acceuil.php');
        echo "Étudiant supprimé.";
    } else {
        echo "ID requis.";
    }
}
exit();