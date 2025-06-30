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
     * @param mixed $password
     * @param mixed $id_role
     * 
     * Ajouter un nouvelle utilisateur dans la base de donnée
     * 
     * @return bool - true / false
     */
    public function addUtilisateur($username, $password, $id_role) {
        $sql = "INSERT INTO utilisateurs (username, password, id_role) VALUES (:username, :password, :id_role)";
        $stmt = $this->pdo->prepare($sql);

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        return $stmt->execute([
            ':username' => $username,
            ':password' => $hashPassword,
            ':id_role' => $id_role
        ]);
    }

    
    /**
     * @param mixed $id_utilisateur
     * 
     * Récupérer les donnée d'un utilisateur par son id
     * 
     * @return mixed
     */
    public function getUtilisateurById($id_utilisateur) {
        $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_utilisateur' => $id_utilisateur]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param mixed $username
     * 
     * Récupérer les donnée d'un utilisateur par son nom d'utilisateur
     * 
     * @return mixed
     */
    public function getUtilisateurByUsername($username) {
        $sql = "SELECT * FROM utilisateurs WHERE username = :username";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    /**
     * @param mixed $id_utilisateur
     * @param mixed $username
     * @param mixed $password
     * @param mixed $id_role
     * 
     * Mettre à jour les données d'un utilisateur
     * 
     * @return bool true or false
     */
    public function updateUtilisateur($id_utilisateur, $username, $password, $id_role) {
        $sql = "UPDATE utilisateurs SET username = :username, password = :password, id_role = :id_role WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':id_role' => $id_role,
            ':id_utilisateur' => $id_utilisateur
        ]);
    }

    
    /**
     * @param mixed $id_utilisateur
     * 
     * Supprimer un utilisateur de la base de données
     * 
     * @return bool true or false
     */
    public function deleteUtilisateur($id_utilisateur) {
        $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id_utilisateur' => $id_utilisateur]);
    }

    
    /**
     * @return mixed
     * 
     * Recuperer tous les utilisateurs de la base de donnée
     */
    public function getAllUtilisateur() {
        $sql = "SELECT * FROM utilisateurs";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
