<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
?>

    <div class="ui text-primary header text-center">ADD COLOR</div>
    <form class="ui form login-form" action="admin.php?AdminPageNo=26" method="post">
        <br />
        <div class="field mx-5">
            <label class="text-primary">Color Name</label>
            <input type="text" name="colorname" placeholder="Color Name" />
        </div>
        <div class="field mx-5">
            <button class="ui green button login fluid" type="submit"><i class="ui icon check"></i>Add</button>
        </div>
    </form>
<?php } ?>