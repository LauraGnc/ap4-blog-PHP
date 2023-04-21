<?php

require 'config/database.php';

if(isset($_GET['id'])) {
    // Fetch user from BDD
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM Users WHERE idUser = '$id';";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    // Only one user should be fetched
    if(mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;

        // Delete image in the folder
        if($avatar_path) {
            unlink($avatar_path);
        }
    }

    // Delete the User from BDD
    $delete_user_query = "DELETE FROM Users WHERE idUser = '$id';";
    $delete_user_result = mysqli_query($connection, $delete_user_query);

    if(mysqli_errno($connection)) {
        $_SESSION['delete-user'] = "Cannot delete the user.";
    } else {
        $_SESSION['delete-user-success'] = "The User was deleted successfully.";
    }
}

header('location: ' . 'manage-users.php');
die();