<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["ImageId"])) {
        $ImageEx = Filter($_GET["ImageId"]);
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");

    $SqlQuery = "DELETE FROM CarImages WHERE Id = :id";
    $Param = $ImageEx;
    $ImagesQuery = $DbConnect->prepare($SqlQuery);
    $ImagesQuery->bindParam(':id', $Param);
    $ImagesQuery->execute();


    header("Location:admin.php?AdminPageNo=9");
    exit();
}
?>
