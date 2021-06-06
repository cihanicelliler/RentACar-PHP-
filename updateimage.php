<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["ImageId"])) {
        $ImageEx = $_GET["ImageId"];
    } else {
        $ImageEx = "";
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");
    $ImagesQuery = $DbConnect->prepare("SELECT * FROM CarImages");
    $ImagesQuery->execute();
    $ImagesCount = $ImagesQuery->rowCount();
    $Images = $ImagesQuery->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="ui modal update-car" style="height: 25rem">
        <i class="close icon"></i>
        <div class="ui text-primary header text-center">UPDATE Image</div>
        <form class="ui form login-form" enctype="multipart/form-data" action="admin.php?AdminPageNo=31&ImageId=<?php foreach ($Images as $Image) {
                                                                                                                    if ($Image["Id"] == $ImageEx) {
                                                                                                                        echo $Image["Id"];
                                                                                                                    }
                                                                                                                } ?>" method="post">
            <br />
            <div class="disabled field mx-5">
                <label>Id</label>
                <input placeholder="<?php foreach ($Images as $Image) {
                                        if ($Image["Id"] == $ImageEx) {
                                            echo $Image["Id"];
                                        }
                                    } ?>" type="text" disabled="" tabindex="-1">
            </div>

            <div class="field mx-5">
                <label class="text-primary">Car Id</label>
                <input type="text" name="carid" placeholder="<?php foreach ($Images as $Image) {
                                                                    if ($Image["Id"] == $ImageEx) {
                                                                        echo $Image["CarId"];
                                                                    }
                                                                } ?>" />
            </div>
            <div class="field mx-5">
                <div>
                    <label for="formFileLg" class="form-label text-primary">Image</label>
                    <input name="imagefile" class="form-control form-control-lg" id="formFileLg" type="file">
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
                <th>Car Id</th>
                <th>Image</th>
                <th>Created Date</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Images as $CarImage) { ?>
                <tr>
                    <td><?php echo $CarImage["Id"]; ?></td>
                    <td><?php echo $CarImage["CarId"]; ?></td>
                    <td><?php echo $CarImage["ImagePath"]; ?></td>
                    <td><?php echo $CarImage["CreatedDate"]; ?></td>
                    <td><button class="ui red button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=28&ImageId=<?php echo $CarImage["Id"] ?>"><i class="icon ui ban"></i>Delete</a></button> </td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=29&ImageId=<?php echo $CarImage["Id"] ?>"><i class="ui icon exclamation circle"></i>Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>