<?php
require 'config/database.php';

if (isset($_POST['submit'])) {

    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    //set  if_featured to 0
    $is_featured = $is_featured == 1 ?: 0;

    if (!$title) {
        $_SESSION['add-post'] = 'Enter post title';
    } elseif (!$category_id) {
        $_SESSION['add-post'] = 'Select post category';
    } elseif (!$body) {
        $_SESSION['add-post'] = 'Enter post description';
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = 'Choose Thumbnail';
    } else {
        $time = time();
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination = '../assets/uploads/' . $thumbnail_name;

        //checking image file
        $allowed_files = ['png', 'jpeg', 'jpg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);

        if (in_array($extension, $allowed_files)) {
            // image size 
            if ($thumbnail['size'] < 2000000) {
                // upload avatar 
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination);
            } else {
                $_SESSION['add-post'] = 'File size too big. Should be less than 2mb';
            }
        } else {
            $_SESSION['add-post'] = 'Files should be png, jpeg, jpg';
        }
    }

    if (isset($_SESSION['add-post'])) {

        $_SESSION['add-post-data'] = $_POST;
        header('location:' . ROOT_URL . 'admin/add-post.php');
        die();
    } else {
        // set is_featured for all post 0
        if ($is_featured == 1) {
            $feature_sql = "UPDATE posts SET is_featured=0";
            $featured_res = mysqli_query($conn, $feature_sql);
        }

        $sql = "INSERT INTO posts (title, body, thumbnail,category_id, author_id, is_featured) VALUES ('$title','$body','$thumbnail_name',$category_id,$author_id,$is_featured)";

        $res = mysqli_query($conn, $sql);

        if (mysqli_errno($conn)) {
            $_SESSION['add-post-success'] = 'New post added successfully';
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
    }
}

header('location: ' . ROOT_URL . 'admin/add-post.php');
die();
