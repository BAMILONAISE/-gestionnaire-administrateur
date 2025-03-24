
<?php
// app/core/Database.php

class Database {
    private $connection;

    public function __construct() {
        // Connexion à la base de données avec PDO
        try {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage()); // Affiche l'erreur
        }
    }

    public function getConnection() {
        return $this->connection; // Retourne la connexion à la base de données
    }
}


   