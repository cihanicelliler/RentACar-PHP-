<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_POST["email"])) {
        $Email = Filter($_POST["email"]);
    } else {
        $Email = "";
    }
    if (isset($_POST["password"])) {
        $Password = Filter($_POST["password"]);
    } else {
        $Password = "";
    }
    if (isset($_POST["nameandsurname"])) {
        $NameAndSurname = Filter($_POST["nameandsurname"]);
    } else {
        $NameAndSurname = "";
    }
    if (isset($_POST["telephone"])) {
        $Telephone = Filter($_POST["telephone"]);
    } else {
        $Telephone = "";
    }
    $md5Password = md5($Password);

    $SqlQuery = "INSERT INTO  Users (Email,Password,IpAddress,DateOfRegistration,NameAndSurname,Telephone) VALUES (?,?,?,?,?,?) ";
    $UsersQuery = $DbConnect->prepare($SqlQuery);
    $UsersQuery->execute([$Email, $md5Password, $IpAddress, $DateTime, $NameAndSurname, $Telephone]);
    $UsersCount = $UsersQuery->rowCount();

    if ($UsersCount > 0) {
        echo "<script type='text/javascript'>alert('User Added!');</script>";
        header("Location:admin.php?AdminPageNo=3");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('User Couldn't Added!');</script>";
    }
}
?>