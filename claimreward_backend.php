<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
} else {
    include "db_connect.php";
    $userid = $_SESSION["userid"];
    $result = $conn->query("SELECT * FROM sp_users WHERE id= $userid");

    $row = $result->fetch_assoc();

    $userpoints = $row['user_points'];



    $itempoints = $_GET['itempoints'];


    // echo $userpoints . "<br>" . $itempoints;
    if ($userpoints >= $itempoints) {
        include "db_connect.php";
        $stmt = $conn->prepare("UPDATE sp_users set user_points=user_points-$itempoints where id = $userid");
        $stmt->bind_param("i", $itempoints);
        $stmt->execute();
        $stmt->close();
        $conn->close();

?>
        <script>
            alert("Congratulations! You have successfully redeemed this item. for <?= $itempoints ?> points. You can find your purchase receipt along with more information in your email!");
            setTimeout(() => {
                window.location = "rewards.php?section=rewards";
            }, 10);
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("You do not have enough points to redeem this item. You can earn more points by trading or donating your clothes to others.");
            setTimeout(() => {
                window.location = "rewards.php?section=rewards";
            }, 10);
        </script>

<?php
    }
}
