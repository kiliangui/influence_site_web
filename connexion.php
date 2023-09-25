<?php

require __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$baseURL = $_ENV["baseURL"];// q5 Connexion à la BD :
$ytbapi = $_ENV["ytbkey"];
$dbname = $_ENV["dbname"];
$dbuser = $_ENV["dbuser"];
$dbpass = $_ENV["dbpass"];
$bd = new PDO('mysql:host=127.0.0.1; charset=UTF8; dbname='.$dbname, $dbuser, $dbpass);

