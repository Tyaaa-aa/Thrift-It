$(function () {
    $(window).scroll(function () {
        var yPos = window.pageYOffset;
        // console.log(yPos);
    });

    $(window).click(function () {
        //Hide the menus if visible
        $(".login-popup").css("display", "none");

        $(".nav").css("right", "-100%");
    });

    $(".menu-btn").click(function () {
        setTimeout(() => {
        $(".nav").css("right", "0%");
            
        }, 10);
    });

    function scrollToAbout() {
        $("#yes")[0].scrollIntoView()
    }

    $(".login_btn, .register-login-prompt").click(function () {
        $(".login-popup").css("display", "block");
    });

    $(".login-popup-close").click(function () {
        $(".login-popup").css("display", "none");
    });


    // ========== FORUMS SCRIPT ==========

    // alert("ASDASD");
    // ======= POST POP UP FUNCTIONALITY CODE ========



    function showpassword() {
        var x = document.getElementById("showPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showpassword2() {
        var x = document.getElementById("password-mobile");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

});