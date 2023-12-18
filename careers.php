<?php
include 'partials/header.php';

// get back form data if there was a regestration error
$fullname = $_SESSION['careers-data']['fullname'] ?? null;
$phone = $_SESSION['careers-data']['phone'] ?? null;
$email = $_SESSION['careers-data']['email'] ?? null;
$position = $_SESSION['careers-data']['position'] ?? null;
// delete careers data session 
unset($_SESSION['careers-data']);

?>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Careers</h2>
            <?php if(isset($_SESSION['careers-success'])): ?>
            <div class="alert__message success">
                <p>
                    <?= $_SESSION['careers-success'];
                    unset($_SESSION['careers-success']);
                    ?>
                </p>
            </div>
            <?php elseif (isset($_SESSION['careers'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['careers'];
                    unset($_SESSION['careers']);
                    ?>
                </p>
            </div>
            <?php endif ?>
            <form action="<?=ROOT_URL ?>careers-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="fullname" value="<?= $fullname ?>" placeholder="Fullname">
                <input type="text" name="phone" value="<?= $phone ?>" placeholder="Phone Number">
                <input type="email" name="email" value="<?= $email ?>" placeholder="Email Address">
                <label for="position">Position</label>
                <select name="position">
                    <option selected>--- Choose the position ---</option>
                    <option value="Radio Network Planning">Radio Network Planning</option>
                    <option value="Radio Network Optimatization">Radio Network Optimatization</option>
                    <option value="Drive Test Measurement & Analysys">Drive Test Measurement & Analysys</option>
                    <option value="Transmisison Network Planning">Transmisison Network Planning</option>
                    <option value="Network RollOut Installation">Network RollOut Installation</option>
                    <option value="Financial Planning & Analysys">Financial Planning & Analysys</option>
                </select>
                <div class="form__control">
                    <label for="cv_file">File CV (formats .pdf)</label>
                    <input type="file" name="cv_file" id="cv_file">
                </div>
                <button type="submit" name="submit" class="btn">Submit</button>
            </form>
    </div>
</section>



<?php
include 'partials/footer.php';

?>
