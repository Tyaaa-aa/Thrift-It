<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
}
?>

<body id="sponsors">
    <a href="index.php" class="back_btn">
        <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
    <h1 class="headtitles">Sponsors</h1>
    <p>All the rewards given in this app are sponsored by the following list of brands below. Special Thanks to our sponsors!</p>
    <div class="sponsors_container">
        <a href="https://www.fairprice.com.sg/loyalty-programme/" class="sponsors sponsor1">
            <img src="img/sponsors1.png?v=1" alt="Sponsor 1">
        </a>
        <a href="https://www.uniqlo.com/eu/en/company/sustainability.html" class="sponsors sponsor2">
            <img src="img/sponsors2.png?v=1" alt="Sponsor 2">
        </a>
        <a href="https://unitedbyblue.com/pages/sustainable-materials" class="sponsors sponsor3">
            <img src="img/sponsors3.png?v=1" alt="Sponsor 3">
        </a>
        <a href="https://www.hydroflask.sg/pages/about" class="sponsors sponsor4">
            <img src="img/sponsors4.png?v=1" alt="Sponsor 4">
        </a>
    </div>
</body>

<style>
    
</style>