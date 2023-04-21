<?php
require 'config/database.php';

// Get user form if submit button was clicked
if(isset($_POST['submit'])) {
    // Get form data from user inputs and sanitize them
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $isAdmin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    // Validate user inputs
    if(!$username) {
        $_SESSION['edit-user'] = "Invalid username.";
    } else {
        // Update user if everything is fine
        $query = "UPDATE Users SET username = '$username', isAdmin = '$isAdmin' WHERE idUser = '$id' LIMIT 1;";
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)) {
            $_SESSION['edit-user'] = "Failed to update the user.";
        } else {
            $_SESSION['edit-user-success'] = "The user was edited successfully.";
        }
    }

} else {
    // If button wasn't clicked, bounce back to SignIn page
    header('location: ' . 'manage-users.php');
    die();
}