<?php

require 'config/database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homies Blog</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!-- remix icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">

    <!-- css file -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header" id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container ">
                <a href="<?= ROOT_URL ?>" class="navbar-brand d-flex align-items-center" href="index.html">
                    <img src="assets/image/Untitled-1.png" alt="Logo" width="90" height="50" class="d-inline-block align-text-top me-2">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse justify-content-end ms-2 navbar-collapse" id="navbarNavDropdown">

                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL ?>index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL ?>blogs.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL ?>about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT_URL ?>contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="<?= ROOT_URL ?>add-post.php">Start writing</a>
                        </li>

                        <?php if (isset($_SESSION['user-id'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link write-button" href="<?= ROOT_URL ?>admin/index.php">
                                    <img src="assets/image/blog1.jpg" alt="">
                                </a>
                            </li>
                        <?php else : ?>

                            <li class="nav-item">
                                <a class="nav-link me-2" href="<?= ROOT_URL ?>login.php">Signin</a>
                            </li>

                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>