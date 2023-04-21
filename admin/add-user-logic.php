<?php
include 'config/database.php';

// Get user form if submit button was clicked
if(isset($_POST['submit'])) {
    // Get form data from user inputs and sanitize them
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $isAdmin = $_FILES['avatar'];

    // Validate user inputs
    if(!$username) {
        $_SESSION['add-user'] = "Please enter a username!";
    } elseif(!$email) {
        $_SESSION['add-user'] = "Please enter a valid email!";
    } elseif(strlen($createpassword) < 6 || strlen($confirmpassword) < 6) {
        $_SESSION['add-user'] = "Passwords should be at least 6 characters lenght.";
    } elseif(!$avatar['name']) {
        $_SESSION['add-user'] = "Please add an avatar.";
    } else {
        // Check if password match or not
        if($createpassword !== $confirmpassword) {
            $_SESSION['add-user'] = "Passwords should match, try again.";
        } else {
            // Hash passwords
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // Check if username already exists in DB
            $user_check_query = "SELECT * FROM Users WHERE username = " . $username . " OR email = " . $email . ";";
            $user_check_result = mysqli_query($connection, $user_check_query);

            if(mysqli_num_rows($user_check_result) > 0) {
                // Si la query a des rows, ca veut dire que l'user/l'email existe deja
                $_SESSION['add-user'] = "Username or Email already exists.";
            } else {
                // Rename Avatar
                $time = time(); // Make each img name unique by using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_temp_name = $avatar['temp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;

                // Make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);

                if(in_array($extension, $allowed_files)) {
                    // Make sure image is not too large
                    if($avatar['size'] < 1000000) {
                        // Upload avatar, FINALLY !
                        move_uploaded_file($avatar_temp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['add-user'] = "File size too big. Should be less than 1mb.";
                    }
                } else {
                    // If file is not an image:
                    $_SESSION['add-user'] = "File should be png, jpg or jpeg.";
                }
            }
        }
    }

    // Redirect back to SignUp page if there is any issue
    if($_SESSION['add-user']) {
        // Pass form data back to signup page
        $_SESSION['add-user-data'] = $_POST;
        header('location: ' . 'add-user.php');
        die();
    } else {
        // Insert new user into BDD table
        $insert_user_query = "INSERT INTO Users SET username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', isAdmin='$isAdmin';";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if(!mysqli_errno($connection)) {
            // Registration successful, redirect to Login page with success message
            $_SESSION['add-user-success'] = "New user created successfully!";
            header('location: ' . 'manage-users.php');
            die();
        }
    }

} else {
    // If button wasn't clicked, bounce back to SignIn page
    header('location: ' . 'add-user.php');
    die();
}