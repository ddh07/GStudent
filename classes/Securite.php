<?php
    require 'Config.php';
/**
 * Gere l'intégrité et la conformité des donnée avant toutes insertion dans la bases de donnée
 */
class Securite{
    private $extension = null;
    private $config = null;

    function __construct(){
        try{
            $this->config = new Config();
        }catch(Exception $e){
            echo "erreur ".$e->getMessage();
        }
    }

    /**
     * anti-XSS
     */
    public static function validateData($data)
    {
        return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Valider un email
     */
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Valider un entier
     */
    public static function validateInteger($valeur)
    {
        return filter_var($valeur, FILTER_VALIDATE_INT);
    }

    /**
     * Hacher un mot de passe (bcrypt par défaut)
     */
    public static function hashPassword($motDePasse)
    {
        return password_hash($motDePasse, PASSWORD_BCRYPT);
    }

    /**
     * Vérifier un mot de passe par rapport au hash
     */
    public static function validatePassword($motDePasse, $hash)
    {
        return password_verify($motDePasse, $hash);
    }

    /**
     * @param mixed $date
     * Vérifie le format YYYY-MM-DD
     * @return String
     */
    public static function validateDate($date){
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    /**
     * @param mixed $fichier
     * Vérifie l'erreur
     * Vérifie la taille
     * Vérifie l’extension
     * Vérifie le type MIME
     * @return String d'erreur ou 'OK' si validé
     */
    function validateFileImage($fichier){
        try{
            $config = new Config();
            if ($fichier['erreur'] !== UPLOAD_ERR_OK) {
                return "Erreur lors de l'upload.";
            }

            if ($fichier['size'] > $config->getimagesizeAutorize()) {
                return "Fichier trop volumineux.";
            }

            $extension = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));
            if (!in_array($extension, $config->getExtensionsAutorize())) {
                 return "Extension non autorisée.";
            }

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $typeMime = finfo_file($finfo, $fichier['tmp_name']);
            finfo_close($finfo);

            if (!in_array($typeMime, $config->getMimesAutorize())) {
                return "Type MIME non autorisé.";
            }

        }catch(Exception $e){
            echo "erreur ".$e->getMessage();
        }
    
    return "OK";
}
}
