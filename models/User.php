<?php
// app/models/User.php

class User {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Initialise la connexion à la base de données
    }

    public function getAllUsers() {
        $stmt = $this->db->getConnection()->query("SELECT * FROM users"); // Exécute la requête
        return $stmt->fetchAll(); // Retourne tous les utilisateurs
    }

    public function getUserById($id) {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]); // Exécute la requête
        return $stmt->fetch(); // Retourne l'utilisateur correspondant à l'ID
    }
}

