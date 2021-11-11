<?php
$buyerid = $_GET['buyerid'];
$sellerid = $_GET['sellerid'];
$listid = $_GET['listid'];
$offertype = $_GET['offertype'];

// echo $buyerid . "<br>" . $sellerid . "<br>" . $listid;
echo $offertype;


include "db_connect.php";

if ($offertype == "offer") {
    // CHECK IF USER HAS ENOUGH POINTS FIRST

    $checkuser = $conn->query("SELECT * from sp_users where id = $buyerid");
    $userrow = $checkuser->fetch_assoc();

    // Users available points
    $userrowpoints = $userrow['user_points'];

    // ==============

    $checkprice = $conn->query("SELECT * from sp_craftlistings where craftlist_id = $listid");
    $pricerow = $checkprice->fetch_assoc();

    // Listing points price
    $pricerowpoints = $pricerow['craftlist_price'];


    if ($userrowpoints >= $pricerowpoints) {
        echo "Updating Offer <br>";
        include "db_connect.php";
        $offerstatus = "true";

        $stmt = $conn->prepare("UPDATE sp_craftchats set craftchat_buyeroffer=? WHERE craftchat_buyerid = $buyerid and craftchat_sellerid = $sellerid and craftchat_listid = $listid");



        $stmt->bind_param("s", $offerstatus);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo "Setting buyer id of $buyerid and seller id of $sellerid and list id of $listid to $offerstatus";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
?>
        <script>
            alert("You do not have enough points to make this purchase. You can earn points by trading or donating clothes first.")
            window.location = "craftchat.php?buyerid=<?= $buyerid ?>&sellerid=<?= $sellerid ?>&listid=<?= $listid ?>";
        </script>
<?php
    }
}
if ($offertype == "cancel") {

    echo "Cancelling Offer <br>";
    include "db_connect.php";
    $offerstatus = "false";

    $stmt = $conn->prepare("UPDATE sp_craftchats set craftchat_buyeroffer=? WHERE craftchat_buyerid = $buyerid and craftchat_sellerid = $sellerid and craftchat_listid = $listid");



    $stmt->bind_param("s", $offerstatus);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Setting buyer id of $buyerid and seller id of $sellerid and list id of $listid to $offerstatus";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
