<?php
// app/controllers/UserController.php

class UserController {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Initialise la connexion à la base de données
    }

    public function dashboard() {
        if (!Auth::isLoggedIn()) {
            header('Location: index.php?login'); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
            $users = [];


                    // Récupérer tous les utilisateurs (pour l'admin)
            if (Auth::isAdmin()) {
                $stmt = $this->db->getConnection()->query("SELECT * FROM users");
                $users = $stmt->fetchAll();
            }
    
        }

        require_once __DIR__.'/../views/user/dashboard.php'; // Charge la vue du tableau de bord
    }

    public function profile() {
        if (!Auth::isLoggedIn()) {
            header('Location: index?login'); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
        }

        $stmt = $this->db->getConnection()->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]); // Exécute la requête
        $user = $stmt->fetch(); // Récupère les informations de l'utilisateur

        


        // $userId = Auth::getUserId();
        // $stmt = $this->db->getConnection()->prepare("SELECT * FROM users WHERE id = :id");
        // $stmt->execute(['id' => $userId]);
        // $user = $stmt->fetch();


        require_once '../views/user/profile.php'; // Charge la vue du profil utilisateur
    }
 
}




//     // Supprimer un utilisateur (admin seulement)
//     public function delete($userId) {
//         if (!Auth::isAdmin()) {
//             header('Location: index?dashboard');
//             exit;
//         }

//         $stmt = $this->db->getConnection()->prepare("DELETE FROM users WHERE id = :id");
//         $stmt->execute(['id' => $userId]);

//         header('Location: index?dashboard');
//     }

//     // Mettre à jour un utilisateur (admin seulement)
//     public function update($userId) {
//         if (!Auth::isAdmin()) {
//             header('Location: index?dashboard');
//             exit;
//         }

//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $username = $_POST['username'];
//             $email = $_POST['email'];
//             $status = $_POST['status'];

//             $stmt = $this->db->getConnection()->prepare("UPDATE users SET username = :username, email = :email, status = :status WHERE id = :id");
//             $stmt->execute([
//                 'username' => $username,
//                 'email' => $email,
//                 'status' => $status,
//                 'id' => $userId
//             ]);

//             header('Location: index?dashboard');
//         } else {
//             // Récupérer les informations de l'utilisateur à modifier
//             $stmt = $this->db->getConnection()->prepare("SELECT * FROM users WHERE id = :id");
//             $stmt->execute(['id' => $userId]);
//             $user = $stmt->fetch();

//             require_once __DIR__ . '/../views/auth/update.php';
//         }
//     }
// }