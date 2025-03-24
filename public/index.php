<?php
// public/index.php

require_once __DIR__ . '/../config/config.php'; // Charge la configuration
require_once __DIR__ . '/../core/Router.php'; // Charge le routeur
require_once __DIR__ . '/../core/Database.php'; // Charge la connexion à la base de données

require_once __DIR__.'/../controllers/HomeController.php';
require_once __DIR__.'/../controllers/AuthController.php';
require_once __DIR__.'/../controllers/UserController.php';



session_start();

// Initialisation de la base de données
$db = new Database();

// Initialisation du routeur
$router = new Router();


// Définition des routes
$router->add('', ['controller' => HomeController::class, 'action' => 'index']); // Route par défaut
$router->add('login', ['controller' => AuthController::class, 'action' => 'login']); // Route pour la connexion
$router->add('logout', ['controller' => AuthController::class, 'action' => 'logout']); // Route pour la connexion
$router->add('register', ['controller' => AuthController::class, 'action' => 'register']); // Route pour l'inscription 
$router->add('update', ['controller' => AuthController::class, 'action' => 'update']); // Route pour l'inscription 
$router->add('dashboard', ['controller' => UserController::class, 'action' => 'dashboard']); // Route pour le tableau de bord
$router->add('profile', ['controller' => UserController::class, 'action' => 'profile']); // Route pour le profil utilisateur


// Dispatch la requête
$router->dispatch($_SERVER['QUERY_STRING']); // Traite la requête en fonction de l'URL



