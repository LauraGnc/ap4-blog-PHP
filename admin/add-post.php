<?php
include 'partials/header.php';
?>

    <!-- SECTION ADD A CATEGORY -->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Post</h2>
            <div class="alert_message error">
                <p>
                    This is an error message
                </p>
            </div>

            <form action="#" enctype="multipart/form-data">
                <input type="text" placeholder="Title">
                <select>
                    <option value="0">Art</option>
                    <option value="1">Wild Life</option>
                    <option value="2">Travel</option>
                    <option value="3">Science</option>
                    <option value="4">Food</option>
                    <option value="5">Music</option>
                </select>
                <textarea rows="10" placeholder="Body"></textarea>

                <div class="form_control">
                    <input type="checkbox" id="is_featured">
                    <label for="is_featured">Featured in Homepage</label>
                </div>

                <div class="form_control">
                    <label for="thumbnail">Add thumbnail</label>
                    <input type="file" id="thumbnail">
                </div>

                <button type="submit" class="btn">Add post</button>
            </form>
        </div>
    </section>

<?php
include '../partials/footer.php';
?>