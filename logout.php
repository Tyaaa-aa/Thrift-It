<?php
include "head.php";
?>
<?php

// session_start();
unset($_SESSION["userid"]);
unset($_SESSION["username"]);
session_unset();
session_destroy();
echo "You Have Logged Out<br>";
header("Location: index.php");
?>
<a href="onboarding.php">Click here if you are not automatically redirected</a>
