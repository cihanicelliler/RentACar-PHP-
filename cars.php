<?php if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else { ?>

    <div class="row">
        <div class="ui middle aligned animated selection divided list car-page col-md-3">
            <h1 class="ui header text-primary">Brands</h1>


            <?php

            if (isset($_GET["ColorId"])) {
                $ColorEx = $_GET["ColorId"];
            } else {
                $ColorEx = "";
            }
            if (isset($_GET["BrandId"])) {
                $BrandEx = $_GET["BrandId"];
            } else {
                $BrandEx = "";
            }

            require_once("Settings/config.php");
            require_once("Settings/functions.php");
            require_once("Settings/sitepages.php");

            $BrandsQuery = $DbConnect->prepare("SELECT * FROM Brands");
            $BrandsQuery->execute();
            $BrandsCount = $BrandsQuery->rowCount();
            $Brands = $BrandsQuery->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="item">
                <div class="content">
                    <div class="header"><a style="text-decoration: none;<?php if ($BrandEx == "" and $ColorEx == "") { ?>color: #02bcc4; <?php } else { ?> color: black;<?php } ?>" href="index.php?PageNo=1"><strong>All Cars</strong></a></div>
                </div>
            </div>
            <?php
            foreach ($Brands as $Brand) {
            ?>
                <div class="item">
                    <div class="content">
                        <div class="header"><a style="text-decoration: none;<?php if ($BrandEx == $Brand["BrandId"]) { ?>color: #02bcc4; <?php } else { ?> color: black;<?php } ?>" href="index.php?PageNo=1&BrandId=<?php echo $Brand["BrandId"]; ?>"><strong><?php echo $Brand["BrandName"] ?></strong></a></div>
                    </div>
                </div>

            <?php
            }

            ?>

            <h1 class="ui header text-primary">Colors</h1>
            <div class="item">
                <div class="content">
                    <div class="header"><a style="text-decoration: none;<?php if ($BrandEx == "" and $ColorEx == "") { ?>color: #02bcc4; <?php } else { ?> color: black;<?php } ?>" href="index.php?PageNo=1"><strong>All Cars</strong></a></div>
                </div>
            </div>

            <?php

            $ColorsQuery = $DbConnect->prepare("SELECT * FROM Colors");
            $ColorsQuery->execute();
            $ColorsCount = $ColorsQuery->rowCount();
            $Colors = $ColorsQuery->fetchAll(PDO::FETCH_ASSOC);
            foreach ($Colors as $Color) {
            ?>
                <div class="item">
                    <div class="content">
                        <div class="header"><a style="text-decoration: none;<?php if ($ColorEx == $Color["ColorId"]) { ?>color: #02bcc4; <?php } else { ?> color: black;<?php } ?>" href="index.php?PageNo=1&ColorId=<?php echo $Color["ColorId"]; ?>"><strong><?php echo $Color["ColorName"] ?></strong></a></div>
                    </div>
                </div>

            <?php
            }

            ?>
        </div>
        <div class="car-page col-md-9">
            <?php
            if (isset($_GET["BrandId"])) {
                $SqlQuery = "SELECT Cars.Id,Cars.DescriptionCar,Cars.ModelYear,Cars.DailyPrice,Brands.BrandName,Colors.ColorName FROM Cars
            INNER JOIN Brands
            ON Cars.BrandId = Brands.BrandId
            INNER JOIN Colors
            ON Cars.ColorId = Colors.ColorId WHERE Brands.BrandId = :brandId";
                $Param = $BrandEx;
                $CarsQuery = $DbConnect->prepare($SqlQuery);
                $CarsQuery->bindParam(':brandId', $Param);
            } else if (isset($_GET["ColorId"])) {
                $SqlQuery = "SELECT Cars.Id,Cars.DescriptionCar,Cars.ModelYear,Cars.DailyPrice,Brands.BrandName,Colors.ColorName FROM Cars
            INNER JOIN Brands
            ON Cars.BrandId = Brands.BrandId
            INNER JOIN Colors
            ON Cars.ColorId = Colors.ColorId WHERE Colors.ColorId = :colorId";
                $Param = $ColorEx;
                $CarsQuery = $DbConnect->prepare($SqlQuery);
                $CarsQuery->bindParam(':colorId', $Param);
            } else {
                $CarsQuery = $DbConnect->prepare("SELECT Cars.Id,Cars.DescriptionCar,Cars.ModelYear,Cars.DailyPrice,Brands.BrandName,Colors.ColorName FROM Cars
            INNER JOIN Brands
            ON Cars.BrandId = Brands.BrandId
            INNER JOIN Colors
            ON Cars.ColorId = Colors.ColorId");
            }

            $CarsQuery->execute();
            $CarsCount = $CarsQuery->rowCount();
            $Cars = $CarsQuery->fetchAll(PDO::FETCH_ASSOC);
            foreach ($Cars as $Car) {
            ?>
                <div class="card-container mx-2" style="float: left">
                    <div class="card" style="width: 19rem">
                        <div class="front">
                            <div>
                                <img class="card-img-top" style="object-fit: cover" src="Images/<?php

                                                                                                $SqlQuery = "SELECT * FROM CarImages WHERE CarId = :carId";
                                                                                                $Param = $Car["Id"];
                                                                                                $ImagesQuery = $DbConnect->prepare($SqlQuery);
                                                                                                $ImagesQuery->bindParam(':carId', $Param);
                                                                                                $ImagesQuery->execute();
                                                                                                $ImagesCount = $ImagesQuery->rowCount();
                                                                                                $Image = $ImagesQuery->fetch(PDO::FETCH_ASSOC);
                                                                                                if ($Image["ImagePath"] != null or $Image["ImagePath"] != "") {
                                                                                                    echo $Image["ImagePath"];
                                                                                                } else {
                                                                                                    echo "defaultcar.png";
                                                                                                }

                                                                                                ?>" />
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name"><b><?php echo $Car["DescriptionCar"] ?></b></h3>
                                    <p class="profession"><?php echo $Car["BrandName"] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"We are at your service with the best quality vehicles..."</h5>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center"><b><?php echo $Car["DescriptionCar"] ?></b></h4>
                                    <p class="text-center">
                                        <?php echo $Car["BrandName"] ?>
                                    </p>

                                    <div class="stats-container">
                                        <div class="stats">
                                            <p class="mb-0"><b>Color</b></p>
                                            <h4><?php echo $Car["ColorName"] ?></h4>
                                        </div>
                                        <div class="stats">
                                            <p class="mb-0"><b>Model Year</b></p>
                                            <h4><?php echo $Car["ModelYear"] ?></h4>
                                        </div>
                                        <div class="stats">
                                            <p class="mb-0"><b>Daily Price</b></p>
                                            <h4><?php echo $Car["DailyPrice"] ?>TL</h4>
                                        </div>
                                        <div class="stats">
                                            <p class="mb-0"><b>Monthly Price</b></p>
                                            <h4><?php
                                                $dailyPrice = (int)$Car["DailyPrice"];
                                                $dailyPrice = $dailyPrice * 30;
                                                echo $dailyPrice;
                                                ?>TL</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer mt-0">
                                <div class="social-links text-center">
                                    <a href="index.php?PageNo=4&CarId=<?php echo $Car["Id"]; ?>" class="btn btn-primary mx-2 bg-primary">Detail Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

<?php } ?>