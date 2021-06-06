<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    $CarsQuery = $DbConnect->prepare("SELECT * FROM Cars");
    $CarsQuery->execute();
    $CarsCount = $CarsQuery->rowCount();
    $Cars = $CarsQuery->fetchAll(PDO::FETCH_ASSOC);
?>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Brand Id</th>
                <th>Color Id</th>
                <th>Description Car</th>
                <th>Model Year</th>
                <th>Daily Price</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Cars as $Car) { ?>
                <tr>
                    <td><?php echo $Car["Id"]; ?></td>
                    <td><?php echo $Car["BrandId"]; ?></td>
                    <td><?php echo $Car["ColorId"]; ?></td>
                    <td><?php echo $Car["DescriptionCar"]; ?></td>
                    <td><?php echo $Car["ModelYear"]; ?></td>
                    <td><?php echo $Car["DailyPrice"]; ?></td>
                    <td><button class="ui red button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=12&CarId=<?php echo $Car["Id"] ?>"><i class="ui icon ban"></i> Delete</a></button> </td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=13&CarId=<?php echo $Car["Id"] ?>"><i class="ui icon exclamation circle"></i> Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>