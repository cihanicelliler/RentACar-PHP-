<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["CarId"])) {
        $CarEx = $_GET["CarId"];
    } else {
        $CarEx = "";
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");
    $CarsQuery = $DbConnect->prepare("SELECT * FROM Cars");
    $CarsQuery->execute();
    $CarsCount = $CarsQuery->rowCount();
    $Cars = $CarsQuery->fetchAll(PDO::FETCH_ASSOC);


    $BrandsQuery = $DbConnect->prepare("SELECT * FROM Brands");
    $BrandsQuery->execute();
    $BrandsCount = $BrandsQuery->rowCount();
    $Brands = $BrandsQuery->fetchAll(PDO::FETCH_ASSOC);


    $ColorsQuery = $DbConnect->prepare("SELECT * FROM Colors");
    $ColorsQuery->execute();
    $ColorsCount = $ColorsQuery->rowCount();
    $Colors = $ColorsQuery->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="ui modal update-car" style="height: 30rem">
        <i class="close icon"></i>
        <div class="ui text-primary header text-center">UPDATE CAR</div>
        <form class="ui form login-form" action="admin.php?AdminPageNo=15&CarId=<?php foreach ($Cars as $Car) {
                                                                                    if ($Car["Id"] == $CarEx) {
                                                                                        echo $Car["Id"];
                                                                                    }
                                                                                } ?>" method="post">
            <br />
            <div class="disabled field mx-5">
                <label>Id</label>
                <input placeholder="<?php foreach ($Cars as $Car) {
                                        if ($Car["Id"] == $CarEx) {
                                            echo $Car["Id"];
                                        }
                                    } ?>" type="text" disabled="" tabindex="-1">
            </div>
            <div class="two fields">
                <div class="field mx-5">
                    <label class="text-primary">Brand Id</label>
                    <select name="brandId" class="ui search dropdown">
                        <?php foreach ($Brands as $Brand) { ?>
                            <option value="<?php echo $Brand["BrandId"]; ?>"><?php echo $Brand["BrandName"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="field mx-5">
                    <label class="text-primary">Color Id</label>
                    <select name="colorId" class="ui search dropdown">
                        <?php foreach ($Colors as $Color) { ?>
                            <option value="<?php echo $Color["ColorId"]; ?>"><?php echo $Color["ColorName"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="field mx-5">
                <label class="text-primary">Description Car</label>
                <input type="text" name="descriptionCar" placeholder="<?php foreach ($Cars as $Car) {
                                                                            if ($Car["Id"] == $CarEx) {
                                                                                echo $Car["DescriptionCar"];
                                                                            }
                                                                        } ?>" />
            </div>
            <div class="two fields">
                <div class="field mx-5">
                    <label class="text-primary">Model Year</label>
                    <input type="text" name="modelYear" placeholder="<?php foreach ($Cars as $Car) {
                                                                            if ($Car["Id"] == $CarEx) {
                                                                                echo $Car["ModelYear"];
                                                                            }
                                                                        } ?>" />
                </div>
                <div class="field mx-5">
                    <label class="text-primary">Daily Price</label>
                    <input type="text" name="dailyPrice" placeholder="<?php foreach ($Cars as $Car) {
                                                                            if ($Car["Id"] == $CarEx) {
                                                                                echo $Car["DailyPrice"];
                                                                            }
                                                                        } ?>" />
                </div>
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
                    <td><button class="ui red button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=12&CarId=<?php echo $Car["Id"] ?>"><i class="icon ui ban"></i>Delete</a></button> </td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=13&CarId=<?php echo $Car["Id"] ?>"><i class="ui icon exclamation circle"></i>Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>