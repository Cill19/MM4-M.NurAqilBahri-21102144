<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["gambar_contoh"]["name"]);
$error = false;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["gambar_contoh"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $error = false;
    } else {
        echo "File is not an image.";
        $error = false;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $error = true;
}

if ($_FILES["gambar_contoh"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $error = true;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $error = true;
}

if ($error == true) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["gambar_contoh"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["gambar_contoh"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
   