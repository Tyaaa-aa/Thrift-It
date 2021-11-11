<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
} else {
    include "db_connect.php";
    $userid = $_SESSION["userid"];
    $sellerid = $_GET['sellerid'];
    $listid = $_GET['listid'];
    $buyerid = $_GET['buyerid'];

    $result = $conn->query("SELECT * from sp_craftlistings where craftlist_id = $listid");

    $row = $result->fetch_assoc();

    // echo $row['list_points'] . "<br>";
    // echo $row['list_carbon'] . "<br>";

    $points = $row['craftlist_price'];
    // echo $points . "ASDASDASD";
    // if ($listtype == "trade") {
    // both users get points if trade

    include "db_connect.php";
    $stmt = $conn->prepare("UPDATE sp_users set user_points=user_points+$points where id = $sellerid");
    $stmt->bind_param("i", $points);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    include "db_connect.php";
    $stmt = $conn->prepare("UPDATE sp_users set user_points=user_points-$points where id = $buyerid");
    $stmt->bind_param("i", $points);
    $stmt->execute();
    $stmt->close();
    $conn->close();

?>

    <body>
        <div class="transact_popup">
            <h3>
                Claim your reward for
                doing your part to save the
                earth by upcycling!
            </h3>
            <div class="transact_stats">
                <div>
                    <h1><?= $points ?></h1>
                    <p>POINTS</p>
                </div>
            </div>
            <a class="onboarding_btn offer_btn" href="profile.php?userid=<?= $userid ?>&section=trade">Accept</a>
        </div>
    </body>
<?php
    // DELETE LISTING
    include "db_connect.php";
    $stmt = $conn->prepare("DELETE from sp_craftlistings where craftlist_id=$listid");
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // DELETE CHATS FROM LISTING
    include "db_connect.php";
    $stmt = $conn->prepare("DELETE from sp_craftchats where craftchat_listid=$listid");
    $stmt->execute();
    $stmt->close();
    $conn->close();
    // }
}

?>
<style>
    .transact_popup {
        /* white-space: pre-wrap; */
        text-align: center;
        position: fixed;
        background-color: #fff;
        width: 80%;
        transform: translate(-50%, 0%);
        margin-left: 50%;
        list-style: none;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        border-radius: 20px;
        transition: all 0.3s;
        overflow: hidden;
        filter: drop-shadow(0px 2px 3px rgba(0, 0, 0, 0.2));

        opacity: 1;
        /* margin-top: 20%;
        padding: 0px;
        height: 0%; */
        margin-top: 50%;
        padding: 20px;
        height: 50%;
    }

    .transact_stats {
        display: flex;
        /* border: 2px solid red; */
        width: 70%;
        justify-content: space-between;
    }

    .transact_stats {
        display: flex;
        /* border: 2px solid red; */
        flex-direction: column;
    }

    .transact_stats h1 {
        margin: 0;
    }
</style>