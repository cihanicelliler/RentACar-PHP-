<?php
try {
    $DbConnect = new PDO("mysql:host=sql202.epizy.com;dbname=epiz_28767547_rentacar;charset=utf8", "epiz_28767547", "S9upsnroOn8JL");
    //echo "Connection Succeed";
} catch (PDOException $error) {
    echo "Connection error<br>" . $error->getMessage();
    die();
}

$SettingsQuery = $DbConnect->prepare("SELECT * FROM Settings LIMIT 1");
$SettingsQuery->execute();
$SettingsCount = $SettingsQuery->rowCount();
$Settings = $SettingsQuery->fetch(PDO::FETCH_ASSOC);

if ($SettingsCount > 0) {
    $SiteName = $Settings["SiteName"];
    $SiteTitle = $Settings["SiteTitle"];
    $SiteDescription = $Settings["SiteDescription"];
    $SiteKeywords = $Settings["SiteKeywords"];
    $SiteCopyRightText = $Settings["SiteCopyRightText"];
    $SiteLogo = $Settings["SiteLogo"];
    $SiteEmailAdress = $Settings["SiteEmailAdress"];
    $SiteEmailPassword = $Settings["SiteEmailPassword"];
} else {
    echo "Settings Count error<br>" . $error->getMessage();
    die();
}

if (isset($_SESSION["User"])) {
    $SqlQuery="SELECT * FROM Users WHERE Email = :email  LIMIT 1";
    $UsersQuery = $DbConnect->prepare($SqlQuery);
    $Param=$_SESSION["User"];
    $UsersQuery->bindParam(':email',$Param);
    $UsersQuery->execute();
    $UsersCount = $UsersQuery->rowCount();
    $Users = $UsersQuery->fetch(PDO::FETCH_ASSOC);

    if ($UsersCount > 0) {
        $Id = $Users["Id"];
        $Email = $Users["Email"];
        $Password = $Users["Password"];
        $IPAddress = $Users["IPAddress"];
        $DateOfRegistration = $Users["DateOfRegistration"];
        $NameAndSurname = $Users["NameAndSurname"];
        $Telephone = $Users["Telephone"];
    } else {
        echo "Users Count error<br>" . $error->getMessage();
        die();
    }
}
