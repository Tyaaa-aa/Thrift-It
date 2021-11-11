<?php
session_start();
$userid = $_SESSION["userid"];
$list_title = $_POST['list_title'];
$list_price = $_POST['list_price'];
$list_description = $_POST['list_description'];
$list_dealing_method = $_POST['list_dealing_method'];

//get the details of the uploaded file
$file = $_FILES['list_pic'];
$fileName = $_FILES['list_pic']['name'];
$fileTmpName = $_FILES['list_pic']['tmp_name'];
$fileSize = $_FILES['list_pic']['size'];
$fileError = $_FILES['list_pic']['error'];
$fileType = $_FILES['list_pic']['type'];

//define upload folder (relative to current path)
$uploadFolder = 'listimages/';
$maxFileSizeinBytes = 10000000;

//extract file extension
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

//define allowed extension
$allowed = array('jpg', 'jpeg', 'png');

/*echo "$fileName<br>$fileTmpName<br>$fileSize<br>$fileActualExt";*/

if (in_array($fileActualExt, $allowed)) {

    if ($fileError === 0) {
        // include "db_connect.php";
        // $result = $conn->query("SELECT * from sp_users where id=$userid");

        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while ($row = $result->fetch_assoc()) {
        //         // $s_ProfileImg = $row["s_ProfileImg"];
        //         echo "https://tya.design/nyp/SP4/" . $row["s_ProfileImg"];
        //         unlink("https://tya.design/nyp/SP4/" . $row["s_ProfileImg"]);
        //     }
        // } else {
        //     echo "0 results";
        // }
        if ($fileSize < $maxFileSizeinBytes) {
            $fileNameNew = uniqid('IMG_', 'false') . "." . $fileActualExt;
            $fileDestination = $uploadFolder . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            echo 'The file is too big';
            echo "<script type='text/javascript'>
            alert('The file is too big');
            window.location = 'craftlisting.php'; 
            </script>";
        }
    } else {
        echo 'There was an error uploading this file';
        echo "<script type='text/javascript'>
        alert('There was an error uploading this file');
        window.location = 'craftlisting.php'; 
        </script>";
    }

    $carbon;
    $points;



    // // Calculate Carbon Points
    // if ($list_category == "Tops") {
    //     $carbon = rand(13000, 16000);
    //     $points = rand(130, 160);
    //     // echo "Category Carbon (g): " . $carbon . "<br>";
    //     // echo "Category Points: " . $points . "<br><br>";
    // } else if ($list_category == "Bottoms") {
    //     $carbon = rand(30000, 35000);
    //     $points = rand(300, 350);
    //     // echo "Category Carbon (g): " . $carbon . "<br>";
    //     // echo "Category Points: " . $points . "<br><br>";
    // } else if ($list_category == "Dresses") {
    //     $carbon = rand(13000, 16000);
    //     $points = rand(130, 160);
    //     // echo "Category Carbon (g): " . $carbon . "<br>";
    //     // echo "Category Points: " . $points . "<br><br>";
    // } else if ($list_category == "Outerwear") {
    //     $carbon = rand(15000, 18000);
    //     $points = rand(150, 180);
    //     // echo "Category Carbon (g): " . $carbon . "<br>";
    //     // echo "Category Points: " . $points . "<br><br>";
    // }

    // // Calculate Points based on trade or free
    // if ($list_type == "trade") {
    //     $points = $points + rand(30, 40);
    //     // echo "Deal Type Carbon (g): " . $carbon . "<br>";
    //     // echo "Deal Type Points: " . $points . "<br><br>";
    // } else if ($list_type == "free") {
    //     $points = $points + rand(20, 30);
    //     // echo "Type Carbon (g): " . $carbon . "<br>";
    //     // echo "Type Points: " . $points . "<br><br>";
    // }

    // // (AVERAGE 20km CAR TRIP IS 7KG (7000g) CARBON)
    // // https://co2.myclimate.org/en/car_calculators/new

    // // Calculate Points based on trade or free
    // if ($list_dealing_method == "Meet-Up") {
    //     $points = $points + rand(50, 60);
    //     $carbon = $carbon + rand(6000, 8000);
    //     // echo "Method Carbon (g): " . $carbon . "<br>";
    //     // echo "Method Points: " . $points . "<br><br>";
    // } else if ($list_dealing_method == "Delivery") {
    //     $points = $points + rand(10, 20);
    //     // echo "Method Carbon (g): " . $carbon . "<br>";
    //     // echo "Method Points: " . $points . "<br><br>";
    // }


    // echo "List Title: <br>" . $list_title . "<br><br>";
    // echo "list Category: <br>" . $list_category . "<br><br>";
    // echo "List Type: <br>" . $list_type . "<br><br>";
    // echo "File Destination: <br>" . $fileDestination . "<br><br>";
    // echo "List Description: <br>" . $list_description . "<br><br>";
    // echo "List Dealing Method: <br>" . $list_dealing_method . "<br><br><br>";
    // echo "Final Carbon (g): " . $carbon . "<br><br>";
    // echo "Final Points: " . $points . "<br><br>";

    
    include "db_connect.php";

    $userid = $_SESSION["userid"];
    $list_title = $_POST['list_title'];
    $list_price = $_POST['list_price'];
    $list_description = $_POST['list_description'];
    $list_dealing_method = $_POST['list_dealing_method'];

    $stmt = $conn->prepare("INSERT into sp_craftlistings (craftlist_title, craftlist_price, craftlist_image, craftlist_desc, craftlist_dealMethod, craftlist_iUserid) values (?,?,?,?,?,?)");
    
    $stmt->bind_param("sisssi", $list_title, $list_price, $fileDestination, $list_description, $list_dealing_method, $userid);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "<script type='text/javascript'>
    alert('Your Craft Listing Has Been Created!');
    window.location = 'index.php?section=craft'; 
    </script>";
} else {
    echo 'You cannot upload file of this type';
    echo "<script type='text/javascript'>
    alert('You cannot upload file of this type');
    window.location = 'craftlisting.php'; 
    </script>";
}
