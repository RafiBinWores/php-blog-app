<?php

require 'config/database.php';

if (isset($_POST['submit'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$email) {
        $_SESSION['login'] = 'Email Required';
    } elseif (!$password) {
        $_SESSION['login'] = 'Password required';
    } else {
        $sql = "SELECT * FROM  users WHERE email = '$email'";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) == 1) {
            $user = mysqli_fetch_assoc($res);
            $db_pass = $user['password'];

            //compare password
            if (password_verify($password, $db_pass)) {

                $_SESSION['user-id'] = $user['id'];

                if ($user['is_admin'] == 1) {
                    $_SESSION['user-is-admin']  = true;
                }
                header('location:' . ROOT_URL . 'admin/');
            } else {
                $_SESSION['login']  = 'Please check your input';
            }
        } else {
            $_SESSION['login']  = 'User not found';
        }
    }

    if (isset($_SESSION['login'])) {
        $_SESSION['login-data'] = $_POST;
        header('location:' . ROOT_URL . 'login.php');
        die();
    }
} else {
    header('location:' . ROOT_URL . 'login.php');
    die();
}
