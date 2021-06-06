<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {

    $BrandsQuery = $DbConnect->prepare("SELECT * FROM Brands");
    $BrandsQuery->execute();
    $BrandsCount = $BrandsQuery->rowCount();
    $Brands = $BrandsQuery->fetchAll(PDO::FETCH_ASSOC);


    $ColorsQuery = $DbConnect->prepare("SELECT * FROM Colors");
    $ColorsQuery->execute();
    $ColorsCount = $ColorsQuery->rowCount();
    $Colors = $ColorsQuery->fetchAll(PDO::FETCH_ASSOC);
?>

    <div class="ui text-primary header text-center">ADD CAR</div>
    <form class="ui form login-form" action="admin.php?AdminPageNo=14" method="post">
        <br />
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
            <input type="text" name="descriptionCar" placeholder="DescriptionCar" />
        </div>
        <div class="two fields">
            <div class="field mx-5">
                <label class="text-primary">Model Year</label>
                <input type="text" name="modelYear" placeholder="ModelYear" />
            </div>
            <div class="field mx-5">
                <label class="text-primary">Daily Price</label>
                <input type="text" name="dailyPrice" placeholder="DailyPrice" />
            </div>
        </div>
        <div class="field mx-5">
            <button class="ui green button login fluid" type="submit"><i class="ui icon check"></i>Add</button>
        </div>
    </form>
<?php } ?>