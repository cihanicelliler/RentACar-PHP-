<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {

?>

<div class="ui text-primary header text-center">ADD CAR IMAGE</div>
<form class="ui form login-form" enctype="multipart/form-data" action="admin.php?AdminPageNo=30" method="post">
    <br />
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
        <button class="ui green button login fluid" type="submit"><i class="ui icon check"></i>Add</button>
    </div>
</form>
<?php } ?>