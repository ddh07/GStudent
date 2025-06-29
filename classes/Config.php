<?php
class Config{
    private $config = [];

    public function __construct($chemin = '../../config.ini'){
        if (!file_exists($chemin)) {
            throw new Exception("Fichier de configuration introuvable : $chemin");
        }
        $this->config = parse_ini_file($chemin, true);

        if (!isset($this->config['database'])) {
            throw new Exception("Section [database] manquante dans le fichier de configuraton .ini.");
        }

        if (!isset($this->config['upload'])) {
            throw new Exception("Section [upload] manquante dans le fichier de configuraton .ini.");
        }
    }

    public function getDBName(){
        return (String) ($this->config['database']['dbname'] ?? "database");
    }

    public function getHost(){
         return (String) ($this->config['database']['host'] ?? "localhost:3306");
    }

    public function getUsername(){
         return (String) ($this->config['database']['username'] ?? "root");
    }

    public function getPassword(){
         return (String) ($this->config['database']['password'] ?? "root");
    }

     public function getImageSizeAutorize()
    {
        return (int) ($this->config['upload']['size'] ?? 1048576); // défaut : 1 Mo
    }

    public function getExtensionsAutorize()
    {
        $ext = $this->config['upload']['extensions'] ?? '';
        return array_map('trim', explode(',', $ext));
    }

    public function getMimesAutorize()
    {
        $ext = $this->config['upload']['mimes'] ?? '';
        return array_map('trim', explode(',', $ext));
    }

}
