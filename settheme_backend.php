<?php

session_start();
$userid = $_SESSION["userid"];
$theme = $_POST['theme'];

include "db_connect.php";

$stmt = $conn->prepare("UPDATE sp_users set user_theme=? where id = $userid");
$stmt->bind_param("s", $theme);
$stmt->execute();
$stmt->close();
$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
