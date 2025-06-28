<?php
/**
 * [Description Securite]
 */
class Securite
{
    /**
     * Nettoyer une chaîne (anti-XSS)
     */
    public static function validateData($data)
    {
        return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Nettoyer un tableau entier de données
     */
    public static function validateTableContent(array $donnees)
    {
        $resultat = [];
        foreach ($donnees as $cle => $valeur) {
            $resultat[$cle] = self::validateData($valeur);
        }
        return $resultat;
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
}
