<?php

if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {

    if (isset($_GET["BrandId"])) {
        $BrandEx = Filter($_GET["BrandId"]);
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");

    $SqlQuery = "DELETE FROM Brands WHERE BrandId = :brandId";
    $Param = $BrandEx;
    $BrandsQuery = $DbConnect->prepare($SqlQuery);
    $BrandsQuery->bindParam(':brandId', $Param);
    $BrandsQuery->execute();


    header("Location:admin.php?AdminPageNo=5");
    exit();
}
?>