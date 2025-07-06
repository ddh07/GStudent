<?php
/**
 * Gestion des opérations sur les etudiants
 */
class Etudiant {

    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    
    /**
     * @param mixed $id_etudiant
     * @param mixed $nom_etudiant
     * @param mixed $prenom_etudiant
     * @param mixed $age
     * @param mixed $date_naissance
     * @param mixed $filiere
     * @param null $date_inscription
     * 
     * @return boll
     * 
     * [Ajout d'un nouveal etudiant dans la base de données]
     */
    public function addEtudiant($id_etudiant,$nom_etudiant,$prenom_etudiant,$age,$date_naissance,$filiere,$date_inscription = null){
        $sql = "INSERT INTO etudiants (nom_etudiant, prenom_etudiant, age, date_naissance, filiere, date_inscription)
                VALUES (:nom, :prenom, :age, :naissance, :filiere, :inscription)";
        $stmt =  $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' =>  $nom_etudiant,
            ':prenom' =>  $prenom_etudiant,
            ':age' =>  $age,
            ':naissance' =>  $date_naissance,
            ':filiere' =>  $filiere,
            ':inscription' =>  $date_inscription
        ]);
    }

    
    /**
     * [Lire tous les etudiant enregistrés dans la base de donnée]
     * @return mexed
     */
    public function getAllEtudiant():array
    {
        $sql = "SELECT * FROM etudiants";
        $stmt =  $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    /**
     * @param mixed $id_etudiant
     * [Lire un etudiant suivant l'id]
     * @return mexed
     */
    public function getEtudiant($id_etudiant){
        $sql = "SELECT * FROM etudiants WHERE id_etudiant = :id LIMIT 1";
        $stmt =  $this->pdo->prepare($sql);
        $stmt->execute([':id' =>  $id_etudiant]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    /**
     * @param mixed $id_etudiant
     * @param mixed $nom_etudiant
     * @param mixed $prenom_etudiant
     * @param mixed $age
     * @param mixed $date_naissance
     * @param mixed $filiere
     * @param null $date_inscription
     * [Mettre à jour les information d'un étudiant]
     * @return bool
     */
    public function updateEtudiant($id_etudiant,$nom_etudiant,$prenom_etudiant,$age,$date_naissance,$filiere,$date_inscription = null)
    {
        $sql = "UPDATE etudiants
                SET nom_etudiant = :nom, prenom_etudiant = :prenom, age = :age, date_naissance = :naissance, 
                    filiere = :filiere, date_inscription = :inscription
                WHERE id_etudiant = :id";
        $stmt =  $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' =>  $nom_etudiant,
            ':prenom' =>  $prenom_etudiant,
            ':age' =>  $age,
            ':naissance' =>  $date_naissance,
            ':filiere' =>  $filiere,
            ':inscription' =>  $date_inscription,
            ':id' =>  $id_etudiant
        ]);
    }

    
    /**
     * @param mixed $id_etudiant
     * 
     * Supprimer un etudiant
     * 
     * @return bool
     */
    public function deleteEtudiant($id_etudiant){
        if ($this->etudiantLier($id_etudiant)) {
        return false; // ou déclencher une erreur personnalisée
    }

    $sql = "DELETE FROM etudiants WHERE id_etudiant = :id";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute(['id' => $id_etudiant]);
    }

    
    /**
     * 
     * [Obtenir le total des etudiants enregistrés]
     * 
     * @return mexed
     */
    public  function getCountAllEtudiant(){
        $sql = "SELECT COUNT(*) AS total_etudiant FROM etudiants";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_etudiant'];
    }


    /**
     * [Obtenir le nombre d'etudiant par filiere]
     * 
     * @return mexed
     */
    public function getCountAllEtudiantByFiliere() {
        $sql = "SELECT f.libelle_filiere, f.description_filiere, COUNT(e.id_etudiant) AS total
                FROM etudiants e
                JOIN filieres f ON e.filiere = f.id_filiere
                GROUP BY f.libelle_filiere, f.description_filiere;";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param mixed $keyword
     * 
     * Rechercher des étudiants suivant le nom, prénom ou la filiere
     * 
     * @return mexed
     */
    public function searchEtudiant($keyword){
        $sql = "SELECT * FROM etudiants
            WHERE nom_etudiant LIKE :keyword 
               OR Prenom_etudiant LIKE :keyword 
               OR filiere LIKE :keyword";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private  function etudiantLier($id_etudiant) {
        $sql = "SELECT COUNT(*) FROM gestion WHERE id_etudiant = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id_etudiant]);
        return $stmt->fetchColumn() > 0;
    }
}
?>
