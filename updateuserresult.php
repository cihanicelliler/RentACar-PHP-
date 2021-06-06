<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["UserId"])) {
        $UserId = Filter($_GET["UserId"]);
    } else {
        $UserId = "";
    }
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


    $SqlQuery = "UPDATE Users SET 
 Email = :email,
 Password= :password, 
 NameAndSurname = :nameandsurname, 
 Telephone = :telephone WHERE Id = :id";
    $UsersQuery = $DbConnect->prepare($SqlQuery);
    $UsersQuery->bindParam(':email', $Email);
    $UsersQuery->bindParam(':password', $md5Password);
    $UsersQuery->bindParam(':nameandsurname', $NameAndSurname);
    $UsersQuery->bindParam(':telephone', $Telephone);
    $UsersQuery->bindParam(':id', $UserId);
    $UsersQuery->execute();

    header("Location:admin.php?AdminPageNo=3");
    exit();
}
?>
