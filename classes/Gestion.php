<?php
/**
 * Garde une trace des action effectuer par les utilisateurs sur chaque etudiant
 */
class Gestion {
    private $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * @param mixed $id_utilisateur
     * @param mixed $id_etudiant
     * @param mixed $action
     * 
     * @return bool
     */
    public function saveAction($id_utilisateur, $id_etudiant, $action) {
        $sql = "INSERT INTO gestion (id_utilisateur, id_etudiant, action, date_gestion)
                VALUES (:id_utilisateur, :id_etudiant, :action, CURDATE())";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id_utilisateur' => $id_utilisateur,
            ':id_etudiant' => $id_etudiant,
            ':action' => $action
        ]);
    }

    /**
     * @return mexed
     */
    public function getAllActions() {
        $sql = "SELECT g.*, u.username, e.nom_etudiant, e.Prenom_etudiant
                FROM gestion g
                JOIN utilisateurs u ON g.id_utilisateur = u.id_utilisateur
                JOIN etudiants e ON g.id_etudiant = e.Id_etudiant
                ORDER BY g.date_gestion DESC";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
