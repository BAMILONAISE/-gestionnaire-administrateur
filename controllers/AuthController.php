<?php
// app/controllers/AuthController.php
require_once __DIR__."/../core/Auth.php";

class AuthController {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Initialise la connexion à la base de données
    }

    public function logout(){
        Auth::logout();
        header('Location: index.php?login');
        // require_once '../views/auth/login.php';   
    }

    public function login() {
        // Arrête l'exécution pour vérifier les données
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email']; // Récupère le nom d'utilisateur
            $password = $_POST['password']; // Récupère le mot de passe
            

            $stmt = $this->db->getConnection()->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]); // Exécute la requête
            $user = $stmt->fetch(); // Récupère l'utilisateur
            echo"<scrpt> alert('connexion reussie');</script>";
            if ($user && password_verify($password, trim($user['password']))) {
            //if ($user && trim($password)==trim($user['password'])) {
                Auth::login($user); // Connecte l'utilisateur
              
                header('Location: index.php?dashboard'); // Redirige vers le tableau de bord
            } else {
                echo "Identifiants incorrects"; // Affiche un message d'erreur
            }
        } else {
            require_once '../views/auth/login.php'; // Charge la vue de connexion
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST); // Affiche les données POST reçues
            // exit; // Arrête l'exécution pour vérifier les données
            $username = $_POST['username']; // Récupère le nom d'utilisateur
            $email = $_POST['email']; // Récupère l'email
            $role_id = $_POST['role'];// recupere l'id du role
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash le mot de passe
            print_r($role_id);
            // print_r($role);
            
            $stmt = $this->db->getConnection()->prepare("INSERT INTO users (username, email, password, role_id) VALUES (:username, :email, :password, :role)"); // 2 pour le rôle client
            $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password, ':role' => $role_id]); // Exécute la requête
            echo"<scrpt> alert('inscription reussie');</script>";
            header('Location: index.php?login'); // Redirige vers la page de connexion
        } else {
            require_once '../views/auth/register.php'; // Charge la vue d'inscription
        }
    
    }


 public function update() {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_username = $_POST['username']; // Récupère le nom d'utilisateur
        $new_email = $_POST['email']; // Récupère l'email
        $new_role = $_POST['role']; // Récupère l'id du role
        print_r($new_role);
        echo $new_username;
        echo $new_email;
        $stmt = $this->db->getConnection()->prepare ("UPDATE users SET username = :new_username, email = :new_email, role_id = :new_role  WHERE id = :id") ; // 2 pour le rôle client
        $stmt->execute([':new_username' => $new_username, ':new_email' => $new_email, ':new_role'=> $new_role, 'id'=>$_SESSION['user_id']]); // Exécute la requête
        $_SESSION['username'] = $new_username;
        $_SESSION['email'] = $new_email;
        $_SESSION['role'] = $new_role;
        

        header('Location: index.php?dashboard'); // Redirige vers la page de connexion
    } else {
        require_once '../views/auth/update.php'; // Charge la vue d'inscription
    }
 }
}
