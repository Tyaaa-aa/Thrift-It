<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
} else {
    include "db_connect.php";
    $userid = $_SESSION["userid"];
    $sellerid = $_GET['sellerid'];
    $listid = $_GET['listid'];


    $result = $conn->query("SELECT c.*, 
    u.s_Username, u.s_ProfileImg 
    from sp_chats c 
    inner join sp_users u 
    on c.chat_sellerid=u.id 
    WHERE c.chat_sellerid=$sellerid and c.chat_listid = $listid
    ORDER BY tsLastUpdated DESC");

    $chatidresults = $conn->query("SELECT * from sp_listings where list_id = $listid");
    $chatidrow = $chatidresults->fetch_assoc();
    
    if ($result->num_rows > 0) {
        // ===== IF HAVE CHATS DO THIS ======== (DISPLAY THE CHATS)
        while ($row = $result->fetch_assoc()) {
            $sellername = $row['s_Username'];
            $sellerpic = $row['s_ProfileImg'];
        }
?>

        <body id="chats">
            <a href="viewchats.php" class="back_btn">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
            <a href="#" class="more_btn offer_icon_container">
                <img src="img/offericon.png" alt="Offer Icon" class="offer_icon">
            </a>
            <div class="offer_popup">
                <h2 class="offer_popup_closebtn">X</h2>
                <h2>Do you want to get this item?</h2>
                <img src="<?= $chatidrow['list_image'] ?>">
                <h4><?= $chatidrow['list_title'] ?></h4>
                <a class="onboarding_btn offer_btn" href="buyeroffer.php?buyerid=<?= $userid ?>&sellerid=<?= $sellerid ?>&listid=<?= $listid ?>&offertype=offer">Make Offer</a>
            </div>
            <h2 class="headtitles"><?= $sellername ?></h2>
            <?php
            $result2 = $conn->query("SELECT * from sp_chats where chat_buyerid = $userid and chat_sellerid = $sellerid and chat_listid = $listid ORDER BY tsLastUpdated DESC");

            $row2 = $result2->fetch_assoc();
            
            if ($row2['chat_buyeroffer'] == "true") {
                echo $row2['chat_buyeroffer'];
            ?>
                <div class="offer_status_container">
                    <h3>Status: Pending</h3>
                    <a class="onboarding_btn offer_btn" href="buyeroffer.php?buyerid=<?= $userid ?>&sellerid=<?= $sellerid ?>&listid=<?= $listid ?>&offertype=cancel">Cancel Offer</a>

                </div>

                <script>
                    $(".offer_icon_container").css("display", "none");
                </script>
            <?php
            }
            ?>
            <div class="message_container">
                <?php
                $result3 = $conn->query("SELECT * from sp_chats where chat_buyerid = $userid and chat_sellerid = $sellerid and chat_listid = $listid ORDER BY tsLastUpdated DESC");

                if ($result3->num_rows > 0) {
                    while ($row2 = $result3->fetch_assoc()) {
                        if ($row2['chat_buyermessage'] != "") {
                            // SHOW BUYER MESSAGES
                            // echo "You: <br>";
                            // echo $row2['chat_buyermessage'];
                            // echo "<br><br>";

                ?>
                            <div class="buyer_message messages">
                                <p><?= $row2['chat_buyermessage'] ?></p>
                            </div>
                        <?php
                        }
                        if ($row2['chat_sellermessage'] != "") {
                            // SHOW SELLER MESSAGES
                        ?>
                            <div class="seller_message messages">
                                <p><?= $row2['chat_sellermessage'] ?></p>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
            <form action="insertchat_backend.php" class="message_input" autocomplete="off" method="POST">

                <input type="hidden" value="<?= $_GET['listid'] ?>" name="chat_listid">
                <input type="hidden" value="<?= $_SESSION["userid"] ?>" name="chat_buyerid">
                <input type="hidden" value="<?= $_GET['sellerid'] ?>" name="chat_sellerid">

                <input type="hidden" value="buyer" name="chat_origin">

                <input type="text" placeholder="Write a message" name="chat_message" id="list_title" class="inputForm" autocomplete="off" required autofocus>
            </form>
        </body>
        <?php
    } else {
        // ===== IF NO CHATS DO THIS ========
        // echo $sellerid;
        $result2 = $conn->query("SELECT * from sp_users where id = $sellerid");
        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                $sellername = $row2['s_Username'];
                $sellerpic = $row2['s_ProfileImg'];
            }
        ?>

            <body id="chats">

                <a href="viewchats.php" class="back_btn">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
                <h2 class="headtitles"><?= $sellername ?></h2>
                <p style="padding: 20px; padding-top: 100px;">This is the beginning of your conversation with: <b><?= $sellername ?></b></p>
                <form action="insertchat_backend.php" class="message_input" autocomplete="off" method="POST">
                    <input type="hidden" value="<?= $_GET['listid'] ?>" name="chat_listid">
                    <input type="hidden" value="<?= $_SESSION["userid"] ?>" name="chat_buyerid">
                    <input type="hidden" value="<?= $_GET['sellerid'] ?>" name="chat_sellerid">

                    <input type="hidden" value="buyer" name="chat_origin">

                    <input type="text" placeholder="Write a message" name="chat_message" id="list_title" class="inputForm" autocomplete="off" required autofocus>
                </form>
            </body>
<?php
        } else {
            echo "Something went wrong";
            ?>
            <script>
                alert("Either this post has been deleted or the transaction was successful. You will be redirected to your profile page.");

                window.location="profile.php?userid=<?= $userid ?>&section=trade";
            </script>
            <?php
        }
    }
}
?>
<style>
    .offer_status_container {
        /* border: 2px solid red; */
        background-color: white;
        position: fixed;
        width: 100%;
        padding: 20px;
        padding-top: 80px;
        padding-bottom: 0px;
        display: flex;
        justify-content: space-between;
        filter: drop-shadow(0px 2px 3px rgba(0, 0, 0, 0.2));
        border-radius: 0px 0px 20px 20px;
    }

    .offer_btn {

        padding: 8px 15px;
        width: auto;
    }
</style>


<script>
    $(function() {
        // $("body").scrollTop(1000);

        $('html, body').scrollTop($(document).height());

        // var refresh = setTimeout(() => {
        //     location.reload();
        // }, 2000);

        $("body").click(function() {
            // refresh = setTimeout(() => {
            //     location.reload();
            // }, 2000);
            console.log("Timeout Resumed");
            timer.resume();
            $(".offer_popup").css("height", "0%");
            $(".offer_popup").css("opacity", "0");
            $(".offer_popup").css("padding", "0px");
            $(".offer_popup").css("margin-top", "20%");
        })

        $(".inputForm, .more_btn").click(function() {
            setTimeout(() => {
                // clearTimeout(refresh);
                console.log("Timeout Paused");
                timer.pause();
            }, 10);
        });

        // $(".more_popup").css("height", "30%");
        // $(".more_popup").css("width", "80%");
        // $(".more_popup").css("padding", "15px");
        $(".more_btn").click(function() {
            console.log("More Button Clicked");
            setTimeout(() => {
                $(".offer_popup").css("height", "50%");
                $(".offer_popup").css("opacity", "1");
                $(".offer_popup").css("padding", "20px");
                $(".offer_popup").css("margin-top", "50%");
            }, 10);
            // alert("Still doing :P")
        });

        $(".offer_popup_closebtn").click(function() {
            $(".offer_popup").css("height", "0%");
            $(".offer_popup").css("opacity", "0");
            $(".offer_popup").css("padding", "0px");
            $(".offer_popup").css("margin-top", "20%");
        });

        function Timer(callback, delay) {
            var timerId, start, remaining = delay;

            this.pause = function() {
                window.clearTimeout(timerId);
                remaining -= new Date() - start;
            };

            this.resume = function() {
                start = new Date();
                window.clearTimeout(timerId);
                timerId = window.setTimeout(callback, remaining);
            };

            this.resume();
        }

        var timer = new Timer(function() {
            location.reload();
        }, 2000);
    });
</script>