<!-- update_m_image.php

Updates all images of type w

Created by The Exceptions (Justin, Paul, Zack, Behram, Bradley)
-->

<?php
if(isset($_POST["update_w_image"])) {
$target_dir = "/home/pklene/dynamic_php/uploads/";
$target_file = $target_dir . "weekly_image.jpg";
$uploadOk = 1;
echo $target_dir . "<br>";
echo $target_file . "<br>";
echo $_POST['image_to_upload2'] . "<br>";
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image_to_upload2"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check file size
if ($_FILES["image_to_upload2"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image_to_upload2"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image_to_upload2"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>
