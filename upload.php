<?php

include 'config.php';

if (isset($_POST['upload'])) {
    $location = "uploads/";
    $file_new_name = date("dmy") . time() . $_FILES["file"]["name"];
    $file_name = $_FILES["file"]["name"];
    $file_temp = $_FILES["file"]["tmp_name"];
    $file_size = $_FILES["file"]["size"];

    if ($file_size > 10485760) {
        echo "<script>alert('Whoops! File is too big. Maximum file size allowable for upload 10MB')</script>";
    } else {
        $sql = "INSERT INTO upload_files(name, new_name)
                VALUES ('$file_name', '$file_new_name')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            move_uploaded_file($file_temp, $location . $file_new_name);
            echo "<script>alert('Great! File uploaded successfully.')</script>";
        } else {
            echo "<script>alert('Woops! Something went wrong.')</script>";
        }
    }
}


?>







<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cherish Staffing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/67e385a821.js" crossorigin="anonymous"></script>
</head>

<body class="style">
    <div class="big-container">
        <div class="container">
            <header>
                <div class="logo">
                    <h1>Cherish Staffing</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="upload.php">Upload</a></li>

                    </ul>
                </nav>

            </header>

            <div class="file_upload">
                <div class="header1">
                    <p><i class="fas fa-cloud-upload-alt fa-2x"></i><span><span>Up</span>load</span></p>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" class="body">
                    <input type="file" name="file" id="upload" required>
                    <label for="upload">
                        <i class="fas fa-folder-open fa-3x"></i>
                        <p>
                            <strong>Drag and drop</strong> files here<br> or <span>browse</span> to begin the upload.
                        </p>
                    </label>
                    <button name="upload" class="btn">Upload</button>
                </form>
            </div>




        </div>
    </div>


</body>

<script src="script.js">

</script>

</html>