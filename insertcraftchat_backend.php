<?php
$userid = $_SESSION["userid"];
$chat_buyerid = $_POST['chat_buyerid'];
$chat_sellerid = $_POST['chat_sellerid'];
$chat_listid = $_POST['chat_listid'];
$chat_message = $_POST['chat_message'];

$chat_origin = $_POST['chat_origin'];

if($chat_origin == "buyer"){
// IF MESSSAGE FROM BUYER
include "db_connect.php";

$stmt = $conn->prepare("INSERT into sp_craftchats (craftchat_buyerid, craftchat_sellerid,craftchat_listid, craftchat_buyermessage) values (?,?,?,?)");

$stmt->bind_param("iiis", $chat_buyerid, $chat_sellerid, $chat_listid, $chat_message);
$stmt->execute();
$stmt->close();
$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else if($chat_origin == "seller"){
    
// IF MESSSAGE FROM SELLER
include "db_connect.php";

$stmt = $conn->prepare("INSERT into sp_craftchats (craftchat_buyerid, craftchat_sellerid, craftchat_listid, craftchat_sellermessage) values (?,?,?,?)");

$stmt->bind_param("iiis", $chat_buyerid, $chat_sellerid, $chat_listid, $chat_message);
$stmt->execute();
$stmt->close();
$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
}


