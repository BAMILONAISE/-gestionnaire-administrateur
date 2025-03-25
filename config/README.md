# Brief 4 - Gestion des Utilisateurs

![PHP](https://img.shields.io/badge/PHP-8.0%2B-blue)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.1-purple)

Une application web sécurisée pour la gestion des utilisateurs avec authentification et contrôle d'accès basé sur les rôles (admin/client).

## 📌 Fonctionnalités

- **Authentification** :
  - Connexion/déconnexion sécurisée
  - Inscription avec validation
- **Gestion des utilisateurs** (admin seulement) :
  - Liste des utilisateurs
  - Modification des rôles (admin/client) et statuts (actif/inactif)
  - Suppression d'utilisateurs
- **Sessions** :
  - Historique des connexions
  - Protection contre les accès non autorisés

## 🛠 Installation

### Prérequis
- PHP 8.0+
- MySQL 5.7+
- Apache/Nginx
- Composer (pour l'autoloading)

### Étapes
1. Cloner le dépôt :
   ```bash
   git clone https://github.com/votre-username/projet-fil-rouge.git

   Configurer la base de données :

Importer le fichier database.sql (à créer) ou exécuter les requêtes SQL fournies.

Configurer les variables d'environnement :

Créer un fichier .env basé sur .env.example  :

DB_HOST=localhost
DB_NAME=projet_fil_rouge
DB_USER=root
DB_PASS=
BASE_URL=http://localhost/projet-fil-rouge/public

/projet-fil-rouge
├── app/
│   ├── Controllers/       # Contrôleurs MVC
│   ├── Models/            # Modèles de données
│   ├── Views/             # Templates HTML
│   └── Core/              # Classes de base (Database, Auth)
├── public/
│   ├── assets/            # CSS/JS/Images
│   └── index.php          # Point d'entrée
├── config/                # Fichiers de configuration
└── .htaccess              # Réécriture d'URL