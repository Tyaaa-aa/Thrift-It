<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
}
?>

<body id="terms">
    <a href="index.php" class="back_btn">
        <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
    <h2 class="headtitles">Terms & Conditions</h2>
    <div class="terms_content_container">
        <h3>Safety Measures</h3>
        <p>
            If you would like to sell an item, you have to make sure that you are
            healthy and not having any symptoms of covid-19. This is to ensure the safety of all users. We want everyone to have a wonderful experience here on Thrift It.
        </p>
        <h3>Necessary Precautions</h3>
        <p>
            Please make sure you wash the clothing item and disinfect it before giving it during meet ups or sending it for delivery. Thank you for your cooperation!
        </p>
        <p class="terms_smallprint">
            * To make listings on ThriftIt's platform you must agree to these terms. By using ThriftIt you agree to these terms and you will hold ThriftIt legally liable in any unfortunate events that might occur.
        </p>
    </div>
</body>
