<?php

require 'config/database.php';

if (isset($_POST['submit'])) {

    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmPassword = filter_var($_POST['confirmPassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    if (!$username) {
        $_SESSION['register'] = 'Please enter username';
    } elseif (!$email) {
        $_SESSION['register'] = 'please enter your email';
    } elseif (strlen($password) < 8 || strlen($confirmPassword) < 8) {
        $_SESSION['register'] = 'Password should be 8+ character';
    } elseif (!$avatar['name']) {
        $_SESSION['register'] = 'please add your profile picture';
    } else {
        if ($password !== $confirmPassword) {
            $_SESSION['register'] = 'Password do not match';
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // checking 
            $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {
                $_SESSION['register'] = 'Username or Email already exits';
            } else {
                //avatar
                $time = time();
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination = 'assets/uploads/' . $avatar_name;

                //checking image file
                $allowed_files = ['png', 'jpeg', 'jpg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);

                if (in_array($extention, $allowed_files)) {
                    // image size 
                    if ($avatar['size'] < 2000000) {
                        // upload avatar 
                        move_uploaded_file($avatar_tmp_name, $avatar_destination);
                    } else {
                        $_SESSION['register'] = 'File size too big. Should be less than 2mb';
                    }
                } else {
                    $_SESSION['register'] = 'Files should be png, jpeg, jpg';
                }
            }
        }
    }

    //redirect
    if (isset($_SESSION['register'])) {

        $_SESSION['register-data'] = $_POST;
        header('Location:' . ROOT_URL . 'register.php');
        die();
    } else {
        //insert new user
        $insert_sql = "INSERT INTO `users`(`id`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES (null,'$username','$email','$hashed_password','$avatar_name',0)";

        $insert_res = mysqli_query($conn, $insert_sql);


        if (!mysqli_connect_error()) {
            $_SESSION['register-success'] = 'Registration Successful. Please Log in';
            header('Location:' . ROOT_URL . 'login.php');
            die();
        }
    }
} else {
    header('Location:' . ROOT_URL . 'register.php');
    die();
}
