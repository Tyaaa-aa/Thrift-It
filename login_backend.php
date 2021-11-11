<?php
$userName = $_POST["userName"];
$sPassword = $_POST["userPassword"];

include "db_connect.php";


$stmt = $conn->prepare("SELECT s_Password from sp_users where s_Username=?");
$stmt->bind_param("s", $userName);
$stmt->execute();

$stmt->store_result();
$row = $stmt->num_rows();
$stmt->bind_result($hashed_password);
$stmt->fetch();
$stmt->close();


echo "Hashed PW: " . $hashed_password . "<br>";

// echo "<br>userPassword PW: " . $userPassword . "<br>";
echo "<br>userName: " . $userName . "<br>";
echo "<br>sPassword: " . $sPassword . "<br><br><br>";

$userPassword = password_verify($sPassword, $hashed_password);
if (password_verify($sPassword, $hashed_password)) {
    $id = "NULL";
    include "db_connect.php";
    $stmt = $conn->prepare("SELECT id from sp_users where s_Username=?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();

    $stmt->store_result();
    $row = $stmt->num_rows();
    $stmt->bind_result($id);
    $stmt->fetch();
    $stmt->close();
    echo $id;
    if ($row == 0) {
?>
        <script type='text/javascript'>
            alert('Login Failed, Please Try Again or Register an Account First sdf');
            window.location = 'index.php';
        </script>
        <a href="register.php">Click here if you are not redirected automatically within 3 seconds</a>
    <?php
    } else {
        session_start();
        $_SESSION["userid"] = $id;
        $_SESSION["username"] = $userName;
        echo "Login Successful.<br> $id <br> $userName";

        header("Location: index.php");
    ?>
<?php
    }
} else {
?>
        <script type='text/javascript'>
            alert('Login Failed, Please Try Again or Register an Account First');
            window.location = 'index.php';
        </script>
        <a href="register.php">Click here if you are not redirected automatically within 3 seconds</a>
    <?php
}
?>