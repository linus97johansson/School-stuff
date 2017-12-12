<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css"/>
    <title>Upload</title>
</head>
<body>
<div class="mainWrapper">
    <?php
    include_once "php/menu.php";
    ?>
    <div class="mainBody">

        <div>
            <?php

            if(isset($_POST["submit"])) {
                $error = "";
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                var_dump($target_file);

                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false) {
                    $safe = true;
                } else {
                    $safe = false;
                    $error .= "Your file was not an image!";
                }
                if($_FILES['image']['size'] > 1000000){
                    $safe=false;
                    $error = "Your file was too large!";
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    $error = "Your fileformat was not supported!";
                    $safe = false;
                }
                if ($safe == false) {
                    echo "Sorry, your file was not uploaded.";
                    print $error;
// if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                        header("location: galery.php");
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }


            ?>
        </div>

        <form method="post" enctype="multipart/form-data">
            <input type="file" accept="image/*" name="image">
            <input type="submit" name="submit">
        </form>
    </div>
    <?php
    include_once("php/footer.php");
    ?>
</div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Linus
 * Date: 2017-12-04
 * Time: 10:55
 */