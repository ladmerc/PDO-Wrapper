<?php
// namespace App\database;
include 'database.php';

// Define configuration
define("DB_HOST", "localhost");
define("DB_USER", "username");
define("DB_PASS", "password");
define("DB_NAME", "database"); // load from env

new Database();