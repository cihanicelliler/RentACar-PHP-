<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {

    if (isset($_GET["CarId"])) {
        $CarEx = $_GET["CarId"];
    } else {
        header("Location:index.php?PageNo=1");
        exit();
    }

    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");

    $SqlQuery = "SELECT Cars.Id,Cars.DescriptionCar,Cars.ModelYear,Cars.DailyPrice,Brands.BrandName,Colors.ColorName FROM Cars
INNER JOIN Brands
ON Cars.BrandId = Brands.BrandId
INNER JOIN Colors
ON Cars.ColorId = Colors.ColorId 
WHERE Id = :carId";
    $Param = $CarEx;
    $CarsQuery = $DbConnect->prepare($SqlQuery);
    $CarsQuery->bindParam(':carId', $Param);
    $CarsQuery->execute();
    $Car = $CarsQuery->fetch(PDO::FETCH_ASSOC);

    $SqlQuery1 = "SELECT * FROM CarImages WHERE  CarId = :carId";
    $ImagesQuery = $DbConnect->prepare($SqlQuery1);
    $ImagesQuery->bindParam(':carId', $Param);
    $ImagesQuery->execute();
    $Image = $ImagesQuery->fetch(PDO::FETCH_ASSOC);
?>

    <div class="row" style="margin-top: 10rem;">
        <div class="col-md-6 ui big image">
            <img src="Images/<?php echo $Image["ImagePath"]; ?>" alt="rentacarimage">
        </div>
        <div class="col-md-5">
            <div class="ui middle aligned animated list">
                <div class="item">
                    <div class="content">
                        <div class="header bg-primary p-3 rounded-2"><strong class="text-secondary">Description Car:</strong>&nbsp;&nbsp; <?php echo $Car["DescriptionCar"] ?></div>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <div class="header bg-primary p-3 rounded-2"><strong class="text-secondary">Brand Name:</strong>&nbsp;&nbsp; <?php echo $Car["BrandName"] ?></div>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <div class="header bg-primary p-3 rounded-2"><strong class="text-secondary">Color Name:</strong>&nbsp;&nbsp; <?php echo $Car["ColorName"] ?></div>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <div class="header bg-primary p-3 rounded-2"><strong class="text-secondary">Model Year:</strong>&nbsp;&nbsp; <?php echo $Car["ModelYear"] ?></div>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <div class="header bg-primary p-3 rounded-2"><strong class="text-secondary">Daily Price:</strong>&nbsp;&nbsp; <?php echo $Car["DailyPrice"] ?>TL</div>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <div class="header bg-primary p-3 rounded-2"><strong class="text-secondary">Monthly Price:</strong>&nbsp;&nbsp; <?php echo (((int)$Car["DailyPrice"]) * 30) ?>TL</div>
                    </div>
                </div>
                <br>
                <div class="item col-md-12">
                    <button class="ui animated massive green button">
                        <div class="visible content">Rent Now!</div>
                        <div class="hidden content">
                            <i class="car icon"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>