<?php
/**
 * [Connexion a la base de donnée suivant un fichier de configuration]
 */
class Connexion {
    private static $pdo = null;

    /**
     * @return [PDO $pdo]
     */
    public static function getConnection() {
        if (self::$pdo === null) {
            if (!isset($_SESSION["fichierConfiguration"])) {
                $_SESSION["fichierConfiguration"]=parse_ini_file("/config.ini", true);
            }
            try {
                $tConfiguration = $_SESSION["fichierConfiguration"];
                $tConnexion = $tConfiguration["database"];
                $host = $tConnexion['host'];
                $dbname = $tConnexion['dbname'];
                $username = $tConnexion['username'];
                $password =$tConnexion['password'];

                self::$pdo = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }
        }
        return self::$pdo;
    }
}
?>