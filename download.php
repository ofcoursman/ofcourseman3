<?php
// Specify the directory where uploaded files are stored
$uploadDirectory = 'uploads/';

// Check if the file parameter is set in the URL
if(isset($_GET['file'])) {
    // Get the file name from the URL
    $fileName = $_GET['file'];
    // Construct the path to the file
    $filePath = $uploadDirectory . $fileName;
    
    // Check if the file exists
    if(file_exists($filePath)) {
        // Set headers to force download
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        // Read the file and output it to the browser
        readfile($filePath);
        exit;
    } else {
        // File not found, redirect to the main page or show an error message
        header("Location: index.php");
        exit;
    }
} else {
    // If file parameter is not set, redirect to the main page
    header("Location: index.php");
    exit;
}
?>
