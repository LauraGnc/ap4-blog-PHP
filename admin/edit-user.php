<?php
include 'partials/header.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM Users WHERE idUser = '$id';";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
} else {
    header('location: ' . 'manage-users.php');
    die();
}
?>

    <!-- SECTION ADD A CATEGORY -->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit User</h2>

            <form action="edit-user-logic.php" method="POST">
                <input type="hidden" name="id" value="<?= $user['idUser'] ?>">
                <input type="text" name="username" value="<?= $user['username'] ?>" placeholder="Username">
                <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Email">

                <select name="userrole">
                    <option value="0">Author</option>
                    <option value="0">Admin</option>
                </select>

                <button type="submit" name="submit" class="btn">Update User</button>
            </form>
        </div>
    </section>

<?php
include '../partials/footer.php';
?>