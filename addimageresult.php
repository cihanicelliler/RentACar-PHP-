<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_POST["carid"])) {
        $CarId = Filter($_POST["carid"]);
    } else {
        $CarId = "";
    }
    if (isset($_POST["imagefile"])) {
        $ImageFile = Filter($_POST["imagefile"]);
    } else {
        $ImageFile = "";
    }

    $target_dir = "Images/";
    $target_file = $target_dir . basename($_FILES["imagefile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagefile"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["imagefile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["imagefile"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    $SqlQuery = "INSERT INTO CarImages (CarId,ImagePath,CreatedDate) VALUES(?,?,?)";
    $CarImagesQuery = $DbConnect->prepare($SqlQuery);
    $CarImagesQuery->execute([$CarId, basename($_FILES["imagefile"]["name"]), $DateTime]);
    $CarImagesCount = $CarImagesQuery->rowCount();

    if ($CarImagesCount > 0) {
        echo "<script type='text/javascript'>alert('Image Added!');</script>";
        header("Location:admin.php?AdminPageNo=9");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Image Couldn't Added!');</script>";
    }
}
?>
