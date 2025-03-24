<?php
// app/core/Router.php

class Router {
    protected $routes = [];
    /* exemple de contenu de la propriete $routes
    [
        index/login => ['id'=> 3]
    ]
    */

    public function add($route, $params) {
        $this->routes[$route] = $params; // Ajoute une route avec ses paramètres
    }

    public function dispatch($url) {
        $url = $this->removeQueryStringVariables($url); // Nettoie l'URL
        // echo 'url = '.$url.'---'.'<pre>';
        // print_r($this->routes);
        // print_r($_GET);
        // echo '</pre>';
        if (array_key_exists($url, $this->routes)) {
            $controller = $this->routes[$url]['controller']; // Récupère le contrôleur
            $action = $this->routes[$url]['action']; // Récupère l'action

            $controller = new $controller(); // Instancie le contrôleur
            $controller->$action(); // Appelle l'action
        } else {
            echo "404 - Page not found"; // Affiche une erreur 404 si la route n'existe pas
        }
    }

    protected function removeQueryStringVariables($url) {
        if ($url != '') {
            $parts = explode('&', $url, 2); // Sépare l'URL en deux parties

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0]; // Garde la première partie si elle ne contient pas de '='
            } else {
                $url = ''; // Sinon, vide l'URL
            }
        }

        return $url; // Retourne l'URL nettoyée
    }
}