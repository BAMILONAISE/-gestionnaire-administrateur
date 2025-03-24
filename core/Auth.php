<?php
// app/core/Auth.php

class Auth {
    public static function login($user) {
        $_SESSION['user_id'] = $user['id']; // Stocke l'ID de l'utilisateur dans la session
        $_SESSION['username'] = $user['username']; // Stocke le nom d'utilisateur dans la session
        $_SESSION['role'] = $user['role_id']; // Stocke le rôle de l'utilisateur dans la session
        
    }

    public static function logout() {
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
    }

    public static function isLoggedIn() {
        return isset($_SESSION['user_id']); // Vérifie si l'utilisateur est connecté
    }

    public static function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] == 1; // Vérifie si l'utilisateur est un admin
    }
}