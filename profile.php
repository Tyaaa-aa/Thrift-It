<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
}
$userid = $_GET["userid"];
include "db_connect.php";
// $result = $conn->query("SELECT * from sp_users where id=$userid");


// $result = $conn->query("SELECT * FIND_IN_SET( user_points, (SELECT GROUP_CONCAT( user_points
// ORDER BY user_points DESC )
// FROM sp_users )
// AS rank
// from sp_users
// where id=$userid");

$result = $conn->query("SELECT *, FIND_IN_SET( user_points, (
    SELECT GROUP_CONCAT( user_points
    ORDER BY user_points DESC ) 
    FROM sp_users )
    ) AS rank
    FROM sp_users
    WHERE id= $userid");

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $email = $row["s_Email"];
        $username = $row["s_Username"];
        $profile = $row["s_ProfileImg"];
        $points = $row["user_points"];
        $carbon = round($row["user_carbon"] / 1000, 1);
        $rank = $row["rank"];
    }

    $result2 = $conn->query("SELECT * from sp_favourites where fav_userid=$userid");

    if ($result2->num_rows > 0) {
        $row2 = mysqli_num_rows($result);
        $rowcount = mysqli_num_rows($result2);
        // echo $rowcount;
    } else {
        $rowcount = "No";
    }

?>

    <body id="profile">
        <a href="index.php?section=trade" class="back_btn">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        <div class="gradient_filter"></div>
        <div class="user_pic">
            <div class="user_info_container">
                <div class="user_info">
                    <h2><?= $username ?></h2>
                    <div class="user_stats_container">
                        <div class="user_stat1 user_stats">
                            <h2><?= $rowcount ?></h2>
                            <p>FAVOURITES</p>
                        </div>
                        <div class="user_stat2 user_stats">
                            <h2><span>#</span> <?= $rank ?></h2>
                            <p>RANK</p>
                        </div>
                        <div class="user_stat3 user_stats">
                            <h2><?= $carbon ?> <span>kg</span></h2>
                            <p>CARBON SAVED</p>
                        </div>
                        <div class="user_stat4 user_stats">
                            <h2><?= $points ?></h2>
                            <p>POINTS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ===== SHOW USER POSTS ========= -->

        <div class="listings_container">
            <div class="line"></div>
            <div class="home_section_bar_container">
                <div class="home_section_bar">
                    <div class="active_bar section_bars"></div>
                    <a href="profile.php?userid=<?= $userid ?>&section=trade" class="trade_bar section_bars">
                        Trade & Free
                    </a>
                    <a href="profile.php?userid=<?= $userid ?>&section=craft" class="crafted_bar section_bars">
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
            <?php
            // REDIRECT USER TO APPROPRIATE SECTION (DEFAULT IS TRADE)
            $section = $_GET['section'];

            if ($section == "trade") {
                // ======= TRADE SECTION ========= //
                include "db_connect.php";
                // $userid = $_SESSION["userid"];
                $result = $conn->query("SELECT l.*, u.s_Username,u.s_ProfileImg from sp_listings l inner join sp_users u on l.iUserid=u.id where iUserid=$userid ORDER BY tsLastUpdated DESC");




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

                                <div class="list_author" onclick="window.location='viewlisting.php?id=<?= $row['list_id'] ?>&cache=<?= time(); ?>'">
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
                    if ($userid == $_SESSION["userid"]) {
                        echo "<h1>You have no listings.</h1>";
                        echo "<h3>You can make one <a href='craftlisting.php'>here</a></h3><br><br><br>";
                    } else {
                        // echo "<h3>You can make one <a href='craftlisting.php'>here</a></h3><br><br><br>";
                    ?>
                        <h1>This user has no listings.</h1>
                <?php
                    }
                }
                ?>
                <script>
                    $(".active_bar").css("transform", "translateX(-50%)");
                </script>

                <?php
            } else if ($section == "craft") {
                // ======= CRAFT SECTION ========= //
                include "db_connect.php";
                // $userid = $_SESSION["userid"];
                $result = $conn->query("SELECT l.*, u.s_Username,u.s_ProfileImg from sp_craftlistings l inner join sp_users u on l.craftlist_iUserid=u.id where l.craftlist_iUserid=$userid ORDER BY tsLastUpdated DESC");

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

                                <div class="list_author" onclick="window.location='viewcraftlisting.php?id=<?= $row['craftlist_id'] ?>&cache=<?= time(); ?>'">
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
                    // $userid = $_SESSION["userid"];

                    if ($userid == $_SESSION["userid"]) {
                        echo "<h1>You have no listings.</h1>";
                        echo "<h3>You can make one <a href='craftlisting.php'>here</a></h3><br><br><br>";
                    } else {
                        echo "<h1>This user has no listings.</h1>";
                        // echo "<h3>You can make one <a href='craftlisting.php'>here</a></h3><br><br><br>";
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
    </body>

    <style>
        .user_pic {
            background-image: url(<?= $profile ?>);
        }
    </style>
    <script>
        $(".user_stat1").click(function() {
                // signOut();
                window.location.href = 'favourites.php?section=trade';
            }

        );

        $(".bookmark_icon").click(function() {
                if ($(this).attr("name") == "bookmark-outline") {
                    $(this).attr("name", "bookmark");
                } else {
                    $(this).attr("name", "bookmark-outline");
                }

                $(this).parent().submit();
            }

        );
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
<?php
} else {
    echo "Something went wrong";
}





?>