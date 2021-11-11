<?php
$googleEmail = $_POST["googleEmail"];
$googleName = $_POST["googleName"];
$googlePic = $_POST["googlePic"];

include "db_connect.php";
// $existingUser = mysqli_real_escape_string($conn, $existingUser);  // SECURITY!

$result = mysqli_query($conn, "SELECT 1 FROM sp_users WHERE s_Email='$googleEmail' LIMIT 1");
if (mysqli_fetch_row($result)) {
    // IF USER EXISTS LOGIN USER FIRST
    echo $googleEmail . " exists <br> <br> <br>";

    include "db_connect.php";
    $stmt = $conn->prepare("SELECT id, s_Username from sp_users where s_Email=?");
    $stmt->bind_param("s", $googleEmail);
    $stmt->execute();

    $stmt->store_result();
    $row = $stmt->num_rows();
    $stmt->bind_result($id, $userName);
    $stmt->fetch();
    $stmt->close();

    echo $id . "<br>";
    echo $sFname . "<br>";
    session_start();

    $_SESSION["userid"] = $id;
    $_SESSION["username"] = $userName;
    echo "Login Successful.<br> $id <br> $userName";
    header("Location: index.php");
} else {
    // IF USER DOES NOT EXIST REGISTER THEM FIRST
    echo $googleEmail . " does not exist<br><br>";

    // $googleEmail = $_POST["googleEmail"];
    // $googleName = $_POST["googleName"];
    // $googlePic = $_POST["googlePic"];
    // echo "Inserting $sFname, $sLname, $sEmail and $sPassword";

    include "db_connect.php";
    $stmt = $conn->prepare("INSERT into sp_users (s_Email, s_Username, s_ProfileImg) values (?,?,?)");
    $stmt->bind_param("sss", $googleEmail, $googleName, $googlePic);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo $googleEmail . " Inserted into database<br><br>";
    
    include "db_connect.php";
    $stmt = $conn->prepare("SELECT id, s_Username from sp_users where s_Email=?");
    $stmt->bind_param("s", $googleEmail);
    $stmt->execute();

    $stmt->store_result();
    $row = $stmt->num_rows();
    $stmt->bind_result($id, $userName);
    $stmt->fetch();
    $stmt->close();

    echo $id . "<br>";
    echo $sFname . "<br>";
    session_start();

    $_SESSION["userid"] = $id;
    $_SESSION["username"] = $userName;
    echo "Login Successful.<br> $id <br> $sFname";

    header("Location: index.php");
    // header("Location: forums.php");
}

// $stmt = $conn->prepare("SELECT sPassword from tb_users where sEmail=?");
// $stmt->bind_param("s", $sEmail);
// $stmt->execute();

// $stmt->store_result();
// $row = $stmt->num_rows();
// $stmt->bind_result($hashed_password);
// $stmt->fetch();
// $stmt->close();
?>