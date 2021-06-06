<?php

if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_POST["colorname"])) {
        $ColorName = Filter($_POST["colorname"]);
    } else {
        $ColorName = "";
    }


    $SqlQuery = "INSERT INTO  Colors (ColorName) VALUES (?) ";
    $ColorsQuery = $DbConnect->prepare($SqlQuery);
    $ColorsQuery->execute([$ColorName]);
    $ColorsCount = $ColorsQuery->rowCount();

    if ($ColorsCount > 0) {
        echo "<script type='text/javascript'>alert('Color Added!');</script>";
        header("Location:admin.php?AdminPageNo=7");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Color Couldn't Added!');</script>";
    }
}
?>
