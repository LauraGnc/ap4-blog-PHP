<?php
include 'config/constants.php';
include 'partials/header.php';

// Get back form data if User tried to register and had an error
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

// Delete signup data session
unset($_SESSION['signup-data']);
?>

    <!-- ========== SIGN UP / REGISTRER ========== -->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign Up</h2>

            <?php if(isset($_SESSION['signup'])) : ?>
                <div class="alert_message error">
                    <p>
                        <?=
                            $_SESSION['signup'];
                            unset($_SESSION['signup']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

            <form action="signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username"><br>
                <input type="email" name="email" value="<?= $email ?>" placeholder="Email"><br>
                <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create Password"><br>
                <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password"><br><br>

                <div class="form_control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div><br><br>

                <button type="submit" name="submit" class="btn">Sign Up Now</button><br>

                <small>Already have an account? <a href="signin.php">Sign in</a>!</small>
            </form>
        </div>
    </section>

<?php
include 'partials/footer.php';
?>