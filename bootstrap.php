<?php
// Chargement des dépendances
require 'vendor/autoload.php';

// Chargement dans les variable d'environnement le contenu du fichier .env
// Source : https://github.com/vlucas/phpdotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Initialisation et récupération de la connexion à la base de données
$dbConnection = (new Src\Database())->getConnection();
