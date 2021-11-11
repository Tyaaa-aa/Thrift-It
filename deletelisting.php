<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location: index.php");
} else if ($_GET['type'] == "trade") {
    // DELETE TRADE LISTING CODE
    echo "Deleting list id: <br>";
    $list_id = $_GET['id'];
    echo $list_id;
    include "db_connect.php";
    $stmt = $conn->prepare("DELETE from sp_listings where list_id=$list_id");
    $stmt->execute();
    $stmt->close();
    $conn->close();

    include "db_connect.php";
    $stmt = $conn->prepare("DELETE from sp_chats where chat_listid=$list_id");
    $stmt->execute();
    $stmt->close();
    $conn->close();
?>
    <script type='text/javascript'>
        alert('Successfully Deleted Listing!');
        window.location = 'index.php?section=trade';
    </script>
<?php
} else if ($_GET['type'] == "craft") {
    // DELETE CRAFT LISTING CODE
    echo "Delete Craft!";

    echo "Deleting list id: <br>";
    $list_id = $_GET['id'];
    echo $list_id;
    include "db_connect.php";
    $stmt = $conn->prepare("DELETE from sp_craftlistings where craftlist_id=$list_id");
    $stmt->execute();
    $stmt->close();
    $conn->close();
    include "db_connect.php";
    $stmt = $conn->prepare("DELETE from sp_craftchats where craftchat_listid=$list_id");
    $stmt->execute();
    $stmt->close();
    $conn->close();
?>
    <script type='text/javascript'>
        alert('Successfully Deleted Craft Listing!');
        window.location = 'index.php?section=craft';
    </script>
<?php







}
