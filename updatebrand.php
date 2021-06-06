<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
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
    <div class="ui modal update-car" style="height: 20rem">
        <i class="close icon"></i>
        <div class="ui text-primary header text-center">UPDATE BRAND</div>
        <form class="ui form login-form" action="admin.php?AdminPageNo=23&BrandId=<?php foreach ($Brands as $Brand) {
                                                                                        if ($Brand["BrandId"] == $BrandEx) {
                                                                                            echo $Brand["BrandId"];
                                                                                        }
                                                                                    } ?>" method="post">
            <br />
            <div class="disabled field mx-5">
                <label>Brand Id</label>
                <input placeholder="<?php foreach ($Brands as $Brand) {
                                        if ($Brand["BrandId"] == $BrandEx) {
                                            echo $Brand["BrandId"];
                                        }
                                    } ?>" type="text" disabled="" tabindex="-1">
            </div>

            <div class="field mx-5">
                <label class="text-primary">Brand Name</label>
                <input type="text" name="brandname" placeholder="<?php foreach ($Brands as $Brand) {
                                                                        if ($Brand["BrandId"] == $BrandEx) {
                                                                            echo $Brand["BrandName"];
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
                <th>Brand Id</th>
                <th>Brand Name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Brands as $Brand) { ?>
                <tr>
                    <td><?php echo $Brand["BrandId"]; ?></td>
                    <td><?php echo $Brand["BrandName"]; ?></td>
                    <td><button class="ui red button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=20&BrandId=<?php echo $Brand["BrandId"] ?>"><i class="ui icon ban"></i> Delete</a></button> </td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=21&BrandId=<?php echo $Brand["BrandId"] ?>"><i class="ui icon exclamation circle"></i>Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php } ?>