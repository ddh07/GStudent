<?php

/*
    Clas Etudiant
Gestion des opérations sur les etudiants
*/

class Etudiant {

    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    //Ajout d'un nouveal etudiant dans la base de données
    public function add($id_etudiant,$nom_etudiant,$prenom_etudiant,$age,$date_naissance,$filiere,$date_inscription = null,$photo_profil = null){
        $sql = "INSERT INTO etudiants (nom_etudiant, prenom_etudiant, age, date_naissance, filiere, date_inscription, photo_profil)
                VALUES (:nom, :prenom, :age, :naissance, :filiere, :inscription, :photo)";
        $stmt =  $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' =>  $nom_etudiant,
            ':prenom' =>  $prenom_etudiant,
            ':age' =>  $age,
            ':naissance' =>  $date_naissance,
            ':filiere' =>  $filiere,
            ':inscription' =>  $date_inscription,
            ':photo' =>  $photo_profil
        ]);
    }

    //Lire tous les etudiant enregistrés dans la base de donnée
    public function getAllEtudiant(PDO $pdo)
    {
        $sql = "SELECT * FROM etudiants";
        $stmt =  $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lire un etudiant suivant l'id
    public function getEtudiant($id_etudiant)
    {
        $sql = "SELECT * FROM etudiants WHERE id_etudiant = :id LIMIT 1";
        $stmt =  $this->pdo->prepare($sql);
        $stmt->execute([':id' =>  $id_etudiant]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour les information d'un étudiant
    public function update($id_etudiant,$nom_etudiant,$prenom_etudiant,$age,$date_naissance,$filiere,$date_inscription = null,$photo_profil = null)
    {
        $sql = "UPDATE etudiants
                SET nom_etudiant = :nom, prenom_etudiant = :prenom, age = :age, date_naissance = :naissance, 
                    filiere = :filiere, date_inscription = :inscription, photo_profil = :photo
                WHERE id_etudiant = :id";
        $stmt =  $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' =>  $nom_etudiant,
            ':prenom' =>  $prenom_etudiant,
            ':age' =>  $age,
            ':naissance' =>  $date_naissance,
            ':filiere' =>  $filiere,
            ':inscription' =>  $date_inscription,
            ':photo' =>  $photo_profil,
            ':id' =>  $id_etudiant
        ]);
    }

    // Supprimer un etudiant
    public function delete( $id_etudiant)
    {
        $sql = "DELETE FROM etudiants WHERE id_etudiant = :id";
        $stmt =  $this->pdo->prepare($sql);
        return $stmt->execute([':id' =>  $id_etudiant]);
    }

    // Obtenir le total des etudiants enregistrés
    public  function getCountAllEtudiant(PDO $pdo){
        $sql = "SELECT COUNT(*) AS total_etudiant FROM etudiants";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_etudiant'];
    }

    // Obtenir le nombre d'etudiant par filiere
    public function getCountAllEtudiantByFiliere(PDO $pdo) {
        $sql = "SELECT f.libelle_filiere, COUNT(e.Id_etudiant) AS total
            FROM etudiants e
            JOIN filieres f ON e.filiere = f.id_filiere
            GROUP BY e.filiere";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Rechercher des étudiants suivant le nom, prénom ou la filiere
    public function search($keyword){
        $sql = "SELECT * FROM etudiants
            WHERE nom_etudiant LIKE :keyword 
               OR Prenom_etudiant LIKE :keyword 
               OR filiere LIKE :keyword";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
