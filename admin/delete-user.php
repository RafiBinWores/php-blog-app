<?php

require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM users WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($res);

    if (mysqli_num_rows($res) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../assets/uploads/' . $avatar_name;

        if ($avatar_path) {
            unlink($avatar_path);
        }
    }
}


// delete user 

$dlt_sql = "DELETE FROM users WHERE id=$id";
$dlt_res = mysqli_query($conn, $dlt_sql);
if (mysqli_errno($conn)) {
    $_SESSION['delete-user'] = "Couldn't delete '{$user['username']}'";
} else {
    $_SESSION['delete-user-success'] =  "'{$user['username']}' deleted successfully";
}
header('location:' . ROOT_URL . 'admin/manage-users.php');
die();
