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
?>
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
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=21&BrandId=<?php echo $Brand["BrandId"] ?>"><i class="ui icon exclamation circle"></i> Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>