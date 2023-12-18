<?php
require 'config/database.php';

// get careers from data if careers button was clicked
if(isset($_POST['submit'])) {
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $position = filter_var($_POST['position'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cv_file = $_FILES['cv_file'];
    
    // validate input values
    if(!$fullname) {
        $_SESSION['careers'] = "Please enter your Full Name";
    } elseif (!$phone) {
        $_SESSION['careers'] = "Please enter your Phone Number";
    } elseif (!$email) {
        $_SESSION['careers'] = "Please enter your a valid Email";
    } elseif (!$position) {
        $_SESSION['careers'] = "Please enter your Position";
    } elseif (!$cv_file['name']) {
        $_SESSION['careers'] = "Please add CV File";
    } else {
       // check if username or email already exist in database
        
                // WORK ON CV FILE
                // rename CV FILE
                $time = time(); // make each image name unique using current timestamp
                $cv_file_name = $time . $cv_file['name'];
                $cv_file_tmp_name = $cv_file['tmp_name'];
                $cv_file_destination_path = 'cv_file/' . $cv_file_name;

                // make sure file is an image
                $allowed_files = ['pdf'];
                $extension = explode('.', $cv_file_name);
                $extension = end($extension);
                if (in_array($extension, $allowed_files)) {
                    // move sure images is not too large (2mb+)
                    if($cv_file['size'] < 2000000) {
                        // upload CV FILE
                        move_uploaded_file($cv_file_tmp_name, $cv_file_destination_path);
                    } else {
                        $_SESSION['careers'] = "File size too big. Should be less than 2mb";
                    }
                } else {
                    $_SESSION['careers'] = "File should be pdf";
                }
            }
        
    

    // redirect back to careers page if there was any problem
    if (isset($_SESSION['careers'])) {
        // pass form data back to careers page
        $_SESSION['careers-data'] = $_POST;
        header('location: ' . ROOT_URL . 'careers.php');
        die();
    } else {
        // insert new user into cv table
        $query = "INSERT INTO careers (fullname, phone, email, position, cv_file) VALUES ('$fullname', '$phone', '$email', '$position', '$cv_file_name')";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            // redirect to careers page with success message
            $_SESSION['careers-success'] = "Your cv has been submitted, we will contact you when the cv has been reviewed. Thank You.";
            header('location: ' . ROOT_URL . 'careers.php');
            die();
        }
    }
} else {
    // if careers button was not clicked, bounce back to careers page
    header('location: ' . ROOT_URL . 'careers.php');
    die();
}

