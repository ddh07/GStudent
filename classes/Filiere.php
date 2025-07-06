<?php
/**
 * Description Filiere
 */
class Filiere {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * @param mixed $libelle
     * @param null $description
     * 
     * @return [type]
     */
    public function addFiliere($libelle, $description = null) {
        $sql = "INSERT INTO filieres (libelle_filiere, description_filiere) VALUES (:libelle, :description)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':libelle' => $libelle,
            ':description' => $description
        ]);
    }

    /**
     * @param mixed $id_filiere
     * 
     * @return [type]
     */
    public function getFiliereById($id_filiere) {
        $sql = "SELECT * FROM filieres WHERE id_filiere = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id_filiere]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param mixed $id_filiere
     * @param mixed $libelle
     * @param mixed $description
     * 
     * @return [type]
     */
    public function updateFiliere($id_filiere, $libelle, $description) {
        $sql = "UPDATE filieres SET libelle_filiere = :libelle, description_filiere = :description WHERE id_filiere = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':libelle' => $libelle,
            ':description' => $description,
            ':id' => $id_filiere
        ]);
    }

    /**
     * @param mixed $id_filiere
     * 
     * @return [type]
     */
    public function deleFiliere($id_filiere) {
        $sql = "DELETE FROM filieres WHERE id_filiere = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id_filiere]);
    }

    /**
     * @return [type]
     */
    public function getAllFiliere() {
        $sql = "SELECT * FROM filieres ORDER BY libelle_filiere ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public  function getCountAllFiliere(){
        $sql = "SELECT COUNT(*) AS total_filiere FROM filieres";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_filiere'];
    }
}
