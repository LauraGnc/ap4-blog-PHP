<?php
include 'partials/header.php';
?>

    <!-- ========== MANAGE CATEGORIES ========== -->
    <section class="dashboard">
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
                            <a href="manage-users.php">
                                <h5>Manage Users</h5>
                            </a>
                        </li>

                        <li>
                            <a href="add-category.php">
                                <h5>Add Category</h5>
                            </a>
                        </li>

                        <li>
                            <a href="manage-categories.php" class="active">
                                <h5>Manage Category</h5>
                            </a>
                        </li>
                    <?php endif ?>
                    
                </ul>
            </aside>

            <main>
                <h2>Manage Categories</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Travel</td>
                            <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Wild Life</td>
                            <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Music</td>
                            <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </main>
        </div>
    </section>

<?php
include '../partials/footer.php';
?>