<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_POST["brandname"])) {
        $BrandName = Filter($_POST["brandname"]);
    } else {
        $BrandName = "";
    }


    $SqlQuery = "INSERT INTO  Brands (BrandName) VALUES (?) ";
    $BrandsQuery = $DbConnect->prepare($SqlQuery);
    $BrandsQuery->execute([$BrandName]);
    $BrandsCount = $BrandsQuery->rowCount();

    if ($BrandsCount > 0) {
        echo "<script type='text/javascript'>alert('Brand Added!');</script>";
        header("Location:admin.php?AdminPageNo=5");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Brand Couldn't Added!');</script>";
    }
}
?>