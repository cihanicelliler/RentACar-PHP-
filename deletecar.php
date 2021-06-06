<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["CarId"])) {
        $CarEx = Filter($_GET["CarId"]);
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");

    $SqlQuery = "DELETE FROM Cars WHERE Id = :carId";
    $Param = $CarEx;
    $CarsQuery = $DbConnect->prepare($SqlQuery);
    $CarsQuery->bindParam(':carId', $Param);
    $CarsQuery->execute();


    header("Location:admin.php?AdminPageNo=1");
    exit();
}
?>
