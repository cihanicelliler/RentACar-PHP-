<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["Id"])) {
        $Id = Filter($_GET["Id"]);
    } else {
        $Id = "";
    }
    if (isset($_POST["sitename"])) {
        $SiteName = Filter($_POST["sitename"]);
    } else {
        $SiteName = "";
    }
    if (isset($_POST["sitetitle"])) {
        $sitetitle = Filter($_POST["sitetitle"]);
    } else {
        $sitetitle = "";
    }
    if (isset($_POST["sitedescription"])) {
        $sitedescription = Filter($_POST["sitedescription"]);
    } else {
        $sitedescription = "";
    }
    if (isset($_POST["sitekeywords"])) {
        $sitekeywords = Filter($_POST["sitekeywords"]);
    } else {
        $sitekeywords = "";
    }
    if (isset($_POST["sitecopyrighttext"])) {
        $sitecopyrighttext = Filter($_POST["sitecopyrighttext"]);
    } else {
        $sitecopyrighttext = "";
    }
    if (isset($_POST["sitelogo"])) {
        $sitelogo = Filter($_POST["sitelogo"]);
    } else {
        $sitelogo = "";
    }
    if (isset($_POST["siteemailadress"])) {
        $siteemailadress = Filter($_POST["siteemailadress"]);
    } else {
        $siteemailadress = "";
    }
    if (isset($_POST["siteemailpassword"])) {
        $siteemailpassword = Filter($_POST["siteemailpassword"]);
    } else {
        $siteemailpassword = "";
    }

    $SqlQuery = "UPDATE Settings SET 
 SiteName = :sitename, SiteTitle = :sitetitle, SiteDescription = :sitedescription, SiteKeywords = :sitekeywords , SiteCopyRightText = :sitecopyrighttext, SiteLogo = :sitelogo , SiteEmailAdress = :siteemailadress, SiteEmailPassword = :siteemailpassword WHERE id = :id";
    $ColorsQuery = $DbConnect->prepare($SqlQuery);
    $ColorsQuery->bindParam(':sitename', $SiteName);
    $ColorsQuery->bindParam(':sitetitle', $sitetitle);
    $ColorsQuery->bindParam(':sitedescription', $sitedescription);
    $ColorsQuery->bindParam(':sitekeywords', $sitekeywords);
    $ColorsQuery->bindParam(':sitecopyrighttext', $sitecopyrighttext);
    $ColorsQuery->bindParam(':sitelogo', $sitelogo);
    $ColorsQuery->bindParam(':siteemailadress', $siteemailadress);
    $ColorsQuery->bindParam(':siteemailpassword', $siteemailpassword);
    $ColorsQuery->bindParam(':id', $Id);
    $ColorsQuery->execute();

    header("Location:admin.php?AdminPageNo=11");
    exit();
} ?>
