<?php
include 'partials/header.php';
?>

    <!-- SECTION ADD A CATEGORY -->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Category</h2>
            <div class="alert_message error">
                <p>
                    This is an error message
                </p>
            </div>
            <form action="#">
                <input type="text" placeholder="Title">
                <textarea rows="4" placeholder="Description"></textarea>

                <button type="submit" class="btn">Add category</button>
            </form>
        </div>
    </section>

<?php
include '../partials/footer.php';
?>