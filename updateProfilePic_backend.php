<?php
session_start();
$userid = $_SESSION["userid"];
//get the details of the uploaded file
$file = $_FILES['fileUpload'];
$fileName = $_FILES['fileUpload']['name'];
$fileTmpName = $_FILES['fileUpload']['tmp_name'];
$fileSize = $_FILES['fileUpload']['size'];
$fileError = $_FILES['fileUpload']['error'];
$fileType = $_FILES['fileUpload']['type'];

//define upload folder (relative to current path)
$uploadFolder = 'uploaded/';
$maxFileSizeinBytes = 10000000;

//extract file extension
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

//define allowed extension
$allowed = array('jpg', 'jpeg', 'png');

/*echo "$fileName<br>$fileTmpName<br>$fileSize<br>$fileActualExt";*/

if (in_array($fileActualExt, $allowed)) {

    if ($fileError === 0) {
        include "db_connect.php";
        $result = $conn->query("SELECT * from sp_users where id=$userid");

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // $s_ProfileImg = $row["s_ProfileImg"];
                echo "https://tya.design/nyp/SP4/" . $row["s_ProfileImg"];
                unlink("https://tya.design/nyp/SP4/" . $row["s_ProfileImg"]);
            }
        } else {
            echo "0 results";
        }
        if ($fileSize < $maxFileSizeinBytes) {
            $fileNameNew = uniqid('IMG_', 'false') . "." . $fileActualExt;
            $fileDestination = $uploadFolder . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            echo 'The file is too big';
            echo "<script type='text/javascript'>
            alert('The file is too big');
            window.location = 'account.php'; 
            </script>";
        }
    } else {
        echo 'There was an error uploading this file';
        echo "<script type='text/javascript'>
        alert('There was an error uploading this file');
        window.location = 'account.php'; 
        </script>";
    }



    include "db_connect.php";
    $stmt = $conn->prepare("UPDATE sp_users SET s_ProfileImg=? WHERE id=$userid");

    $stmt->bind_param("s", $fileDestination);

    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo '
		<script>
				window.location = "account.php";
		</script>';
} else {
    echo 'You cannot upload file of this type';
    echo "<script type='text/javascript'>
    alert('You cannot upload file of this type');
    window.location = 'account.php'; 
    </script>";
}


?>
<a href="account.php">Click here if you are not automatically redirected to the account page</a>