<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
?>

    <div class="ui text-primary header text-center">ADD USER</div>
    <form class="ui form login-form" action="admin.php?AdminPageNo=18" method="post">
        <br />
        <div class="field mx-5">
            <label class="text-primary">Email</label>
            <input type="text" name="email" placeholder="Email" />
        </div>

        <div class="field mx-5">
            <label class="text-primary">Password</label>
            <input type="text" name="password" placeholder="Password" />
        </div>
        <div class="field mx-5">
            <label class="text-primary">Name and Surname</label>
            <input type="text" name="nameandsurname" placeholder="Name and Surname" />
        </div>
        <div class="field mx-5">
            <label class="text-primary">Telephone</label>
            <input type="text" name="telephone" placeholder="Telephone" />
        </div>
        <div class="field mx-5">
            <button class="ui green button login fluid" type="submit"><i class="ui icon check"></i>Add</button>
        </div>
    </form>
<?php } ?>