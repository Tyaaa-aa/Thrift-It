<?php
// echo "GOOGLE ACCOUNT IN PROGRESS";
// $test = $_POST['create'];
$googleacc = $_POST['googleacc'];
$userEmailReg = $_POST['userEmail-reg'];
$userNameReg = $_POST['userName-reg'];
$userPasswordReg = $_POST['userPassword-reg'];
$hashed_password = password_hash($userPasswordReg, PASSWORD_DEFAULT);
if ($googleacc == "no") {
    echo $googleacc, $userEmailReg, $userNameReg, $userPasswordReg;

    session_start();
    $userid = $_SESSION['userid'];

    include "db_connect.php";

    $stmt = $conn->prepare("UPDATE sp_users set s_Email=?, s_Username=?, s_Password=? where id = $userid");
    $stmt->bind_param("sss", $userEmailReg, $userNameReg, $hashed_password);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    include "db_connect.php";

    $stmt = $conn->prepare("SELECT id, s_Username from sp_users where s_Username=?");
    $stmt->bind_param("s", $userNameReg);
    $stmt->execute();

    $stmt->store_result();
    $row = $stmt->num_rows();
    $stmt->bind_result($id, $username);
    $stmt->fetch();
    $stmt->close();
    echo $id, $username;
    if ($row == 0) {
?>
        <script type='text/javascript'>
            alert('Something went wrong, please try again');
            window.location = 'account.php';
        </script>
        <a href="account.php">Click here if you are not redirected automatically within 3 seconds</a>
    <?php
    } else {
        session_start();
        $_SESSION["userid"] = $id;
        $_SESSION["username"] = $username;
        echo "Login Successful.<br> $id <br> $username";
        header("Location: account.php");
    }
} else {
    session_start();
    $userid = $_SESSION['userid'];

    include "db_connect.php";

    $stmt = $conn->prepare("UPDATE sp_users set s_Email=?, s_Username=? where id = $userid");
    $stmt->bind_param("ss", $userEmailReg, $userNameReg);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    include "db_connect.php";

    $stmt = $conn->prepare("SELECT id, s_Username from sp_users where s_Username=?");
    $stmt->bind_param("s", $userNameReg);
    $stmt->execute();

    $stmt->store_result();
    $row = $stmt->num_rows();
    $stmt->bind_result($id, $username);
    $stmt->fetch();
    $stmt->close();
    echo $id, $username;
    if ($row == 0) {
    ?>
        <script type='text/javascript'>
            alert('Something went wrong, please try again');
            window.location = 'account.php';
        </script>
        <a href="account.php">Click here if you are not redirected automatically within 3 seconds</a>
<?php
    } else {
        session_start();
        $_SESSION["userid"] = $id;
        $_SESSION["username"] = $username;
        echo "Login Successful.<br> $id <br> $username";
        header("Location: account.php");
    }
}

?>