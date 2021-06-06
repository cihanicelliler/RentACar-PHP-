<?php
session_start();
ob_start();
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");
if (!isset($_SESSION["User"])) {
    header("Location:index.php?PageNo=15");
} else {

    if (isset($_REQUEST["AdminPageNo"])) {
        $AdminPageNoValue = FilterNumberedContents($_REQUEST["AdminPageNo"]);
    } else {
        $AdminPageNoValue = 0;
    }


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
        <link type="text/css" rel="stylesheet" href="Settings/Semantic-UI-CSS/semantic.min.css" />
        <link rel="stylesheet" type="text/css" href="Settings/datatables.min.css" />
        <link type="text/css" rel="stylesheet" href="Settings/style.css" />
        <link type="image/png" rel="icon" href="Images/logo.png" />
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <title>Admin Dashboard</title>
    </head>

    <body class="admin-body" style="margin: 0px;">
        <div class="header ui mb-5">
        <div class="header ui mb-5">
          <div
          class="ui stackable huge menu mx-5 mt-5 nav-bar-small admin-nav"
          style="background-color: transparent;"
        >
          <div class="item">
            <a href="index.php?PageNo=0"
              ><img class="ui mini circular image" src="/Images/logo.png"
            /></a>
          </div>
          <a class="item" style=" color: white !important;" href="index.php?PageNo=0"><b>Home</b></a>
          <a class="item" style=" color: white !important;" href="index.php?PageNo=1"><b>Cars</b></a>
          <?php if (isset($_SESSION["User"])) { ?>
          <a class="item" style=" color: white !important;" href="admin.php"><b>Admin Page</b></a>
          <?php } ?>
          <div class="right menu">
            <?php if (!isset($_SESSION["User"])) { ?>
              <div class="item">
                <div class="ui green button login-button">
                  <a style="color: white">Log-in</a>
                </div>
              </div>
              <div class="item">
                <div class="ui button signup-button">
                  <a style="color: dimgray">Sign up</a>
                </div>
              </div>
            <?php } else { ?>
              <div class="item">
                <div class="ui inline dropdown text-secondary">
                  <div class="text text-primary"><?php echo $NameAndSurname; ?></div>
                  <i class="angle down icon bg-primary"></i>
                  <div class="menu">
                    <div class="item">
                      Profile
                    </div>
                    <div class="item">
                      Cars
                    </div>
                    <div class="item">
                      Cart
                    </div>
                    <div class="item">
                      <a href="index.php?PageNo=14" style="text-decoration: underline; color:red;"><b>Log Out</b></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
           
        </div>
        <div class="row">
            <div class="col-md-2" style="margin-right: 5rem;">
                <div class="ui inverted vertical menu admin-menu m-3 p-2">
                    <div class="item">
                        <a class="ui logo icon image" href="/">
                            <img class="ui mini circular image" src="Images/logo.png" width="45px">
                        </a>
                        <a href="index.php?PageNo=0"><b style="font-size: 1.5rem;">&nbsp; Rent A Car</b></a>
                    </div>
                    <div class="item">
                        <div class="ui header" style="color: white;"><a href="admin.php?AdminPageNo=0" style="text-decoration:none; color:white;"><i class="icon home ui"></i>Home</a></div>
                    </div>
                    <div class="item">
                        <div class="ui header" style="color: white;"><a href="admin.php?AdminPageNo=1" style="text-decoration:none; color:white;"><i class="ui icon car"></i>Cars</a></div>
                        <div class="menu">
                            <a href="admin.php?AdminPageNo=2" class="item"><i class="ui icon plus square"></i> Add Car</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui header" style="color: white;"><a href="admin.php?AdminPageNo=3" style="text-decoration:none; color:white;"><i class="ui icon user"></i> Users</a></div>
                        <div class="menu">
                            <a href="admin.php?AdminPageNo=4" class="item"><i class="ui icon plus square"></i> Add User</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui header" style="color: white;"><a href="admin.php?AdminPageNo=5" style="text-decoration:none; color:white;"><i class="ui icon tags"></i> Brands</a></div>
                        <div class="menu">
                            <a href="admin.php?AdminPageNo=6" class="item"><i class="ui icon plus square"></i> Add Brand</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui header" style="color: white;"><a href="admin.php?AdminPageNo=7" style="text-decoration:none; color:white;"><i class="ui icon pencil alternateColors"></i> Colors</a></div>
                        <div class="menu">
                            <a href="admin.php?AdminPageNo=8" class="item"><i class="ui icon plus square"></i> Add Color</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui header" style="color: white;"><a href="admin.php?AdminPageNo=9" style="text-decoration:none; color:white;"><i class="ui icon file image"></i> Car Images</a></div>
                        <div class="menu">
                            <a href="admin.php?AdminPageNo=10" class="item"><i class="ui icon plus square"></i> Add Image</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ui header" style="color: white;"><a href="admin.php?AdminPageNo=11" style="text-decoration:none; color:white;"><i class="ui icon cog"></i> Settings</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <?php
                if (!$AdminPageNoValue or $AdminPageNoValue == "" or $AdminPageNoValue == 0) {
                    include($AdminPageNo[0]);
                } else {
                    include($AdminPageNo[$AdminPageNoValue]);
                }
                ?>
            </div>
        </div>
        <footer class="container-fluid bg-dark position-relative mt-5 fixed-bottom" style="background-color: #27293d !important;">
            <div class="row p-5">
                <div class="col">
                    <h1 class="text-secondary ui header">
                        <?php echo RevertConversions($SiteName); ?>
                    </h1>
                </div>

                <div id="links" class="col d-flex justify-content-center align-items-center">
                    <a href="#" alt="" class="px-3 fs-5 link-light text-decoration-none">
                        About us
                    </a>
                    <a href="#" alt="" class="px-3 fs-5 link-light text-decoration-none">
                        Contact
                    </a>
                    <a href="#" alt="" class="px-3 fs-5 link-light text-decoration-none">
                        Help Center
                    </a>
                    <a href="#" alt="" class="px-3 fs-5 link-light text-decoration-none">
                        New Offers
                    </a>
                </div>
                <div id="social-medias" class="col d-flex justify-content-center align-items-center">
                    <a href="#" alt="" class="px-3 link-light text-decoration-none">
                        <i class="facebook icon big"></i>
                    </a>
                    <a href="#" alt="" class="px-3 link-light text-decoration-none">
                        <i class="instagram icon big"></i>
                    </a>
                    <a href="#" alt="" class="px-3 link-light text-decoration-none">
                        <i class="twitter icon big"></i>
                    </a>
                    <a href="#" alt="" class="px-3 link-light text-decoration-none">
                        <i class="youtube icon big"></i>
                    </a>
                </div>
            </div>
            <div class="footer">
                <span>Created By
                    <a href="https://github.com/cihanicelliler">Cihan İçelliler</a> |
                    <span><i class="icon copyright outline"></i></span> 2021 All rights
                    reserved.</span>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="Settings/Semantic-UI-CSS/semantic.min.js"></script>
        <script type="text/javascript" src="Settings/functions.js"></script>
        <script type="text/javascript" src="Frameworks/JQuery/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="Settings/admin.min.js"></script>
        <script type="text/javascript" src="Settings/highcharts.js"></script>

    </body>

    </html>

<?php } ?>