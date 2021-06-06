<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {

    if (isset($_GET["UserId"])) {
        $UserEx = Filter($_GET["UserId"]);
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");

    $SqlQuery = "DELETE FROM Users WHERE Id = :userId";
    $Param = $UserEx;
    $BrandsQuery = $DbConnect->prepare($SqlQuery);
    $BrandsQuery->bindParam(':userId', $Param);
    $BrandsQuery->execute();


    header("Location:admin.php?AdminPageNo=3");
    exit();
}
?>
