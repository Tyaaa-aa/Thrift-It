<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
}

$userid = $_SESSION["userid"];
$craftlisting_id = $_GET['id'];
// echo "$craftlisting_id";
include "db_connect.php";
$result = $conn->query("SELECT l.*, u.s_Username,u.s_ProfileImg,u.id from sp_craftlistings l inner join sp_users u on l.craftlist_iUserid=u.id WHERE l.craftlist_id=$craftlisting_id");

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // ====== DISPLAY LISTING CONTENT ========
?>

        <body id="viewlisting">
            <a href="index.php" class="back_btn">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>

            <?php
            if ($userid == $row['craftlist_iUserid']) {
            ?>
                <a href="#" class="more_btn">
                    <ion-icon name="ellipsis-vertical"></ion-icon>
                </a>
                <div class="more_popup">
                    <ul>
                        <li><a href="editlisting.php?id=<?= $row['craftlist_id'] ?>&userid=<?= $row['id'] ?>&type=craft">Edit Listing</a></li>
                        <li class="nav_li_topline"><a href="deletelisting.php?id=<?= $row['craftlist_id'] ?>&userid=<?= $row['iUserid'] ?>&type=craft" onclick="return confirm('Are you sure you want to delete your craft listing?')">Delete Listing</a></li>
                    </ul>
                </div>
            <?php
            }
            ?>

            <img src="<?= $row['craftlist_image']; ?>" alt="Listing Image" class="viewlist_image">

            <div class="viewlist_content_container">
                <div class="viewlist_content_header">
                    <h2 class="viewlist_title"><?= $row['craftlist_title']; ?></h2>
                    <form class="list_fav_btn" method="POST" action="favsystemcraft.php">
                        <ion-icon name="bookmark-outline" class="bookmark_icon faved<?= $row['craftlist_id'] ?>"></ion-icon>
                        <input type="hidden" name="craft_id" value="<?= $row['craftlist_id'] ?>">
                        <input type="hidden" name="user_id" value="<?= $userid ?>">
                    </form>
                    <div class="gradient_filter"></div>
                </div>
                <a href="profile.php?userid=<?= $row['id'] ?>&section=trade" class="list_author">
                    <div class="list_author_profile_pic_container">
                        <img src="<?= $row['s_ProfileImg'] ?>" alt="Profile Picture" class="list_author_profile_pic">
                    </div>
                    <p><?= $row['s_Username'] ?></p>
                </a>
                <div class="viewlist_rows">
                    <div>
                        <ion-icon name="time-outline" class="viewlisting_icons"></ion-icon>
                    </div>
                    <p>
                        <?php
                        $time_ago = strtotime($row['tsLastUpdated']);
                        echo time_Ago($time_ago);
                        // echo $time_ago;
                        ?>
                    </p>
                </div>
                <div class="viewlist_rows">
                    <div>
                        <ion-icon name="list-outline" class="viewlisting_icons"></ion-icon>
                    </div>
                    <p><b><?= $row['craftlist_price'] ?></b> Points</p>
                </div>
                <div class="viewlist_rows">
                    <?php
                    if ($row['craftlist_dealMethod'] == "Meet-Up") {
                        echo '<div><ion-icon name="location-outline" class="viewlisting_icons"></ion-icon></div>';
                    } else {
                        echo '<div><ion-icon name="car-outline" class="viewlisting_icons"></ion-icon></div>';
                    }
                    ?>
                    <p><b><?= $row['craftlist_dealMethod'] ?></b></p>
                </div>
                <div class="viewlist_rows viewlist_description">
                    <div>
                        <ion-icon name="reader-outline" class="viewlisting_icons"></ion-icon>
                    </div>
                    <p>
                        <?php
                        // Display whitespace properly using nl2br php function
                        $string = $row['craftlist_desc'];
                        echo nl2br($string);
                        ?>
                    </p>
                </div>
            </div>

            <?php
            if ($row['id'] == $_SESSION['userid']) {
                //SELLER BUTTON
            ?>
                <form action="viewcraftchats.php?section=selling">
                    <input type="submit" value="View Your Messages" class="onboarding_btn viewlisting_chat_btn">
                </form>
            <?php
            } else {
                // BUYER BUTTON
            ?>
                <form action="craftchat.php" method="GET">
                    <input type="hidden" value="<?= $_SESSION["userid"] ?>" name="buyerid">
                    <input type="hidden" value="<?= $row['craftlist_iUserid'] ?>" name="sellerid">
                    <input type="hidden" value="<?= $row['craftlist_id'] ?>" name="listid">

                    <input type="submit" value="Chat" class="onboarding_btn viewlisting_chat_btn">
                </form>
            <?php
            }
            ?>

        </body>





<?php

    }
} else {
    echo "Something went wrong.";
}
?>


<style>
    
</style>

<script>
    $(".bookmark_icon").click(function() {
        if ($(this).attr("name") == "bookmark-outline") {
            $(this).attr("name", "bookmark");
        } else {
            $(this).attr("name", "bookmark-outline");
        }

        $(this).parent().submit();
        console.log("asdasd");
    });

    $("#viewlisting .more_btn").click(function() {
        console.log("More Button Clicked");
        setTimeout(() => {
            $(".more_popup").css("height", "120px");
            $(".more_popup").css("width", "170px");
            $(".more_popup").css("padding", "15px");
        }, 10);
        // alert("Still doing :P")
    });

    $("#viewlisting").click(function() {
        console.log("More Button Clicked");
        $(".more_popup").css("height", "0px");
        $(".more_popup").css("width", "0px");
        $(".more_popup").css("padding", "0px");
        // alert("Still doing :P")
    });
</script>
<?php
function time_Ago($time)
{
    // Calculate difference between current 
    // time and given timestamp in seconds 
    $diff = time() - 28800 - $time;

    // Time difference in seconds 
    $sec = $diff;

    // Convert time difference in minutes 
    $min = round($diff / 60);

    // Convert time difference in hours 
    $hrs = round($diff / 3600);

    // Convert time difference in days 
    $days = round($diff / 86400);

    // Convert time difference in weeks 
    $weeks = round($diff / 604800);

    // Convert time difference in months 
    $mnths = round($diff / 2600640);

    // Convert time difference in years 
    $yrs = round($diff / 31207680);

    // Check for seconds 
    if ($sec <= 60) {
        echo "$sec seconds ago";
    }

    // Check for minutes 
    else if ($min <= 60) {
        if ($min == 1) {
            echo "one minute ago";
        } else {
            echo "$min minutes ago";
        }
    }

    // Check for hours 
    else if ($hrs <= 24) {
        if ($hrs == 1) {
            echo "an hour ago";
        } else {
            echo "$hrs hours ago";
        }
    }

    // Check for days 
    else if ($days <= 7) {
        if ($days == 1) {
            echo "Yesterday";
        } else {
            echo "$days days ago";
        }
    }

    // Check for weeks 
    else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            echo "a week ago";
        } else {
            echo "$weeks weeks ago";
        }
    }

    // Check for months 
    else if ($mnths <= 12) {
        if ($mnths == 1) {
            echo "a month ago";
        } else {
            echo "$mnths months ago";
        }
    }

    // Check for years 
    else {
        if ($yrs == 1) {
            echo "one year ago";
        } else {
            echo "$yrs years ago";
        }
    }
}
?>

<?php
$result2 = $conn->query("SELECT * from sp_favourites where fav_userid = $userid");

while ($row2 = $result2->fetch_assoc()) {
?>
    <script>
        $(".faved" + <?= $row2['fav_craftid'] ?>).attr("name", "bookmark")
    </script>
<?php
}
?>