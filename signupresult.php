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
if (isset($_POST["passwordrepeat"])) {
    $PasswordRepeatEx = Filter($_POST["passwordrepeat"]);
} else {
    $PasswordRepeatEx = "";
}
if (isset($_POST["passwordrepeat"])) {
    $PasswordRepeatEx = Filter($_POST["passwordrepeat"]);
} else {
    $PasswordRepeatEx = "";
}
if (isset($_POST["passwordrepeat"])) {
    $PasswordRepeatEx = Filter($_POST["passwordrepeat"]);
} else {
    $PasswordRepeatEx = "";
}
if (isset($_POST["nameandsurname"])) {
    $NameAndSurnameEx = Filter($_POST["nameandsurname"]);
} else {
    $NameAndSurnameEx = "";
}
if (isset($_POST["telephone"])) {
    $TelephoneEx = Filter($_POST["telephone"]);
} else {
    $TelephoneEx = "";
}

$Md5Password = md5($PasswordEx);


if (($EmailEx != "") and ($PasswordEx != "") and ($PasswordRepeatEx != "") and ($NameAndSurnameEx != "") and ($TelephoneEx != "")) {
    if ($PasswordEx != $PasswordRepeatEx) {
        header("Location:index.php?PageNo=6");
        exit();
    } else {
        $ControlQuery = $DbConnect->prepare("SELECT * FROM Users WHERE Email = ? LIMIT 1");
        $ControlQuery->execute([$EmailEx]);
        $ControlCounts = $ControlQuery->rowCount();

        if ($ControlCounts > 0) {
            header("Location:index.php?PageNo=7");
            exit();
        } else {
            $SignUpQuery = $DbConnect->prepare("INSERT INTO  Users (Email,Password,IpAddress,DateOfRegistration,NameAndSurname,Telephone) VALUES (?,?,?,?,?,?)");
            $SignUpQuery->execute([$EmailEx, $Md5Password, $IpAddress, $DateTime, $NameAndSurnameEx, $TelephoneEx]);
            $SignUpControl = $SignUpQuery->rowCount();
            if ($SignUpControl > 0) {
                echo "<script type='text/javascript'>alert('Sign Up Success!');</script>";
                header("Location:index.php?PageNo=10");
                exit();
            } else {
                header("Location:index.php?PageNo=8");
                exit();
            }
        }
    }
} else {
    header("Location:index.php?PageNo=9");
    exit();
}
