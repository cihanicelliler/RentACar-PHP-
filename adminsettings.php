<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    $SettingQuery = $DbConnect->prepare("SELECT * FROM Settings");
    $SettingQuery->execute();
    $SettingsCount = $SettingQuery->rowCount();
    $Settings = $SettingQuery->fetchAll(PDO::FETCH_ASSOC);
?>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Site Name</th>
                <th>Site Title</th>
                <th>Site Description</th>
                <th>Site Keywords</th>
                <th>Site Copyright Text</th>
                <th>Site Logo</th>
                <th>Site Email Address</th>
                <th>Site Email Password</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Settings as $Setting) { ?>
                <tr>
                    <td><?php echo $Setting["id"]; ?></td>
                    <td><?php echo $Setting["SiteName"]; ?></td>
                    <td><?php echo $Setting["SiteTitle"]; ?></td>
                    <td><?php echo $Setting["SiteDescription"]; ?></td>
                    <td><?php echo $Setting["SiteKeywords"]; ?></td>
                    <td><?php echo $Setting["SiteCopyRightText"]; ?></td>
                    <td><?php echo $Setting["SiteLogo"]; ?></td>
                    <td><?php echo $Setting["SiteEmailAdress"]; ?></td>
                    <td><?php echo $Setting["SiteEmailPassword"]; ?></td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=32&Id=<?php echo $Setting["id"] ?>"><i class="ui icon exclamation circle"></i>Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>