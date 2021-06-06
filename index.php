<?php
session_start();
ob_start();
require_once("Settings/config.php");
require_once("Settings/functions.php");
require_once("Settings/sitepages.php");

if (isset($_REQUEST["PageNo"])) {
  $PageNoValue = FilterNumberedContents($_REQUEST["PageNo"]);
} else {
  $PageNoValue = 0;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <meta names="robots" content="index, follow" />
  <meta names="googlebot" content="index, follow" />
  <meta names="revisit-after" content="7 Days" />
  <meta name="description" content="<?php echo RevertConversions($SiteDescription); ?>" />
  <meta name="keywords" content="<?php echo RevertConversions($SiteKeywords); ?>" />
  <link type="image/png" rel="icon" href="Images/logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
  <link type="text/css" rel="stylesheet" href="Settings/Semantic-UI-CSS///semantic.min.css" />
  <link type="text/css" rel="stylesheet" href="Settings///style.css" />

  <title><?php echo RevertConversions($SiteName); ?></title>
</head>

<body>

  <div class="ui modal login" style="height: 20rem">
    <i class="close icon"></i>
    <div class="ui text-primary header text-center">LOGIN</div>
    <form class="ui form login-form" action="index.php?PageNo=11" method="post">
      <br />
      <div class="field mx-5">
        <label class="text-primary">E-mail</label>
        <input type="text" name="email" placeholder="E-mail" />
      </div>
      <div class="field mx-5">
        <label class="text-primary">Password</label>
        <input type="password" name="password" placeholder="Password" />
      </div>
      <div class="field mx-5">
        <button class="ui green button login fluid" type="submit">Login</button>
      </div>
    </form>
  </div>

  <div class="ui modal signup" style="height: 35rem">
    <i class="close icon"></i>
    <div class="ui text-primary header text-center">SIGN UP</div>
    <form class="ui form sign-up-form" action="index.php?PageNo=5" method="post">
      <br />
      <div class="field mx-5">
        <label class="text-primary">E-mail</label>
        <input type="text" name="email" placeholder="E-mail" />
      </div>
      <div class="field mx-5">
        <label class="text-primary">Password</label>
        <input type="password" name="password" placeholder="Password" />
      </div>
      <div class="field mx-5">
        <label class="text-primary">Password Repeat</label>
        <input type="password" name="passwordrepeat" placeholder="Password" />
      </div>
      <div class="field mx-5">
        <label class="text-primary">Name and Surname</label>
        <input type="text" name="nameandsurname" placeholder="Name and Surname" />
      </div>
      <div class="field mx-5">
        <label class="text-primary">Telephone</label>
        <input type="text" name="telephone" placeholder="Telephone" />
      </div>

      <div class="ui error message">
        <div class="header">Action Forbidden</div>
        <p>You can only sign up for an account once with a given e-mail address.</p>
      </div>

      <div class="field mx-5">
        <button class="ui green button fluid" type="submit">Sign up</button>
      </div>
    </form>
  </div>

  <div class="scroll-up-btn">
    <i class="icon angle up"></i>
  </div>
  <div
      class="ui stackable menu mx-5 mt-5 fixed-top nav-bar-small"
      style="background-color: transparent"
    >
      <div class="item">
        <a href="index.php?PageNo=0"
          ><img class="ui mini circular image" src="/Images/logo.png"
        /></a>
      </div>
      <a class="item" href="index.php?PageNo=0"><b>Home</b></a>
      <a class="item" href="index.php?PageNo=1"><b>Cars</b></a>
      <?php if (isset($_SESSION["User"])) { ?>
      <a class="item" href="admin.php"><b>Admin Page</b></a>
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

  <div class="ui container mt-5">
    <?php
    if (!$PageNoValue or $PageNoValue == "" or $PageNoValue == 0) {
      include($PageNo[0]);
    } else {
      include($PageNo[$PageNoValue]);
    }


    ?>
  </div>



  <footer class="container-fluid bg-dark position-relative mt-5 fixed-bottom">
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
  <script type="text/javascript" src="Settings//functions.js"></script>
  <script type="text/javascript" src="Frameworks/JQuery//jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="Settings/Semantic-UI-CSS//semantic.min.js"></script>
</body>

</html>

<?php
$DbConnect = null;
ob_end_flush();
?>