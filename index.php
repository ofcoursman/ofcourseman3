User

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>File Upload</title>
</head>
<body>
    <div class="container">
        <h2>Upload a File</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="file" class="custom-file-upload">Choose File</label>
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload File" name="submit">
        </form>

        <h2>Files Stored</h2>
        <ul class="uploaded-files">
        <?php
        // Specify the directory where uploaded files are stored
        $uploadDirectory = 'uploads/';
        
        // Get list of files in the directory
        $files = glob($uploadDirectory . '*');
        
        // Iterate through the files and display them
        foreach($files as $file) {
            // Get the file name
            $fileName = basename($file);
          // Display file name and create download link
        echo "<li><a href='download.php?file=$fileName'>$fileName</a></li>";
    }
        ?>
    </ul>

</body>
</html>