<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "DELETE FROM `categories` WHERE id=$id LIMIT 1";
    $res = mysqli_query($conn, $sql);
    $_SESSION['delete-category-success'] = 'Category deleted Successfully';
}
header('location:' . ROOT_URL . 'admin/manage-categories.php');
die();
