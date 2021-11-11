<header>
    <?php
    $userid = $_SESSION["userid"];
    include "db_connect.php";
    $stmt = $conn->prepare("SELECT s_ProfileImg from sp_users where id=?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();

    $stmt->store_result();
    $row = $stmt->num_rows();
    $stmt->bind_result($s_ProfileImg);
    $stmt->fetch();
    $stmt->close();
    ?>
    <ul class="nav" id="nav">
        <li class="profile_pic"></li>
        <li class="nav_settings header_btns">
            <ion-icon name="settings"></ion-icon>
        </li>
        <li class="nav_username">
            <a href="profile.php?userid=<?= $userid ?>&section=trade"><?= $_SESSION["username"] ?></a>
        </li>
        <li class="nav_li nav_li_topline">
            <a href="profile.php?userid=<?= $userid ?>&section=trade">
                <ion-icon name="person" class="nav_icon"></ion-icon>Profile
            </a>
        </li>
        <li class="nav_li">
            <a href="favourites.php">
                <ion-icon name="bookmark" class="nav_icon"></ion-icon>Favourites
            </a>
        </li>
        <li class="nav_li">
            <a href="sponsors.php">
                <ion-icon name="business" class="nav_icon"></ion-icon>Sponsors
            </a>
        </li>
        <li class="nav_li nav_li_topline">
            <a href="terms.php">
                <ion-icon name="newspaper" class="nav_icon"></ion-icon>Terms & Conditions
            </a>
        </li>
        <li class="nav_li">
            <a href="more.php">
                <ion-icon name="help-circle" class="nav_icon"></ion-icon>More
            </a>
        </li>
        <li class="nav_li logout_btn nav_li_topline">
            <a href="#" onclick='signOut();'>
                <ion-icon name="log-out" class="nav_icon"></ion-icon>Logout
            </a>
        </li>
    </ul>

    <!-- <ion-icon name="menu" class="menu-btn header_btns"></ion-icon> -->
    <img src="img/icons/menu_icon.png" alt="Menu Icon" class="menu-btn header_btns">

    <form method="GET" action="search.php" class="search-form">
        <input type="text" placeholder="Search" class="main-search inputForm">
    </form>

    <!-- <ion-icon name="chatbubbles"></ion-icon> -->
    <!-- <ion-icon name="chatbubble-ellipses-outline" class="chat_btn header_btns"></ion-icon> -->
    <img src="img/icons/chats_icon.png" alt="Chats Icon" class="chat_btn header_btns">
</header>
<div class="g-signin2" data-onsuccess="onSignIn"></div>

<style>
    .profile_pic {
        background-image: url(<?= $s_ProfileImg ?>);
    }

    .g-signin2,
    .g-signin2 div {
        position: absolute;
        width: 0% !important;
        height: 0% !important;
        opacity: 1;
        pointer-events: none !important;
    }
</style>
<script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>
<meta name="google-signin-client_id" content="44119854998-vm0q8vhfc0lddk1tpdmb59gdf2mrv30c.apps.googleusercontent.com">

<script>
    // window.onLoadCallback = function() {
    //     gapi.auth2.init({
    //         client_id: '44119854998-vm0q8vhfc0lddk1tpdmb59gdf2mrv30c.apps.googleusercontent.com'
    //     });
    // }


    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function() {
            console.log('User signed out.');
            // alert('User signed out.');
        });
        // location.href = 'index.php';
        // return confirm('Are you sure you want to delete your listing?');
        setTimeout(function() {
            window.location.href = 'logout.php';
        }, 50); // time in ms
    }

    var onboarding = document.getElementById("nav");
    hammertime = new Hammer(onboarding);
    hammertime.on('swipeleft', function(ev) {
        $(".nav").css("left", "-100%");
        unlockPage();
    });

    // $('.logout_btn').click(function(e) {

        
    // });


    function unlockPage() {
        $(".menu-btn, .search-form, .chat_btn").css({
            "transform": "translateX(0px)",
            "opacity": "1"
        });
        $(".main-filter").css({
            "backdrop-filter": "brightness(1)",
            "z-index": "0"
        });
        $("body").css({
            "overflow-y": "auto"
        });
        console.log("Page Unlocked");
    }

    $(".nav_settings").click(function() {
        window.location.href = 'account.php';
    })

    $(".profile_pic").click(function() {
        // signOut();
        window.location.href = 'profile.php?userid=<?= $userid ?>&section=trade';
    });

    $(".chat_btn").click(function() {
        // signOut();
        window.location.href = 'viewchats.php?section=selling';
    });
</script>



<!-- 
MAKE PROFILE PIC SMALLER



-- intern notes --
directus cms
laravel nova
wordpress
CLI & pm2
-->