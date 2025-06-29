<?php
/**
 * [Gestion des Utilisateurs]
 */
class Utilisateur {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * @param mixed $username
     * @param mixed $email
     * @param mixed $password
     * @param mixed $id_role
     * 
     * [Ajouter un utilisateur avec id_role]
     * 
     * @return [type]
     */
    public function addUtilisateur($username, $email, $password, $id_role) {
        $sql = "INSERT INTO utilisateur (username, email, password, id_role) VALUES (:username, :email, :password, :id_role)";
        $stmt = $this->pdo->prepare($sql);

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashPassword,
            ':id_role' => $id_role
        ]);
    }

    
    /**
     * @param mixed $id_user
     * 
     * [Récupérer un utilisateur par id ]
     * 
     * @return [array{  }]
     */
    public function getUtilisateurById($id_user) {
        $sql = "SELECT u.id_user, u.username, u.email, u.created_at, r.nom_role 
                FROM utilisateur u
                JOIN role r ON u.id_role = r.id_role
                WHERE u.id_user = :id_user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_user' => $id_user]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    /**
     * @param mixed $id_user
     * @param mixed $username
     * @param mixed $email
     * @param mixed $id_role
     * 
     * [Mettre à jour d'un utilisateur]
     * 
     * @return [bool]
     */
    public function updateUtilisateur($id_user, $username, $email, $id_role) {
        $sql = "UPDATE utilisateur SET username = :username, email = :email, id_role = :id_role WHERE id_user = :id_user";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':id_role' => $id_role,
            ':id_user' => $id_user
        ]);
    }

    
    /**
     * @param mixed $id_user
     * 
     * [Supprimer un utilisateur]
     * 
     * @return [type]
     */
    public function deleteUtilisateur($id_user) {
        $sql = "DELETE FROM utilisateur WHERE id_user = :id_user";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id_user' => $id_user]);
    }

    
    /**
     * @return [type]
     * 
     * [Lister tous les utilisateurs]
     */
    public function getAllUtilisateur() {
        $sql = "SELECT u.id_user, u.username, u.email, u.created_at, r.nom_role 
                FROM utilisateur u
                JOIN role r ON u.id_role = r.id_role
                ORDER BY u.id_user DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
