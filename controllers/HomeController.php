<?php
// app/controllers/HomeController.php

class HomeController {
    public function index() {
        require_once '../views/auth/login.php'; // Charge la vue de la page d'accueil
    }
}