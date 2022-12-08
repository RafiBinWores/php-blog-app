<?php

require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    if (!$username) {

        $_SESSION['edit-user'] = 'Invalid from input';
    } else {
        //update info
        $sql = "UPDATE users SET username = '$username', is_admin=$is_admin WHERE id=$id LIMIT 1";

        $res = mysqli_query($conn, $sql);

        if (mysqli_error($conn)) {
            $_SESSION['edit-user'] = 'Failed update user';
        } else {
            $_SESSION['edit-user-success'] = "Successfully updated $username Information";
        }
    }
}
header('location:' . ROOT_URL . 'admin/manage-users.php');
die();
