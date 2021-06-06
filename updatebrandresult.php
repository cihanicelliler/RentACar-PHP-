<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["BrandId"])) {
        $BrandId = Filter($_GET["BrandId"]);
    } else {
        $BrandId = "";
    }
    if (isset($_POST["brandname"])) {
        $BrandName = Filter($_POST["brandname"]);
    } else {
        $BrandName = "";
    }


    $SqlQuery = "UPDATE Brands SET 
 BrandName = :brandname WHERE BrandId = :brandId";
    $UsersQuery = $DbConnect->prepare($SqlQuery);
    $UsersQuery->bindParam(':brandname', $BrandName);
    $UsersQuery->bindParam(':brandId', $BrandId);
    $UsersQuery->execute();

    header("Location:admin.php?AdminPageNo=5");
    exit();
}
?>
