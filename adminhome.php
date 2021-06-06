<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {

    $CarsQuery = $DbConnect->prepare("SELECT Cars.DescriptionCar,Colors.ColorName,Brands.BrandName,Cars.DailyPrice,Cars.ModelYear FROM Cars
INNER JOIN Brands
ON Cars.BrandId = Brands.BrandId
INNER JOIN Colors
ON Cars.ColorId = Colors.ColorId");
    $CarsQuery->execute();
    $CarsCount = $CarsQuery->rowCount();
    $Cars = $CarsQuery->fetchAll(PDO::FETCH_ASSOC);
?>




    <div class="row">
        <div class="col-md-6 mb-5">
            <table id="myAdminTable" class="display">
                <thead>
                    <tr>
                        <th>Description Car</th>
                        <th>Color Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Cars as $Car) { ?>
                        <tr>
                            <td><?php echo $Car["DescriptionCar"]; ?></td>
                            <td><?php echo $Car["ColorName"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="col-md-6 mb-5">
            <table id="myAdminTableCategory" class="display">
                <thead>
                    <tr>
                        <th>Description Car</th>
                        <th>Brand Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Cars as $Car) { ?>
                        <tr>
                            <td><?php echo $Car["DescriptionCar"]; ?></td>
                            <td><?php echo $Car["BrandName"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="col-md-6 my-5">
            <table id="myAdminTablePrice" class="display">
                <thead>
                    <tr>
                        <th>Description Car</th>
                        <th>Daily Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Cars as $Car) { ?>
                        <tr>
                            <td><?php echo $Car["DescriptionCar"]; ?></td>
                            <td><?php echo $Car["DailyPrice"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 my-5">
            <table id="myAdminTableModelYear" class="display">
                <thead>
                    <tr>
                        <th>Description Car</th>
                        <th>Model Year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Cars as $Car) { ?>
                        <tr>
                            <td><?php echo $Car["DescriptionCar"]; ?></td>
                            <td><?php echo $Car["ModelYear"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>