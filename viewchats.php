<?php
include "head.php";

include "db_connect.php";
$section = $_GET['section'];
if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
}
// REDIRECT USER TO APPROPRIATE SECTION (DEFAULT IS SELLING CHATS)

else if ($section == "selling") {
    // SHOW SELLING SELLING
    // echo "SELLING";
    $userid = $_SESSION["userid"];

    $result = $conn->query("SELECT DISTINCT 
        chats.chat_buyerid, chats.chat_listid,

        user.s_Username, user.s_ProfileImg, 

        listing.*

        FROM sp_chats chats

        INNER JOIN sp_users user
        ON chats.chat_buyerid = user.id

        INNER JOIN sp_listings listing
        on chats.chat_listid = listing.list_id
        WHERE chat_sellerid = $userid
        
        ORDER BY chat_id desc");



    // ===== IF HAVE CHATS DO THIS ======== (DISPLAY THE CHATS)
?>

    <body id="viewchats">
        <a href="index.php" class="back_btn">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        <a href="#" class="more_btn">
            <ion-icon name="ellipsis-vertical"></ion-icon>
        </a>
        <div class="more_popup">
            <ul>
                <li><a href="viewchats.php?section=selling">Trade & Free</a></li>

                <li class="nav_li_topline"><a href="viewcraftchats.php?section=selling">Crafted</a></li>
            </ul>
        </div>
        <h2 class="headtitles">Trade Chats</h2>
        <div class="home_section_bar_container">
            <div class="home_section_bar">
                <div class="active_bar section_bars"></div>
                <a href="viewchats.php?section=selling" class="trade_bar section_bars">Selling</a>
                <a href="viewchats.php?section=buying" class="crafted_bar section_bars">Buying</a>
            </div>
            <?php
            // REDIRECT USER TO APPROPRIATE SECTION (DEFAULT IS TRADE)
            $section = $_GET['section'];

            if ($section == "selling") {
            ?>
                <script>
                    $(".active_bar").css("transform", "translateX(-50%)");


                    $(".crafted_bar").click(function() {
                        $(".active_bar").css("transform", "translateX(50%)");
                        console.log("crafted section");
                        $("#viewchats_container").css("transform", "translateX(-120%)");
                    });
                </script>
            <?php
            } else if ($section == "buying") {
            ?>
                <script>
                    $(".active_bar").css("transform", "translateX(50%)");
                    $(".trade_bar").click(function() {
                        $(".active_bar").css("transform", "translateX(-50%)");
                        console.log("trade section");
                        $("#viewchats_container").css("transform", "translateX(120%)");

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
        <div class="viewchats_container" id="viewchats_container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $buyerid = $row['chat_buyerid'];
                    // $sellerid = $row['chat_sellerid'];
                    $chatlistid = $row['chat_listid'];

            ?>
                    <a href="sellerchat.php?buyerid=<?= $buyerid ?>&sellerid=<?= $userid ?>&listid=<?= $chatlistid ?>" class="viewchats">
                        <img src="<?= $row['list_image'] ?>" alt="List Thumbnail" class="viewchats_listingpic">
                        <div class="viewchats_textcontent">
                            <h3><?= $row['list_title'] ?></h3>
                            <div class="viewchats_author">
                                <img src="<?= $row['s_ProfileImg'] ?>" alt="profile Pic" class="viewchats_profilepic">

                                <p><?= $row['s_Username'] ?></p>
                                <div class="viewchats_listtype">
                                    <?= $row['list_type'] ?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php

                }
                ?>

        </div>
    </body>
<?php

            } else {
                echo "<h3 style='margin-top:20px;'>You have no chats yet!</h3>";
            }

?>

<?php
} else if ($section == "buying") {
    //SHOW BUYING CHATS
    // echo "BUYING";
    // SHOW SELLING SELLING
    $userid = $_SESSION["userid"];

    $result = $conn->query("SELECT DISTINCT 
    chats.chat_buyerid, chats.chat_listid,

    user.s_Username, user.s_ProfileImg, user.id, 

    listing.*

    FROM sp_chats chats

    INNER JOIN sp_users user
    ON chats.chat_sellerid = user.id

    INNER JOIN sp_listings listing
    on chats.chat_listid = listing.list_id

    WHERE chat_buyerid = $userid

    ORDER BY chat_id desc");



    // ===== IF HAVE CHATS DO THIS ======== (DISPLAY THE CHATS)
?>

    <body id="viewchats">
        <a href="index.php" class="back_btn">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
        <a href="#" class="more_btn">
            <ion-icon name="ellipsis-vertical"></ion-icon>
        </a>
        <div class="more_popup">
            <ul>
                <li><a href="viewchats.php?section=selling">Trade & Free</a></li>

                <li class="nav_li_topline"><a href="viewcraftchats.php?section=selling">Crafted</a></li>
            </ul>
        </div>
        <h2 class="headtitles">Trade Chats</h2>
        <div class="home_section_bar_container">
            <div class="home_section_bar">
                <div class="active_bar section_bars"></div>
                <a href="viewchats.php?section=selling" class="trade_bar section_bars">
                    Selling
                </a>
                <a href="viewchats.php?section=buying" class="crafted_bar section_bars">
                    Buying
                </a>
            </div>
            <?php
            // REDIRECT USER TO APPROPRIATE SECTION (DEFAULT IS TRADE)
            $section = $_GET['section'];

            if ($section == "selling") {
            ?>
                <script>
                    $(".active_bar").css("transform", "translateX(-50%)");


                    $(".crafted_bar").click(function() {
                        $(".active_bar").css("transform", "translateX(50%)");
                        console.log("crafted section");
                        $("#viewchats_container").css("transform", "translateX(-120%)");
                    });
                </script>
            <?php
            } else if ($section == "buying") {
            ?>
                <script>
                    $(".active_bar").css("transform", "translateX(50%)");
                    $(".trade_bar").click(function() {
                        $(".active_bar").css("transform", "translateX(-50%)");
                        console.log("trade section");
                        $("#viewchats_container").css("transform", "translateX(120%)");

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
        <div class="viewchats_container" id="viewchats_container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $buyerid = $row['chat_buyerid'];
                    $sellerid = $row['id'];
                    $chatlistid = $row['chat_listid'];

            ?>
                    <a href="chat.php?buyerid=<?= $buyerid ?>&sellerid=<?= $sellerid ?>&listid=<?= $chatlistid ?>" class="viewchats">
                        <img src="<?= $row['list_image'] ?>" alt="List Thumbnail" class="viewchats_listingpic">
                        <div class="viewchats_textcontent">
                            <h3><?= $row['list_title'] ?></h3>
                            <div class="viewchats_author">
                                <img src="<?= $row['s_ProfileImg'] ?>" alt="profile Pic" class="viewchats_profilepic">

                                <p><?= $row['s_Username'] ?></p>
                                <div class="viewchats_listtype">
                                    <?= $row['list_type'] ?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php

                }
                ?>

        </div>
    </body>
<?php

            } else {
                echo "<h3 style='margin-top:20px;'>You have no chats yet!</h3>";
            }
        } else {
?>
<script>
    window.location = 'viewchats.php?section=selling';
</script>
<?php
        }

?>
<script>
    $("#viewchats .more_btn").click(function() {
        console.log("More Button Clicked");
        setTimeout(() => {
            $(".more_popup").css("height", "120px");
            $(".more_popup").css("width", "170px");
            $(".more_popup").css("padding", "15px");
        }, 10);
        // alert("Still doing :P")
    });

    $("#viewchats").click(function() {
        console.log("More Button Clicked");
        $(".more_popup").css("height", "0px");
        $(".more_popup").css("width", "0px");
        $(".more_popup").css("padding", "0px");
        // alert("Still doing :P")
    });
    $('.section_bars').click(function(e) {
        e.preventDefault(); // prevent default anchor behavior
        var goTo = this.getAttribute("href"); // store anchor href

        // do something while timeOut ticks ... 

        setTimeout(function() {
            window.location = goTo;
        }, 300); // time in ms
    });
</script>

<style>
    #viewchats {
        transition: all 0.3s;
    }

    #viewchats_container {
        transition: all 0.3s;
    }

    #viewchats .headtitles {
        color: black;
        background-color: white;
        padding-top: 30px;
        width: 100%;
        margin-bottom: 0;
        padding-bottom: 10px;
    }

    #viewchats .back_btn,
    #viewchats .more_btn {
        color: black;
    }

    .viewchats_container {
        padding: 10px;
        /* padding-top: 100px; */
        /* border: 2px solid blue; */
        /* height: 90%; */
    }

    .viewchats {
        /* border: 2px solid red; */
        background-color: #DBF1E1;
        display: flex;
        border-radius: 20px;
        margin-top: 20px;
        padding: 10px;
        /* flex-direction: column; */
    }

    .viewchats_author {
        display: flex;
        align-items: center;
        font-weight: 500;
    }

    .viewchats_profilepic {
        width: 30px;
        height: 30px;
        border-radius: 50px;
        margin-right: 10px;
        object-fit: cover;
        object-position: center;
    }

    .viewchats_listingpic {
        width: 70px;
        height: 70px;
        border-radius: 10px;
        margin-right: 10px;
        object-fit: cover;
        object-position: center;
    }

    .viewchats_textcontent {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .viewchats_textcontent {
        color: black;
        /* border: 2px solid blue; */
        /* width: 60%; */
    }

    .viewchats_textcontent h3 {
        font-size: 1em;
    }

    .viewchats_listtype {
        display: flex;
        align-items: center;
        border: 2px solid #85A399;
        border-radius: 6px;
        padding: 2px 10px;
        width: 80px;
        /* height: 30px; */
        justify-content: center;
        color: black;
        font-size: 0.9em;
        margin-left: 15px;
    }
</style>