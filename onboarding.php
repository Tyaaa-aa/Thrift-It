<?php
include "head.php";

if (isset($_SESSION["userid"])) {
    header("Location: index.php");
}

?>
<div class="frames onboarding-container">
    <div class="onboarding">
        <div class="onboarding_frames frame1" id="frame1">
            <img class="onboarding-image" src="img/onboarding1.png" alt="#">
            <div>
                <h2>Trade Your Clothes</h2>
                <p>
                    Have any clothes you no longer want
                    or can't wear? Trade with our ThriftIt
                    community and get something you
                    like in exchange!
                </p>
            </div>
        </div>
        <div class="onboarding_frames frame2" id="frame2">
            <img class="onboarding-image" src="img/onboarding2.png" alt="#">
            <div>
                <h2>Donate & Craft</h2>
                <p>
                    Donate your leftover clothes and
                    share it with other Thrift It users or
                    use it to up recycle and craft
                    something brand new to sell!
                </p>
            </div>
        </div>
        <div class="onboarding_frames frame3" id="frame3">
            <img class="onboarding-image" src="img/onboarding3.png" alt="#">
            <div>
                <h2>Chat With Others</h2>
                <p>
                    When you find an item you like,
                    you can chat and negotiate with
                    the item lister to trade a clothing
                    item of yours for theirs.
                </p>
            </div>
        </div>
        <div class="onboarding_frames frame4" id="frame4">
            <img class="onboarding-image" src="img/onboarding4.png" alt="#">
            <div>
                <h2>Get Rewards</h2>
                <p>
                    Earn points per clothing item you
                    donate or when you sell an up
                    recycled item you made and earn
                    5% more points. Redeem amazing
                    rewards with your points!

                </p>
            </div>
        </div>
    </div>
    <div class="next_box">
        <div class="pagination">
            <div class="dot"></div>
        </div>
        <div class="onboarding_btn next_btn">Next</div>
    </div>
</div>
<div class="frames frame5">
    <div class="frame5-head">
        <!-- <h1>Welcome to <br> <strong><span>ThriftIt</span></strong></h1> -->
        <img src="img/logo-green2.png" alt="ThriftIt Logo" class="onboarding_logo onboarding-image">
        <p>exchange . donate . reuse</p>
    </div>
    <div class="btn-box">
        <div class="onboarding_btn login_btn">Login</div>
        <div class="onboarding_btn register_btn">Register</div>
    </div>
</div>
<div class="frames frame6" id="frame6">
    <form class="login-form" method="POST" action="login_backend.php">
        <!-- <label for="userEmail">E-Mail:</label> -->
        <div class="field-box">
            <h1>Login to ThriftIt</h1>
            <input type="text" placeholder="Username" name="userName" id="userName" class="inputForm" required>
            <!-- <label for="userPassword">Password:</label> -->
            <input type="password" placeholder="Password" name="userPassword" id="userPassword" class="inputForm" required>
            <br>
            <div>
                <input type="checkbox" id="showPassword" name="showPassword" value="showPassword" class="showPassword">
                <label for="showPassword">Show Password</label>
            </div>

            <input type="submit" value="Login" class="onboarding_btn login-btn">
            <a href="#" class="signOut">Forgot password?</a>
        </div>
        <br>


        <div>
            <div class="onboarding_btn google_login_btn">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <ion-icon name="logo-google"></ion-icon> Continue with Google
            </div>
            <br>
            <span>Don't have an account? <a href="#" class="registerForm-btn"><b>Sign up</b></a></span>
        </div>
    </form>
</div>

<div class="frames frame7" id="frame7">
    <form class="login-form" method="POST" action="register_backend.php">
        <!-- <label for="userEmail">E-Mail:</label> -->
        <div class="field-box">
            <h1>Create an account</h1>
            <input type="text" placeholder="Username" name="userName-reg" id="userName-reg" class="inputForm" required>
            <!-- <label for="userPassword">Password:</label> -->
            <input type="email" placeholder="E-Mail" name="userEmail-reg" id="userEmail-reg" class="inputForm" required>
            <input type="password" placeholder="Password" name="userPassword-reg" id="userPassword-reg" class="inputForm" required>
            <input type="password" placeholder="Confirm Password" name="userPassword-reg" id="userPasswordCnfm-reg" class="inputForm" required>
            <br>
            <span id="password_msg">Confirm Password Message</span>
            <input type="submit" value="Register" class="onboarding_btn login-btn" id="register_btn">
            <span>Already have an account? <a href="#" class="loginForm-btn"><b>Login</b></a></span>
        </div>
        <br>
        <div>
            <div class="onboarding_btn google_login_btn">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <ion-icon name="logo-google"></ion-icon> Continue with Google
            </div>
        </div>
    </form>
</div>

<form action="login_backend_google.php" method="post" enctype="multipart/form-data" name="login_backend_google" id="login_backend_google">
    <input type="hidden" value="" name="googleEmail" id="googleEmail">
    <input type="hidden" value="" name="googleName" id="googleName">
    <input type="hidden" value="" name="googlePic" id="googlePic">
</form>

<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log(" ");
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        console.log(" ");
        var googleEmail = profile.getEmail();
        var googleName = profile.getName();
        var googlePic = profile.getImageUrl();

        $("#googleEmail").val(googleEmail);
        $("#googleName").val(googleName);
        $("#googlePic").val(googlePic);
        $("form#login_backend_google").submit();
    }

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function() {
            console.log('User signed out.');
            alert('User signed out.');
        });
        // location.href = 'index.php';
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