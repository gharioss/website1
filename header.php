<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVENTURES GUSTATIVES</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://kit.fontawesome.com/f00c55aea5.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="topnav">
            <ul>
                <li><a href="<?php __DIR__ ?>/index.php">ACCUEIL</a></li>
                <li><a href="<?php __DIR__ ?>/recettes.php">RECETTES</a></li>
                <li><a href="<?php __DIR__ ?>/about.php">A PROPOS</a></li>
                <li><a href="<?php __DIR__ ?>/contact.php">CONTACT</a></li>
                <?php if (!isset($_SESSION['IS_LOGGED'])) : ?>
                    <li><a href="<?php __DIR__ ?>/login.php">CONNEXION</a></li>
                <?php else : ?>
                    <li><a href="<?php __DIR__ ?>/php/logout.php">DECONNEXION</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['IS_ADMIN']) && $_SESSION['IS_ADMIN'] == "Admin") : ?>
                    <li><a href="<?php __DIR__ ?>/admin.php">ADMINISTRATION</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div class="logo-image">
        <img class="logo" src="image/logo.png" alt="">
        <h1>AVENTURES GUSTATIVES</h1>
    </div>

    <hr class="header-hr">