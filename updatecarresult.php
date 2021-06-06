<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["CarId"])) {
        $CarId = Filter($_GET["CarId"]);
    } else {
        $CarId = "";
    }
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
    $SqlQuery = "UPDATE Cars SET 
 BrandId= :brandId, 
 ColorId = :colorId, 
 DescriptionCar = :descriptionCar, 
 ModelYear = :modelYear, 
 DailyPrice = :dailyPrice WHERE Id = :carId";
    $CarsQuery = $DbConnect->prepare($SqlQuery);
    $CarsQuery->bindParam(':brandId', $BrandId);
    $CarsQuery->bindParam(':colorId', $ColorId);
    $CarsQuery->bindParam(':descriptionCar', $DescriptionCar);
    $CarsQuery->bindParam(':modelYear', $ModelYear);
    $CarsQuery->bindParam(':dailyPrice', $DailyPrice);
    $CarsQuery->bindParam(':carId', $CarId);
    $CarsQuery->execute();

    header("Location:admin.php?AdminPageNo=1");
    exit();
}
?>
