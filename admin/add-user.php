<?php
include 'partials/header.php';

// Get back form data if User tried to register and had an error
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;

// // Delete signup data session
unset($_SESSION['add-user-data']);
?>

    <!-- SECTION ADD A CATEGORY -->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add User</h2>

            <?php if(isset($_SESSION['add-user'])) : ?>
                <div class="alert_message error">
                    <p>
                        <?=
                            $_SESSION['add-user'];
                            unset($_SESSION['add-user']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

            <form action="add-user-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
                <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
                <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create Password">
                <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password">

                <select name="userrole">
                    <option value="0">Author</option>
                    <option value="0">Admin</option>
                </select>

                <div class="form_control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>

                <button type="submit" name="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>

<?php
include '../partials/footer.php';
?>