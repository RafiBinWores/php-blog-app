<?php

require 'config/database.php';

if (isset($_POST['submit'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$title) {
        $_SESSION['add-category'] = 'Enter title';
    } elseif (!$description) {
        $_SESSION['add-category'] = 'Enter description';
    }

    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location:' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        $sql = "INSERT INTO categories (title, description) VALUES ('$title','$description')";
        $res = mysqli_query($conn, $sql);

        if (mysqli_errno($conn)) {
            $_SESSION['add-category'] = "Could not add category";
            header('location:' . ROOT_URL . 'admin/add-category.php');
            die();
        } else {
            $_SESSION['add-category-success'] = 'category title added successfully';
            header('location: ' . ROOT_URL . 'admin/manage-categories.php');
            die();
        }
    }
}
