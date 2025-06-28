<?php
/**
 * [Gestion des Roles]
 */
class Role {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * @param mixed $libelle_role
     * @param null $description_role
     * 
     * @return [type]
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
     * @return [type]
     */
    public function getRoleById($id_role) {
        $sql = "SELECT * FROM role WHERE id_role = :id_role";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_role' => $id_role]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param mixed $id_role
     * @param mixed $libelle_role
     * @param null $description_role
     * 
     * @return [type]
     */
    public function updateRole($id_role, $libelle_role, $description_role = null) {
        $sql = "UPDATE role SET libelle_role = :libelle_role, description_role = :description_role WHERE id_role = :id_role";
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
     * @return [type]
     */
    public function deleteRole($id_role) {
        $sql = "DELETE FROM role WHERE id_role = :id_role";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id_role' => $id_role]);
    }

    /**
     * @return [type]
     */
    public function getAllRole() {
        $sql = "SELECT * FROM role ORDER BY id_role ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
