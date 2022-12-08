<?php

require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$title || !$description) {
        $_SESSION['edit-category'] = "invalid title or category";
    } else {
        $sql = "UPDATE `categories` SET `title`='$title',`description`='$description' WHERE id=$id LIMIT 1";
        $res = mysqli_query($conn, $sql);

        if (mysqli_errno($conn)) {
            $_SESSION['edit-category'] = "Couldn't Update category";
        } else {
            $_SESSION['edit-category-success'] = "updated Successfully";
        }
    }
}
header('Location:' . ROOT_URL . 'admin/manage-categories.php');
die();
