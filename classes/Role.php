<?php
/**
 * Gestion des Roles des utilisateurs
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Role {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * @param mixed $libelle_role
     * @param null $description_role
     * 
     * @return bool true or false
     */
    public function addRole($libelle_role, $description_role = null) {
        $sql = "INSERT INTO role (libelle_role, description_role) VALUES (:libelle_role, :description_role)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':libelle_role' => $libelle_role,
            ':description_role' => $description_role
        ]);
    }

    /**
     * @param mixed $id_role
     * 
     * @return mexed
     */
    public function getRoleById($id_role) {
        $sql = "SELECT * FROM roles WHERE id_role = :id_role";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_role' => $id_role]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param mixed $id_role
     * @param mixed $libelle_role
     * @param null $description_role
     * 
     * @return bool
     */
    public function updateRole($id_role, $libelle_role, $description_role = null) {
        $sql = "UPDATE roles SET libelle_role = :libelle_role, description_role = :description_role WHERE id_role = :id_role";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':libelle_role' => $libelle_role,
            ':description_role' => $description_role,
            ':id_role' => $id_role
        ]);
    }

    /**
     * @param mixed $id_role
     * 
     * @return bool
     */
    public function deleteRole($id_role) {
        $sql = "DELETE FROM roles WHERE id_role = :id_role";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id_role' => $id_role]);
    }

    /**
     * @return mexed
     */
    public function getAllRole() {
        $sql = "SELECT * FROM roles ORDER BY id_role ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
