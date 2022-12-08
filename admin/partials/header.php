<?php

// require 'config/constants.php';
require '../partials/header.php';

//fetch current user
if (!isset($_SESSION['user-id'])) {

    header('location:' . ROOT_URL . 'login.php');
    die();
    //     $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);

    //     $sql = "SELECT avatar FROM users WHERE id = '$id'";
    //     $res = mysqli_query($conn, $sql);
    //     $avatar = mysqli_fetch_assoc($res);
}

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
    <link rel="stylesheet" href="../assets/css/style.css">

</head>