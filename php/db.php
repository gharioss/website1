<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=blog_recette;charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
