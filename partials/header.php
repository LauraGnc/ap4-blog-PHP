<?php
require '../config/database.php';

// Fetch current user from BDD
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM Users WHERE idUser = '$id';";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AP4 - Blog Website</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- ========== NAVBAR ========== -->
    <nav>
        <div class="container nav_container">
            <a href="index.php" class="nav_logo">AP4 Blog</a>

            <ul class="nav_items">
                <li><a href="../blog.php">Blog</a></li>
                <li><a href="../index.php">About</a></li>
                <li><a href="../index.php">Services</a></li>
                <li><a href="../index.php">Contact</a></li>

                <?php if(isset($_SESSION['user-id'])) : ?>
                    <li class="nav_profile">
                        <div class="avatar">
                            <img src="<?= '../images/' . $avatar['avatar'] ?>">
                        </div>
                        <ul>
                            <li><a href="../admin/index.php">Dashboard</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="../signin.php" class="nav_logo">Signin</a></li>
                <?php endif ?>
            </ul>
        </div>
    </nav>