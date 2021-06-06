<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    $CarImagesQuery = $DbConnect->prepare("SELECT * FROM CarImages");
    $CarImagesQuery->execute();
    $CarImagesCount = $CarImagesQuery->rowCount();
    $CarImages = $CarImagesQuery->fetchAll(PDO::FETCH_ASSOC);
?>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Car Id</th>
                <th>Image</th>
                <th>Created Date</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($CarImages as $CarImage) { ?>
                <tr>
                    <td><?php echo $CarImage["Id"]; ?></td>
                    <td><?php echo $CarImage["CarId"]; ?></td>
                    <td><?php echo $CarImage["ImagePath"]; ?></td>
                    <td><?php echo $CarImage["CreatedDate"]; ?></td>
                    <td><button class="ui red button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=28&ImageId=<?php echo $CarImage["Id"] ?>"><i class="ui icon ban"></i> Delete</a></button> </td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=29&ImageId=<?php echo $CarImage["Id"] ?>"><i class="ui icon exclamation circle"></i>Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>