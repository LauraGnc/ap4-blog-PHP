<?php
require 'config/database.php';

// If SIGNIN button was clicked:
if(isset($_POST['submit'])) {
    // Get form data from user inputs and sanitize them
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validate user inputs
    if(!$username_email) {
        $_SESSION['signin'] = "Username or email required to log in.";
    } elseif(!$password) {
        $_SESSION['signin'] = "Password required to log in.";
    } else {
        // Fetch User from BDD
        $fetch_user_query = "SELECT * FROM Users WHERE username='$username_email' OR email='$username_email';";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if(mysqli_num_rows($fetch_user_result) == 1) {
            // Si la query a 1 row, alors l'User a ete trouver
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];

            // Compare password with BDD password for the User
            if(password_verify($password, $db_password)) {
                // Set session for access control
                $_SESSION['user-id'] = $user_record['idUser'];

                // Set session if user is an admin
                if($user_record['isAdmin'] == 1) {
                    $_SESSION['user-is-admin'] = true;
                }

                // Log the User in
                header('location: ' . 'admin/');

            } else {
                $_SESSION['signin'] = "Password do not match with the account.";
            }
        } else {
            $_SESSION['signin'] = "User not found.";
        }
    }

    // If any issueredirect back to signin page with login data
    if($_SESSION['signin']) {
        // Pass form data back to signup page
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . 'signin.php');
        die();
    }

} else {
    // If button wasn't clicked, bounce back to SignIn page
    header('location: ' . 'signin.php');
    die();
}