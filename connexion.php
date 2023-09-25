<?php

require __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$baseURL = $_ENV["baseURL"];// q5 Connexion à la BD :
$ytbapi = $_ENV["ytbkey"];
$bd = new PDO('mysql:host=127.0.0.1; charset=UTF8; dbname=glk4599a', 'glk4599a', 'P7328841z');

