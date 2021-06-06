<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    $ColorsQuery = $DbConnect->prepare("SELECT * FROM Colors");
    $ColorsQuery->execute();
    $ColorsCount = $ColorsQuery->rowCount();
    $Colors = $ColorsQuery->fetchAll(PDO::FETCH_ASSOC);
?>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Color Id</th>
                <th>Color Name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Colors as $Color) { ?>
                <tr>
                    <td><?php echo $Color["ColorId"]; ?></td>
                    <td><?php echo $Color["ColorName"]; ?></td>
                    <td><button class="ui red button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=24&ColorId=<?php echo $Color["ColorId"] ?>"><i class="icon ui ban"></i> Delete</a></button> </td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=25&ColorId=<?php echo $Color["ColorId"] ?>"><i class="ui icon exclamation circle"></i>Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>