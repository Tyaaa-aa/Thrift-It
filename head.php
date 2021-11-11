<?php
session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    include "db_connect.php";
    $result = $conn->query("SELECT * from sp_users where id=$userid");
    // $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $usertheme = $row['user_theme'];
        }
    }
}else{
    $usertheme = "light";
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>ThriftIt</title>
    <link rel="manifest" href="manifest.json?v=<?= time() ?>">
    <link rel="icon" type="image/png" href="favicon.png?v=1">
    <link rel="apple-touch-icon" sizes="128x128" href="img/icons/icon-128x128.png">
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <?php
    // $usertheme = $row['user_theme'];
    if ($usertheme == "dark") {
    ?>
        <link rel="stylesheet" href="css/mystyle.css?v=<?= time() ?>" id="mystyle">
        <link rel="stylesheet" href="css/darkmodestyle.css?v=<?= time() ?>" id="darkmodestyle">
    <?php
    } else {
    ?>
        <link rel="stylesheet" href="css/mystyle.css?v=<?= time() ?>" id="mystyle">

    <?php
    }
    ?>
    <!-- <link rel="stylesheet" href="css/mystyle.css?v=<?= time() ?>" id="mystyle"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous"></script>
    <script src="js/script.js?v=<?= time() ?>"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>
    <meta name="google-signin-client_id" content="44119854998-vm0q8vhfc0lddk1tpdmb59gdf2mrv30c.apps.googleusercontent.com">
</head>