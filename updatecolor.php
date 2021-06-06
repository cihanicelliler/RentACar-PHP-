<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["ColorId"])) {
        $ColorEx = $_GET["ColorId"];
    } else {
        $ColorEx = "";
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");
    $ColorsQuery = $DbConnect->prepare("SELECT * FROM Colors");
    $ColorsQuery->execute();
    $ColorsCount = $ColorsQuery->rowCount();
    $Colors = $ColorsQuery->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="ui modal update-car" style="height: 20rem">
        <i class="close icon"></i>
        <div class="ui text-primary header text-center">UPDATE COLOR</div>
        <form class="ui form login-form" action="admin.php?AdminPageNo=27&ColorId=<?php foreach ($Colors as $Color) {
                                                                                        if ($Color["ColorId"] == $ColorEx) {
                                                                                            echo $Color["ColorId"];
                                                                                        }
                                                                                    } ?>" method="post">
            <br />
            <div class="disabled field mx-5">
                <label>Color Id</label>
                <input placeholder="<?php foreach ($Colors as $Color) {
                                        if ($Color["ColorId"] == $ColorEx) {
                                            echo $Color["ColorId"];
                                        }
                                    } ?>" type="text" disabled="" tabindex="-1">
            </div>

            <div class="field mx-5">
                <label class="text-primary">Color Name</label>
                <input type="text" name="colorname" placeholder="<?php foreach ($Colors as $Color) {
                                                                        if ($Color["ColorId"] == $ColorEx) {
                                                                            echo $Color["ColorName"];
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
                <th>Color Id</th>
                <th>Color Name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Colors as $Color) { ?>
                <tr>
                    <td><?php echo $Color["ColorId"]; ?></td>
                    <td><?php echo $Color["ColorName"]; ?></td>
                    <td><button class="ui red button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=24&ColorId=<?php echo $Color["ColorId"] ?>"><i class="icon ui ban"></i>Delete</a></button> </td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=25&ColorId=<?php echo $Color["ColorId"] ?>"><i class="ui icon exclamation circle"></i>Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>