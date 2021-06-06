<?php
    unset($_SESSION['User']);
    header("Location:index.php?PageNo=0");
    exit();
?> 