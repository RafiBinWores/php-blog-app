<?php

require 'config/database.php';

if (isset($_POST['submit'])) {

    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmPassword = filter_var($_POST['confirmPassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    if (!$username) {

        $_SESSION['add-user'] = 'Please enter username';
    } elseif (!$email) {

        $_SESSION['add-user'] = 'please enter your email';
    } elseif (strlen($password) < 8 || strlen($confirmPassword) < 8) {

        $_SESSION['add-user'] = 'Password should be 8+ character';
    } elseif (!$avatar['name']) {

        $_SESSION['add-user'] = 'please add your profile picture';
    } else {

        if ($password !== $confirmPassword) {

            $_SESSION['add-user'] = 'Password do not match';
        } else {

            //hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // checking for username and email
            $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {
                $_SESSION['add-user'] = 'Username or Email already exits';
            } else {
                //avatar
                $time = time();
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination = '../assets/uploads/' . $avatar_name;

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
                        $_SESSION['add-user'] = 'File size too big. Should be less than 2mb';
                    }
                } else {
                    $_SESSION['add-user'] = 'Files should be png, jpeg, jpg';
                }
            }
        }
    }

    //redirect if there is any error
    if (isset($_SESSION['add-user'])) {

        // paas data from register page 
        $_SESSION['add-user-data'] = $_POST;
        header('Location:' . ROOT_URL . 'admin/add-user.php');
        die();
    } else {
        //insert new user
        $insert_sql = "INSERT INTO `users`(`id`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES (null,'$username','$email','$hashed_password','$avatar_name','$is_admin')";

        $insert_res = mysqli_query($conn, $insert_sql);

        //redirect to login page
        if (!mysqli_connect_error()) {
            $_SESSION['add-user-success'] = "Successfully added new user $username";
            header('Location:' . ROOT_URL . 'admin/manage-users.php');
            die();
        }
    }
} else {
    // if button is't clicked 
    header('Location:' . ROOT_URL . 'admin/add-user.php');
    die();
}
