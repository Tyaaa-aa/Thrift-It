<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
}

$userid = $_SESSION["userid"];
include "db_connect.php";
$result = $conn->query("SELECT * from sp_users where id=$userid");

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $email = $row["s_Email"];
        $username = $row["s_Username"];
        $profile = $row["s_ProfileImg"];
        $googlePW = $row["s_Password"];
        $usertheme = $row['user_theme'];
    }
} else {
    echo "0 results";
}
?>



<body id="account">
    <a href="index.php" class="back_btn">
        <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
    <?php
    if ($usertheme == "light") {
    ?>
        <a href="#" class="back_btn night_mode_btn">
            <ion-icon name="moon"></ion-icon>
            <form class="themeform" action="settheme_backend.php" method="POST">
                <input type="hidden" value="dark" name="theme">
            </form>
        </a>
        <div class="darkmode_anim"></div>
    <?php
    } else {
    ?>
        <a href="#" class="back_btn night_mode_btn">
            <ion-icon name="sunny"></ion-icon>
            <form class="themeform" action="settheme_backend.php" method="POST">
                <input type="hidden" value="light" name="theme">
            </form>
        </a>
        <div class="darkmode_anim"></div>
    <?php
    }
    ?>

    <h1 class="settings_headtitle headtitles">Account</h1>
    <form class="login-form update-form" method="POST" action="updateaccount_backend.php">
        <!-- <label for="userEmail">E-Mail:</label> -->
        <div class="field-box">

            <div class="profile_pic acc_pic">
                <div class="edit_profile">
                    <ion-icon name="create"></ion-icon>
                </div>
            </div>
            <input type="text" value="<?= $username ?>" name="userName-reg" id="userName-reg" class="inputForm" required>
            <!-- <label for="userPassword">Password:</label> -->
            <?php
            if ($googlePW == "") {
            ?>
                <input type="email" value="<?= $email ?>" name="userEmail-reg" id="userEmail-reg" class="inputForm" required readonly>
                <br>
                <div>
                    <ion-icon name='logo-google'></ion-icon> Account
                </div>
                <input type="hidden" value="yes" name="googleacc">
            <?php
            } else {
            ?>
                <input type="email" value="<?= $email ?>" name="userEmail-reg" id="userEmail-reg" class="inputForm" required>
                <input type="password" placeholder="Change Password" name="userPassword-reg" id="userPassword-reg" class="inputForm" required>
                <input type="password" placeholder="Confirm Password" name="userPassword-reg" id="userPasswordCnfm-reg" class="inputForm" required>
                <br>
                <span id="password_msg">Confirm Password Message</span>
                <input type="hidden" value="no" name="googleacc">
            <?php
            }
            ?>

            <input type="submit" value="Save Changes" class="onboarding_btn login-btn" id="register_btn">
        </div>
    </form>
    <form class="img_change" id="img_change" enctype="multipart/form-data" action="updateProfilePic_backend.php" method="POST">
        <input type="file" class="upload-img" id="upload-img" name="fileUpload">
    </form>

</body>

<style>
    .acc_pic {
        background-image: url(<?= $profile ?>);
    }

    .img_change {
        width: 0;
        height: 0;
        overflow: hidden;
    }
</style>

<script>
    $(".night_mode_btn").click(function() {
        setTimeout(() => {
            $(".themeform").submit();
        }, 400);
    });


    $(".edit_profile").click(function() {
        $("#upload-img").click();
    });

    $("#upload-img").change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var filepath = e.target.result
                // $('#blah').attr('src', e.target.result);
                $(".acc_pic").css("background", "url(" + filepath + ")")
                $("form#img_change").submit();
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $('#password_msg').html('Enter a Password').css('color', 'transparent');
    $('#userPassword-reg, #userPasswordCnfm-reg').on('keyup', function() {
        if ($('#userPassword-reg').val().length >= 8) {
            if ($('#userPassword-reg').val() == $('#userPasswordCnfm-reg').val()) {
                $('#password_msg').html('Passwords Match').css('color', 'green');
                $("#register_btn").css("pointer-events", "auto");
                $("#register_btn").css("cursor", "auto");
            } else {
                $('#password_msg').html('Passwords do not match!').css('color', 'red');
                $("#register_btn").css("pointer-events", "none");
                $("#register_btn").css("cursor", "not-allowed");
            }
        } else {
            $('#password_msg').html('Passwords must be at least 8 characters!').css('color', 'red');
            $("#register_btn").css("pointer-events", "none");
            $("#register_btn").css("cursor", "not-allowed");
        }
    });
</script>