<?php
if (isset($_POST["email"])) {
    $EmailEx = Filter($_POST["email"]);
} else {
    $EmailEx = "";
}
if (isset($_POST["password"])) {
    $PasswordEx = Filter($_POST["password"]);
} else {
    $PasswordEx = "";
}
$Md5Password = md5($PasswordEx);
if (($EmailEx != "") and ($PasswordEx != "")) {
    $ControlQuery = $DbConnect->prepare("SELECT * FROM Users WHERE Email = ? AND Password = ? LIMIT 1");
    $ControlQuery->execute([$EmailEx, $Md5Password]);
    $ControlCounts = $ControlQuery->rowCount();
    $Control = $ControlQuery->fetch(PDO::FETCH_ASSOC);

    if ($ControlCounts > 0) {
        $_SESSION["User"]=$EmailEx;
        if ($_SESSION["User"]==$EmailEx) {
            header("Location:index.php?PageNo=1");
            exit();
        } else {
            header("Location:index.php?PageNo=8");
            exit();
        }
        
    } else {
        header("Location:index.php?PageNo=12");
        exit();
    }
} else {
    header("Location:index.php?PageNo=13");
    exit();
}
