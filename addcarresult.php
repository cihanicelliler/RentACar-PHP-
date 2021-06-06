<?php

if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_POST["brandId"])) {
        $BrandId = Filter($_POST["brandId"]);
    } else {
        $BrandId = "";
    }
    if (isset($_POST["colorId"])) {
        $ColorId = Filter($_POST["colorId"]);
    } else {
        $ColorId = "";
    }
    if (isset($_POST["descriptionCar"])) {
        $DescriptionCar = Filter($_POST["descriptionCar"]);
    } else {
        $DescriptionCar = "";
    }
    if (isset($_POST["modelYear"])) {
        $ModelYear = Filter($_POST["modelYear"]);
    } else {
        $ModelYear = "";
    }
    if (isset($_POST["dailyPrice"])) {
        $DailyPrice = Filter($_POST["dailyPrice"]);
    } else {
        $DailyPrice = "";
    }
    $SqlQuery = "INSERT INTO Cars (BrandId,ColorId,DescriptionCar,ModelYear,DailyPrice) VALUES (?,?,?,?,?) ";
    $CarsQuery = $DbConnect->prepare($SqlQuery);
    $CarsQuery->execute([$BrandId, $ColorId, $DescriptionCar, $ModelYear, $DailyPrice]);

    header("Location:admin.php?AdminPageNo=1");
    exit();
}
?>
