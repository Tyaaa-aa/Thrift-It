<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
}

?>



<body>
    <?php include "header.php"; ?>

    <div class="main-filter"></div>
    <div class="home_section_bar_container">
        <div class="home_section_bar">
            <div class="active_bar section_bars"></div>
            <a href="index.php?section=trade" class="trade_bar section_bars">
                Trade & Free
            </a>
            <a href="index.php?section=craft" class="crafted_bar section_bars">
                Crafted
            </a>
        </div>
        <?php
        // REDIRECT USER TO APPROPRIATE SECTION (DEFAULT IS TRADE)
        $section = $_GET['section'];

        if ($section == "trade") {
        ?>
            <script>
                $(".active_bar").css("transform", "translateX(-50%)");


                $(".crafted_bar").click(function() {
                    $(".active_bar").css("transform", "translateX(50%)");
                    console.log("crafted section");
                    $("#main-section").css("transform", "translateX(-120%)");
                });
            </script>
        <?php
        } else if ($section == "craft") {
        ?>
            <script>
                $(".active_bar").css("transform", "translateX(50%)");
                $(".trade_bar").click(function() {
                    $(".active_bar").css("transform", "translateX(-50%)");
                    console.log("trade section");
                    $("#main-section").css("transform", "translateX(120%)");

                });
            </script>
        <?php
        } else {
        ?>
            <script>
                window.location = 'index.php?section=trade';
            </script>
        <?php
        }

        ?>
    </div>
    <div class="main_section" id="main-section">
        <h3>Recent</h3>
        <div class="listings_container">
            <?php
            // REDIRECT USER TO APPROPRIATE SECTION (DEFAULT IS TRADE)
            $section = $_GET['section'];

            if ($section == "trade") {
                // ======= TRADE SECTION ========= //
                include "db_connect.php";
                $userid = $_SESSION["userid"];
                $result = $conn->query("SELECT l.*, u.* from sp_listings l inner join sp_users u on l.iUserid=u.id ORDER BY tsLastUpdated DESC");




                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <div class="list_items">
                            <form class="list_fav_btn" method="POST" action="favsystem.php">
                                <ion-icon name="bookmark-outline" class="bookmark_icon faved<?= $row['list_id'] ?>"></ion-icon>
                                <input type="hidden" name="list_id" value="<?= $row['list_id'] ?>">
                                <input type="hidden" name="user_id" value="<?= $userid ?>">
                            </form>
                            <div class="list_img_container" onclick="window.location='viewlisting.php?id=<?= $row['list_id'] ?>&cache=<?= time(); ?>'">
                                <img src="<?= $row['list_image'] ?>" alt="listing image" class="list_img">
                            </div>
                            <a href="#" class="list_text" onclick="window.location='viewlisting.php?id=<?= $row['list_id'] ?>&cache=<?= time(); ?>'">
                                <h5>
                                    <?= $row['list_title'] ?>

                                </h5>
                                <!-- <br> -->
                                <p>
                                    <?php
                                    if ($row['list_type'] == "trade") {
                                        // echo '<ion-icon name="repeat-outline" class="list_icons"></ion-icon>';
                                        echo 'Trade';
                                    } else {
                                        // echo '<ion-icon name="repeat-outline" class="list_icons"></ion-icon>';
                                        echo 'Free';
                                    }
                                    ?>
                                </p>

                                <div class="list_author" onclick="window.location='profile.php?userid=<?= $row['id'] ?>&section=trade'">
                                    <div class="list_author_profile_pic_container">
                                        <img src="<?= $row['s_ProfileImg'] ?>" alt="Profile Picture" class="list_author_profile_pic">
                                    </div>
                                    <p><?= $row['s_Username'] ?></p>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                } else {
                    // If There are no listings
                    echo "There are no listings available right now";
                }
                ?>
                <script>
                    $(".active_bar").css("transform", "translateX(-50%)");
                </script>

                <?php
            } else if ($section == "craft") {
                // ======= CRAFT SECTION ========= //
                include "db_connect.php";
                $userid = $_SESSION["userid"];
                $result = $conn->query("SELECT l.*, u.* from sp_craftlistings l inner join sp_users u on l.craftlist_iUserid=u.id ORDER BY tsLastUpdated DESC");

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>

                        <script>
                            $(".active_bar").css("transform", "translateX(50%)");
                        </script>

                        <div class="list_items">
                            <form class="list_fav_btn" method="POST" action="favsystemcraft.php">
                                <ion-icon name="bookmark-outline" class="bookmark_icon favedcraft<?= $row['craftlist_id'] ?>"></ion-icon>
                                <input type="hidden" name="craft_id" value="<?= $row['craftlist_id'] ?>">
                                <input type="hidden" name="user_id" value="<?= $userid ?>">
                            </form>
                            <div class="list_img_container" onclick="window.location='viewcraftlisting.php?id=<?= $row['craftlist_id'] ?>&cache=<?= time(); ?>'">
                                <img src="<?= $row['craftlist_image'] ?>" alt="listing image" class="list_img">
                            </div>
                            <a href="#" class="list_text" onclick="window.location='viewcraftlisting.php?id=<?= $row['craftlist_id'] ?>&cache=<?= time(); ?>'">
                                <h5><?= $row['craftlist_title'] ?><br></h5>

                                <span class="list_text_points"><?= $row['craftlist_price'] . " P" ?></span>

                                <div class="list_author" onclick="window.location='profile.php?userid=<?= $row['id'] ?>&section=trade'">
                                    <div class="list_author_profile_pic_container">
                                        <img src="<?= $row['s_ProfileImg'] ?>" alt="Profile Picture" class="list_author_profile_pic">
                                    </div>
                                    <p><?= $row['s_Username'] ?></p>
                                </div>
                            </a>
                        </div>

                <?php
                    }
                }
            } else {
                // ======= IF GOT ERROR OR LOADING SHOW PLACEHOLDERS ========= //
                ?>
                <script>
                    window.location = 'index.php?section=trade';
                </script>
                <div class="list_items">
                    <div class="list_fav_btn">
                        <ion-icon name="bookmark-outline" class="bookmark_icon"></ion-icon>
                    </div>
                    <div class="list_img_container">
                        <img src="img/placeholder-image.png" alt="listing image" class="list_img">
                    </div>
                    <a href="#" class="list_text">
                        <h5>Loading Lists</h5>
                        <div class="list_author">
                            <div class="list_author_profile_pic_container">
                                <img src="img/profile.png" alt="Profile Picture" class="list_author_profile_pic">
                            </div>
                            <p>Loading Lists</p>
                        </div>
                    </a>
                </div>
            <?php
            }

            ?>















        </div>
    </div>
    <!-- <section id="masthead">
    <h1>ThriftIt</h1>
    <p>Content and stuffs will go here</p> -->
    <!-- <div class="filter"></div>
        <h1>Big Headtitle Goes Here</h1>
        <h3>Here is where the subtitle or something can go</h3>
        <div class="btnbox">
            <a href="#" class="btn btn1">Button1</a>
            <a href="#" class="btn btn2">Button2</a>
        </div> -->

    <!-- </section> -->
    <?php include "navbar.php" ?>
    <?php include "footer.php"; ?>

</body>

<script>
    $(".btmnav1").addClass("active_btmnav");



    $('.section_bars').click(function(e) {
        e.preventDefault(); // prevent default anchor behavior
        var goTo = this.getAttribute("href"); // store anchor href

        // do something while timeOut ticks ... 

        setTimeout(function() {
            window.location = goTo;
        }, 300); // time in ms
    });

    

    $(".bookmark_icon").click(function() {
        if ($(this).attr("name") == "bookmark-outline") {
            $(this).attr("name", "bookmark");
        } else {
            $(this).attr("name", "bookmark-outline");
        }

        $(this).parent().submit();
    });
</script>

<?php
$result2 = $conn->query("SELECT * from sp_favourites where fav_userid = $userid");

while ($row2 = $result2->fetch_assoc()) {
?>
    <script>
        $(".faved" + <?= $row2['fav_listid'] ?>).attr("name", "bookmark");
        
        $(".favedcraft" + <?= $row2['fav_craftid'] ?>).attr("name", "bookmark");
    </script>
<?php
}
?>