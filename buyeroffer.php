<?php
$buyerid = $_GET['buyerid'];
$sellerid = $_GET['sellerid'];
$listid = $_GET['listid'];
$offertype = $_GET['offertype'];

// echo $buyerid . "<br>" . $sellerid . "<br>" . $listid;
echo $offertype;
if($offertype == "offer"){
    echo "Updating Offer <br>";
    include "db_connect.php";
    $offerstatus="true";

    $stmt = $conn->prepare("UPDATE sp_chats set chat_buyeroffer=? WHERE chat_buyerid = $buyerid and chat_sellerid = $sellerid and chat_listid = $listid");
    


    $stmt->bind_param("s", $offerstatus);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Setting buyer id of $buyerid and seller id of $sellerid and list id of $listid to $offerstatus";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else if($offertype == "cancel"){
    
    echo "Cancelling Offer <br>";
    include "db_connect.php";
    $offerstatus="false";

    $stmt = $conn->prepare("UPDATE sp_chats set chat_buyeroffer=? WHERE chat_buyerid = $buyerid and chat_sellerid = $sellerid and chat_listid = $listid");
    


    $stmt->bind_param("s", $offerstatus);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Setting buyer id of $buyerid and seller id of $sellerid and list id of $listid to $offerstatus";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}