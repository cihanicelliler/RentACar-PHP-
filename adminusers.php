<?php
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {
    $UsersQuery = $DbConnect->prepare("SELECT * FROM Users");
    $UsersQuery->execute();
    $UsersCount = $UsersQuery->rowCount();
    $Users = $UsersQuery->fetchAll(PDO::FETCH_ASSOC);

?>
    <table id="myTable" class="display compact">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th style="max-width: 11rem;">Password</th>
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
                    <td style="max-width: 11rem; overflow: auto; margin-right: 1rem;"><?php echo $User["Password"]; ?></td>
                    <td><?php echo $User["IPAddress"]; ?></td>
                    <td><?php echo $User["DateOfRegistration"]; ?></td>
                    <td><?php echo $User["NameAndSurname"]; ?></td>
                    <td><?php echo $User["Telephone"]; ?></td>
                    <td><button class="ui red button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=16&UserId=<?php echo $User["Id"] ?>"><i class="icon ui ban"></i> Delete</a></button> </td>
                    <td><button class="ui yellow button"><a style="text-decoration: none; color: white;" href="admin.php?AdminPageNo=17&UserId=<?php echo $User["Id"] ?>"><i class="ui icon exclamation circle"></i>Update</a></button> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>