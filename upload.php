<?php
// Specify the directory where uploaded files are stored
$uploadDirectory = 'uploads/';

// Check if the form was submitted
if(isset($_POST['submit'])) {
    // Check if there was an error uploading the file
    if($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Get the temporary location of the uploaded file
        $tempFile = $_FILES['file']['tmp_name'];
        
        // Get the original name of the uploaded file
        $fileName = $_FILES['file']['name'];

        // Move the file from the temporary location to the specified directory
        if(move_uploaded_file($tempFile, $uploadDirectory . $fileName)) {
            echo "<div class='message success'>File uploaded successfully.</div>";
        } else {
            echo "<div class='message error'>Error uploading file.</div>";
        }
    } else {
        echo "<div class='message error'>Error: " . $_FILES['file']['error'] . "</div>";
    }
}

// Get list of files in the directory
$files = glob($uploadDirectory . '*');
?>
