<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
}

?>



<body id="favourites">
    <h2>Favourites</h2>
    <div class="home_section_bar_container">
        <div class="home_section_bar">
            <div class="active_bar section_bars"></div>
            <a href="favourites.php?section=trade" class="trade_bar section_bars">
                Trade & Free
            </a>
            <a href="favourites.php?section=craft" class="crafted_bar section_bars">
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
                window.location = 'favourites.php?section=trade';
            </script>
        <?php
        }

        ?>
    </div>
    <a href="index.php" class="back_btn">
        <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
    <?php //include "header.php"; 
    ?>


    <div class="main_section" id="main-section">
        <div class="listings_container">
            <?php
            // REDIRECT USER TO APPROPRIATE SECTION (DEFAULT IS TRADE)
            $section = $_GET['section'];

            if ($section == "trade") {
                // ======= TRADE SECTION ========= //
                include "db_connect.php";
                $userid = $_SESSION["userid"];
                $result = $conn->query("SELECT l.*, u.s_Username,u.s_ProfileImg from sp_listings l inner join sp_users u on l.iUserid=u.id ORDER BY tsLastUpdated DESC");




                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <div class="list_items faveditem<?= $row['list_id'] ?>">
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
                    echo "<h1>You have no listings favourited.</h1>";
                    echo "<h3>You can add them <a href='index.php?section=trade'>here</a></h3><br><br><br>";
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
                $result = $conn->query("SELECT l.*, u.s_Username,u.s_ProfileImg from sp_craftlistings l inner join sp_users u on l.craftlist_iUserid=u.id ORDER BY tsLastUpdated DESC");

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>

                        <script>
                            $(".active_bar").css("transform", "translateX(50%)");
                        </script>

                        <div class="list_items faveditemcraft<?= $row['craftlist_id'] ?>">
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
                    echo "<h1>You have no listings favourited.</h1>";
                    echo "<h3>You can add them <a href='index.php?section=craft'>here</a></h3><br><br><br>";
                }
            } else {
                // ======= IF GOT ERROR OR LOADING SHOW PLACEHOLDERS ========= //
                ?>
                <script>
                    window.location = 'favourites.php?section=trade';
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

<style>
    body {
        background-color: #D4E6C0;
    }

    #favourites {
        transition: all 0.3s;
    }

    #favourites>h2 {
        text-align: center;
        top: 20px;
        position: fixed;
        width: 100%;
        z-index: -1;
    }

    .back_btn {
        color: black;
        z-index: -1;
    }

    .home_section_bar_container {
        padding-top: 0px;
        top: 60px;
        position: fixed;
        width: 100%;
        z-index: 9;
    }

    .active_bar {
        background-color: #80A299;
    }

    .main_section {
        /* border: 2px solid red; */
        background-color: white;
        width: 100%;
        border-radius: 20px 20px 0px 0px;
        background-color: white;
        padding-bottom: 80px;
        margin-bottom: -10px;
        margin-top: 150px;

    }

    .listings_container {
        width: 90%;
        margin: 0 auto;
    }

    footer {
        height: 0px
    }
</style>


<script>
    // $(".btmnav1").addClass("active_btmnav");



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
        console.log("asdasd");
    });
</script>

<?php
$result2 = $conn->query("SELECT * from sp_favourites where fav_userid = $userid");

while ($row2 = $result2->fetch_assoc()) {
?>
    <script>
        $(".faved" + <?= $row2['fav_listid'] ?>).attr("name", "bookmark")
        $(".list_items").css("display", "none")

        $(".favedcraft" + <?= $row2['fav_craftid'] ?>).attr("name", "bookmark");
        setTimeout(() => {
            $(".faveditem" + <?= $row2['fav_listid'] ?>).css("display", "block")

        }, 10);
        
        setTimeout(() => {
            $(".faveditemcraft" + <?= $row2['fav_craftid'] ?>).css("display", "block")
        }, 10);
    </script>
<?php
}
?>
