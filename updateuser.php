<?php
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    if (isset($_GET["UserId"])) {
        $UserEx = $_GET["UserId"];
    } else {
        $UserEx = "";
    }
    require_once("Settings/config.php");
    require_once("Settings/functions.php");
    require_once("Settings/sitepages.php");
    $UsersQuery = $DbConnect->prepare("SELECT * FROM Users");
    $UsersQuery->execute();
    $UsersCount = $UsersQuery->rowCount();
    $Users = $UsersQuery->fetchAll(PDO::FETCH_ASSOC);

?>
    <div class="ui modal update-car" style="height: 35rem">
        <i class="close icon"></i>
        <div class="ui text-primary header text-center">UPDATE USER</div>
        <form class="ui form login-form" action="admin.php?AdminPageNo=19&UserId=<?php foreach ($Users as $User) {
                                                                                        if ($User["Id"] == $UserEx) {
                                                                                            echo $User["Id"];
                                                                                        }
                                                                                    } ?>" method="post">
            <br />
            <div class="disabled field mx-5">
                <label>Id</label>
                <input placeholder="<?php foreach ($Users as $User) {
                                        if ($User["Id"] == $UserEx) {
                                            echo $User["Id"];
                                        }
                                    } ?>" type="text" disabled="" tabindex="-1">
            </div>

            <div class="field mx-5">
                <label class="text-primary">Email</label>
                <input type="text" name="email" placeholder="<?php foreach ($Users as $User) {
                                                                    if ($User["Id"] == $UserEx) {
                                                                        echo $User["Email"];
                                                                    }
                                                                } ?>" />
            </div>

            <div class="field mx-5">
                <label class="text-primary">Password</label>
                <input type="text" name="password" placeholder="<?php foreach ($Users as $User) {
                                                                    if ($User["Id"] == $UserEx) {
                                                                        echo $User["Password"];
                                                                    }
                                                                } ?>" />
            </div>
            <div class="field mx-5">
                <label class="text-primary">Name and Surname</label>
                <input type="text" name="nameandsurname" placeholder="<?php foreach ($Users as $User) {
                                                                            if ($User["Id"] == $UserEx) {
                                                                                echo $User["NameAndSurname"];
                                                                            }
                                                                        } ?>" />
            </div>
            <div class="field mx-5">
                <label class="text-primary">Telephone</label>
                <input type="text" name="telephone" placeholder="<?php foreach ($Users as $User) {
                                                                        if ($User["Id"] == $UserEx) {
                                                                            echo $User["Telephone"];
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
                <th>Id</th>
                <th>Email</th>
                <th>Password</th>
                <th>Ip Address</th>
                <th>Date Of Registration</th>
                <th>Name And Surname</th>
                <th>Telephone</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Users as $User) { ?>
                <tr>
                    <td><?php echo $User["Id"]; ?></td>
                    <td><?php echo $User["Email"]; ?></td>
                    <td><?php echo $User["Password"]; ?></td>
                    <td><?php echo $User["IPAddress"]; ?></td>
                    <td><?php echo $User["DateOfRegistration"]; ?></td>
                    <td><?php echo $User["NameAndSurname"]; ?></td>
                    <td><?php echo $User["Telephone"]; ?></td>
                    <td><button class="ui red button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=16&UserId=<?php echo $User["Id"] ?>"><i class="icon ui ban"></i>Delete</a></button> </td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=17&UserId=<?php echo $User["Id"] ?>"><i class="ui icon exclamation circle"></i>Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php } ?>