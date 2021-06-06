<?php
$IpAddress = $_SERVER["REMOTE_ADDR"];
$TimeStamp = time();
$DateTime = date("Y.m.d", $TimeStamp);

function DeleteAllExceptNumbers($Value)
{
    $Operation = preg_replace("/[^0-9]/", "", $Value);
    return $Operation;
}

function RevertConversions($Value)
{
    $MakeDisable = htmlspecialchars_decode($Value, ENT_QUOTES);
    return $MakeDisable;
}



function Filter($Value)
{
    $DeleteSpace = trim($Value);
    $DeleteTag = strip_tags($DeleteSpace);
    $MakeDisable = htmlspecialchars($DeleteTag, ENT_QUOTES);
    $Result = $MakeDisable;
    return $Result;
}
function FilterNumberedContents($Value)
{
    $DeleteSpace = trim($Value);
    $DeleteTag = strip_tags($DeleteSpace);
    $MakeDisable = htmlspecialchars($DeleteTag, ENT_QUOTES);
    $Clean = DeleteAllExceptNumbers($MakeDisable);
    $Result = $Clean;
    return $Result;
}
