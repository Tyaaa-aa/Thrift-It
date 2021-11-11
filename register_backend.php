<?php
$userEmailReg = $_POST['userEmail-reg'];
$userNameReg = $_POST['userName-reg'];
$userPasswordReg = $_POST['userPassword-reg'];
$hashed_password = password_hash($userPasswordReg, PASSWORD_DEFAULT);
// echo "Inserting $sFname, $sLname, $sEmail and $sPassword";

include "db_connect.php";
$stmt = $conn->prepare("INSERT into sp_users (s_Email, s_Username, s_Password) values (?,?,?)");
$stmt->bind_param("sss", $userEmailReg, $userNameReg, $hashed_password);
$stmt->execute();
$stmt->close();
$conn->close();
?>
<a href="forums.php">Click here if you are not automatically redirected to the forums page</a>


<?php
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
        window.location = 'index.php';
    </script>
    <a href="index.php">Click here if you are not redirected automatically within 3 seconds</a>
<?php
} else {
    session_start();
    $_SESSION["userid"] = $id;
    $_SESSION["username"] = $username;
    echo "Login Successful.<br> $id <br> $username";
    header("Location: index.php");
}

?>