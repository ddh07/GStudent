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
        $config = null;
        try{
            logger::log("Connexion a la base de donnée...");
            logger::log("Chargement du fichier de configuration...");
           $config = new Config();
        }catch(Exception $e){
            echo "erreur ".$e->getMessage();
            logger::log($e->getMessage(),'ERREUR');
        }
        if (self::$pdo === null) {
            try{
                self::$pdo = new PDO("mysql:host={$config->getHost()};dbname={$config->getDBName()}", $config->getUsername(), $config->getPassword());
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                logger::log("Reussite de la connexion");
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
                logger::log($e->getMessage(),'ERREUR');
            }
        }
        return self::$pdo;
    }
}
?>