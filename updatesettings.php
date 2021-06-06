<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["Id"])) {
        $SettingsId = $_GET["Id"];
    } else {
        $SettingsId = "";
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");
    $SettingsQuery = $DbConnect->prepare("SELECT * FROM Settings");
    $SettingsQuery->execute();
    $SettingsCount = $SettingsQuery->rowCount();
    $Settings = $SettingsQuery->fetchAll(PDO::FETCH_ASSOC);

?>
    <div class="ui modal update-car" style="height: 55rem">
        <i class="close icon"></i>
        <div class="ui text-primary header text-center">UPDATE SETTINGS</div>
        <form class="ui form login-form" action="admin.php?AdminPageNo=33&Id=<?php foreach ($Settings as $Setting) {
                                                                                    if ($Setting["id"] == $SettingsId) {
                                                                                        echo $Setting["id"];
                                                                                    }
                                                                                } ?>" method="post">
            <br />
            <div class="disabled field mx-5">
                <label>Id</label>
                <input placeholder="<?php foreach ($Settings as $Setting) {
                                        if ($Setting["id"] == $SettingsId) {
                                            echo $Setting["id"];
                                        }
                                    } ?>" type="text" disabled="" tabindex="-1">
            </div>

            <div class="field mx-5">
                <label class="text-primary">Site Name</label>
                <input type="text" name="sitename" placeholder="<?php foreach ($Settings as $Setting) {
                                                                    if ($Setting["id"] == $SettingsId) {
                                                                        echo $Setting["SiteName"];
                                                                    }
                                                                } ?>" />
            </div>

            <div class="field mx-5">
                <label class="text-primary">Site Title</label>
                <input type="text" name="sitetitle" placeholder="<?php foreach ($Settings as $Setting) {
                                                                        if ($Setting["id"] == $SettingsId) {
                                                                            echo $Setting["SiteTitle"];
                                                                        }
                                                                    } ?>" />
            </div>
            <div class="field mx-5">
                <label class="text-primary">Site Description</label>
                <input type="text" name="sitedescription" placeholder="<?php foreach ($Settings as $Setting) {
                                                                            if ($Setting["id"] == $SettingsId) {
                                                                                echo $Setting["SiteDescription"];
                                                                            }
                                                                        } ?>" />
            </div>
            <div class="field mx-5">
                <label class="text-primary">Site Keywords</label>
                <input type="text" name="sitekeywords" placeholder="<?php foreach ($Settings as $Setting) {
                                                                        if ($Setting["id"] == $SettingsId) {
                                                                            echo $Setting["SiteKeywords"];
                                                                        }
                                                                    } ?>" />
            </div>
            <div class="field mx-5">
                <label class="text-primary">Site Copyright Text</label>
                <input type="text" name="sitecopyrighttext" placeholder="<?php foreach ($Settings as $Setting) {
                                                                                if ($Setting["id"] == $SettingsId) {
                                                                                    echo $Setting["SiteCopyRightText"];
                                                                                }
                                                                            } ?>" />
            </div>
            <div class="field mx-5">
                <label class="text-primary">Site Logo</label>
                <input type="text" name="sitelogo" placeholder="<?php foreach ($Settings as $Setting) {
                                                                    if ($Setting["id"] == $SettingsId) {
                                                                        echo $Setting["SiteLogo"];
                                                                    }
                                                                } ?>" />
            </div>
            <div class="field mx-5">
                <label class="text-primary">Site Email Address</label>
                <input type="text" name="siteemailadress" placeholder="<?php foreach ($Settings as $Setting) {
                                                                            if ($Setting["id"] == $SettingsId) {
                                                                                echo $Setting["SiteEmailAdress"];
                                                                            }
                                                                        } ?>" />
            </div>
            <div class="field mx-5">
                <label class="text-primary">Site Email Password</label>
                <input type="text" name="siteemailpassword" placeholder="<?php foreach ($Settings as $Setting) {
                                                                                if ($Setting["id"] == $SettingsId) {
                                                                                    echo $Setting["SiteEmailPassword"];
                                                                                }
                                                                            } ?>" />
            </div>
            <div class="field mx-5">
                <button class="ui green button login fluid" type="submit">Update</button>
            </div>
        </form>
    </div>
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