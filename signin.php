<?php
include 'config/constants.php';
include 'partials/header.php';

// Get back form data if User tried to register and had an error
$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

// Delete signup data session
unset($_SESSION['signin-data']);
?>

    <!-- ========== SIGN IN / LOGIN ========== -->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign In</h2>

            <?php if(isset($_SESSION['signup-success'])) : ?>
                <div class="alert_message success">
                    <p>
                        <?=
                            $_SESSION['signup-success'];
                            unset($_SESSION['signup-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['signin-data'])) : ?>
                <div class="alert_message error">
                    <p>
                        <?=
                            $_SESSION['signin'];
                            unset($_SESSION['signin']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

            <form action="signin-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="Username or Email"><br>
                <input type="password" name="password" value="<?= $password ?>" placeholder="Password"><br><br>

                <button type="submit" name="submit" class="btn">Sign In</button><br>

                <small>Dont have an account? <a href="signup.php">Sign up</a>!</small>
            </form>
        </div>
    </section>

<?php
include 'partials/footer.php';
?>