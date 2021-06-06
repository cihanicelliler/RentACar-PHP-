<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["ColorId"])) {
        $ColorId = Filter($_GET["ColorId"]);
    } else {
        $ColorId = "";
    }
    if (isset($_POST["colorname"])) {
        $ColorName = Filter($_POST["colorname"]);
    } else {
        $ColorName = "";
    }


    $SqlQuery = "UPDATE Colors SET 
 ColorName = :colorname WHERE ColorId = :colorId";
    $ColorsQuery = $DbConnect->prepare($SqlQuery);
    $ColorsQuery->bindParam(':colorname', $ColorName);
    $ColorsQuery->bindParam(':colorId', $ColorId);
    $ColorsQuery->execute();

    header("Location:admin.php?AdminPageNo=7");
    exit();
} ?>
