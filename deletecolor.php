<?php

if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["ColorId"])) {
        $ColorEx = Filter($_GET["ColorId"]);
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");

    $SqlQuery = "DELETE FROM Colors WHERE ColorId = :colorId";
    $Param = $ColorEx;
    $ColorsQuery = $DbConnect->prepare($SqlQuery);
    $ColorsQuery->bindParam(':colorId', $Param);
    $ColorsQuery->execute();


    header("Location:admin.php?AdminPageNo=7");
    exit();
}
?>
