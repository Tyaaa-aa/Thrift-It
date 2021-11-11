<?php
echo $_POST['craft_id'];
echo "<br>";
echo $_POST['user_id'];
echo "<br>";
$user_id = $_POST["user_id"];
$list_id = $_POST['craft_id'];
include "db_connect.php";
$result = mysqli_query($conn, "SELECT * FROM sp_favourites WHERE fav_userid=$user_id and fav_craftid = $list_id");
if (mysqli_fetch_row($result)) {

    // IF ALREADY LIKED UNLIKE
    // echo "AHH";
    include "db_connect.php";
    $stmt = $conn->prepare("DELETE from sp_favourites where fav_userid=$user_id and fav_craftid=$list_id");
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    // IF NOT LIKED LIKE
    // echo "AHHAEWAD";
    include "db_connect.php";

    $stmt = $conn->prepare("INSERT into sp_favourites (fav_userid, fav_craftid) values (?,?)");

    $stmt->bind_param("ii", $user_id, $list_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}
