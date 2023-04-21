<?php
include 'partials/header.php';

// Fetch Users from BDD but not current User
$current_admin_id = $_SESSION['user-id'];
$query = "SELECT * FROM Users WHERE NOT idUser = '$current_admin_id';";
$users = mysqli_query($connection, $query);
?>

    <!-- ========== MANAGE CATEGORIES ========== -->
    <section class="dashboard">
        <?php if(isset($_SESSION['add-user-success'])) : ?>
            <div class="alert_message success">
                <p>
                    <?=
                        $_SESSION['add-user-success'];
                        unset($_SESSION['add-user-success']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['edit-user-success'])) : ?>
            <div class="alert_message success">
                <p>
                    <?=
                        $_SESSION['edit-user-success'];
                        unset($_SESSION['edit-user-success']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['edit-user'])) : ?>
            <div class="alert_message error">
                <p>
                    <?=
                        $_SESSION['edit-user'];
                        unset($_SESSION['edit-user']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['delete-user-success'])) : ?>
            <div class="alert_message success">
                <p>
                    <?=
                        $_SESSION['delete-user-success'];
                        unset($_SESSION['delete-user-success']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['delete-user'])) : ?>
            <div class="alert_message error">
                <p>
                    <?=
                        $_SESSION['delete-user'];
                        unset($_SESSION['delete-user']);
                    ?>
                </p>
            </div>
        <?php endif ?>

        <div class="container dashboard_container">
            <aside>
                <ul>
                    <li>
                        <a href="add-post.php">
                            <h5>Add Post</h5>
                        </a>
                    </li>

                    <li>
                        <a href="index.php">
                            <h5>Manage Posts</h5>
                        </a>
                    </li>

                    <?php if(isset($_SESSION['user_is_admin'])) : ?>
                        <li>
                            <a href="add-user.php">
                                <h5>Add User</h5>
                            </a>
                        </li>

                        <li>
                            <a href="manage-users.php" class="active">
                                <h5>Manage Users</h5>
                            </a>
                        </li>

                        <li>
                            <a href="add-category.php">
                                <h5>Add Category</h5>
                            </a>
                        </li>

                        <li>
                            <a href="manage-categories.php">
                                <h5>Manage Category</h5>
                            </a>
                        </li>
                    <?php endif ?>
                    
                </ul>
            </aside>

            <main>
                <h2>Manage Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Admin?</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($user = mysqli_fetch_assoc($users)) : ?>
                            <tr>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['isAdmin'] ? 'Yes' : 'No' ?></td>
                                <td><a href="edit-user.php?id<?= $user['idUser'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="delete-user.php?id<?= $user['idUser'] ?>" class="btn sm danger">Delete</a></td>
                            </tr>
                        <?php endwhile ?>

                    </tbody>
                </table>
            </main>
        </div>
    </section>

<?php
include '../partials/footer.php';
?>