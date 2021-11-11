$(function () {

    $(".night_mode_btn").click(function(){
        // $(".night_mode_btn ion-icon").attr("name" , "sunny");
        $(".night_mode_btn ion-icon").css("transform","rotate(360deg)");
        $(".darkmode_anim").addClass("darkmode_anim_active");
        // $('*').not('.edit_profile').css("filter","invert(1)");
        if($(".night_mode_btn ion-icon").attr("name") == "sunny"){
            $(".night_mode_btn ion-icon").css("color", "black");
            $(".back_btn").css("color","black");
        }else{
            $(".night_mode_btn ion-icon").css("color", "white");
            $(".back_btn").css("color","#D4E6C0");
        }
    });
    
    $("body").css("display", "block");
    $(".login_btn, .loginForm-btn").click(function () {
        // showLogin()
        showFrame(6);
    });

    $(".registerForm-btn, .register_btn").click(function () {
        showFrame(7);
    });

    $(".google_login_btn").click(function () {
        // alert("Haven't done login with google yet haha :P");
    });

    //CHECK IF URL HAS "ONBOARDING" (ONLY NEED HAMMER SWIPE ON ONBOARDING)
    if (window.location.href.indexOf("onboarding") > -1) {
        var onboarding = document.getElementById("frame1");
        hammertime = new Hammer(onboarding);
        hammertime.on('swipeleft', function (ev) {
            showFrame(2);
        });

        onboarding = document.getElementById("frame2");
        hammertime = new Hammer(onboarding);
        hammertime.on('swipeleft', function (ev) {
            showFrame(3);
        });
        hammertime.on('swiperight', function (ev) {
            showFrame(1);
        });
        onboarding = document.getElementById("frame3");
        hammertime = new Hammer(onboarding);
        hammertime.on('swipeleft', function (ev) {
            showFrame(4);
        });
        hammertime.on('swiperight', function (ev) {
            showFrame(2);
        });
        onboarding = document.getElementById("frame4");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            showFrame(3);
        });

        onboarding = document.getElementById("frame6");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            showFrame(5);
        });
        hammertime.on('swipeleft', function (ev) {
            showFrame(7);
        });

        onboarding = document.getElementById("frame7");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            showFrame(6);
        });

        // ===== DEBUGGING CODE ======
        // setTimeout(() => {

        //     showFrame(2);
        //     showFrame(3);
        //     showFrame(4);
        //     showFrame(5);
        //     showFrame(6);
        //     showFrame(7);
        //     $("#frame7").css("z-index", "999999");
        //     $("#frame7").css("display", "flex");
        // }, 10);
    }

    var next = 2;
    $(".next_btn").click(function () {
        // showLogin()
        if (next == 2) {
            showFrame(2);
        } else if (next == 3) {
            showFrame(3);
            // next ++;
        } else if (next == 4) {
            showFrame(4);
            // next ++;
        } else if (next == 5) {
            showFrame(5);
            // next ++;
        }
    });

    $(".frames").css("display", "none");
    $(".onboarding-container").css("display", "block");

    function showFrame(frameID) {
        console.log("Showing Frame " + frameID);
        //CONDITIONAL EVENTS
        switch (frameID) {
            case 1:
                // DO THIS IF SHOWING FRAME 1 \/
                $(".frame" + (frameID)).removeClass("frames_anim");
                next = 2;
                $(".dot").css("width", "25%");
                break;
            case 2:
                // DO THIS IF SHOWING FRAME 2 \/
                setTimeout(() => {
                    $(".frame" + (frameID - 1)).addClass("frames_anim");
                }, 10);
                $(".frame" + (frameID)).removeClass("frames_anim");
                $(".dot").css("width", "50%");
                next = 3;
                break;
            case 3:
                // DO THIS IF SHOWING FRAME 3 \/
                setTimeout(() => {
                    $(".frame" + (frameID - 1)).addClass("frames_anim");
                }, 10);
                $(".frame" + (frameID)).removeClass("frames_anim");
                next = 4;
                $(".dot").css("width", "75%");

                $(".next_btn").html("Next");
                break;
            case 4:
                // DO THIS IF SHOWING FRAME 4 \/
                setTimeout(() => {
                    $(".frame" + (frameID - 1)).addClass("frames_anim");
                }, 10);
                $(".frame" + (frameID)).removeClass("frames_anim");
                next = 5;
                $(".dot").css("width", "100%");

                // PRIME NEXT BUTTON TO GO LOGIN PAGE
                $(".next_btn").html("Get Started");
                break;
            case 5:
                // DO THIS IF SHOWING FRAME 5 \/
                setTimeout(() => {
                    $(".frame" + (frameID - 1)).addClass("frames_anim");
                }, 10);
                $(".frame" + (frameID)).removeClass("frames_anim");
                // next = 6;
                $(".frames").css("display", "flex");
                $(".onboarding-container").css("display", "none");
                break;
            case 6:
                // DO THIS IF SHOWING FRAME 6 \/
                setTimeout(() => {
                    $(".frame" + (frameID - 1)).addClass("frames_anim");
                }, 10);
                $(".frame" + (frameID)).removeClass("frames_anim");
                break;
            case 7:
                // DO THIS IF SHOWING FRAME 7 \/
                setTimeout(() => {
                    $(".frame" + (frameID - 1)).addClass("frames_anim");
                    $(".frame" + (frameID - 2)).addClass("frames_anim");
                }, 10);
                $(".frame" + (frameID)).removeClass("frames_anim");
                break;
            case 8:
                // DO THIS IF SHOWING FRAME 8 \/
                $(".frame" + (frameID - 1)).addClass("frames_anim");
                $(".start").css("display", "block");
                break;

            default:
                // DO THIS IF NONE OF THE CONDITIONS NEEDED \/
                console.log("FRAME MANAGER ERROR");
        }
    }








    $(window).scroll(function () {
        var yPos = window.pageYOffset;
        // console.log(yPos);
    });

    var pagelock = 0;

    $(window).click(function () {
        //Hide the menus if visible
        $(".login-popup").css("display", "none");

        $(".nav").css("left", "-100%");
        // $(".menu-btn").css("margin-left", "0%");

        // $("body").css({"overflow-y": "auto"});
        if (pagelock == 0) {
            unlockPage();
        }
    });

    $(".menu-btn").click(function () {
        setTimeout(() => {
            $(".nav").css("left", "0%");
            // $(".menu-btn").css("margin-left", "-100%");
            $(".menu-btn, .search-form, .chat_btn").css({
                "transform": "translateX(-20px)",
                "opacity": "0"
            });
            lockPage();

        }, 10);
    });

    var addbtnState = false;
    $(".add_btn").click(function () {
        setTimeout(() => {
            if (addbtnState == false) {
                $(".add_btn").css("transform", "translate(-50%, -45%) rotate(45deg)");
                showListPop();
                addbtnState = true;
            } else {
                $(".add_btn").css("transform", "translate(-50%, -45%) rotate(0deg)");
                hideListPop();
                addbtnState = false;
            }
        }, 10);
    });
    // showListPop();
    function showListPop() {
        $(".adding").css("display", "flex");
        setTimeout(() => {
            $(".add_1").addClass("added_1");
            $(".add_2").addClass("added_2");
            $(".add_3").addClass("added_3");
            // lockPage();
        }, 10);
    }

    function hideListPop() {
        $(".add_1").removeClass("added_1");
        $(".add_2").removeClass("added_2");
        $(".add_3").removeClass("added_3");

        setTimeout(() => {
            $(".adding").css("display", "none");
        }, 300);
    }


    function lockPage() {
        $(".main-filter").css({
            "backdrop-filter": "brightness(0.3)",
            "z-index": "999"
        });
        $("body").css({
            "overflow-y": "hidden"
        });
        console.log("Page Locked");
    }

    function unlockPage() {
        $(".menu-btn, .search-form, .chat_btn").css({
            "transform": "translateX(0px)",
            "opacity": "1"
        });
        $(".main-filter").css({
            "backdrop-filter": "brightness(1)",
            "z-index": "0"
        });
        $("body").css({
            "overflow-y": "auto"
        });
        console.log("Page Unlocked");
    }

    $(".btmnav").click(function () {
        // showRegister()
        $(".btmnav").removeClass("active_btmnav");
        $(this).addClass("active_btmnav");
    })



    function scrollToAbout() {
        $("#yes")[0].scrollIntoView()
    }



    // ========== FORUMS SCRIPT ==========

    // alert("ASDASD");
    // ======= POST POP UP FUNCTIONALITY CODE ========

    $(".showPassword").click(function () {
        showpassword();
    });

    function showpassword() {
        var x = document.getElementById("userPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }



    // $(".btmnav1").click(function () {
    //     window.location.href = 'index.php?section=trade';
    // });

    if (window.location.href.indexOf("www/index.php") > -1) {
        $(".btmnav2").click(function () {
            window.location.href = 'rewards.php?section=rewards';
        });
    }

    if (window.location.href.indexOf("www/rewards.php") > -1) {
        $(".btmnav1").click(function () {
            window.location.href = 'index.php?section=trade';
        });
    }

    if (window.location.href.indexOf("www/index.php?section=trade") > -1) {
        var onboarding = document.getElementById("main-section");
        hammertime = new Hammer(onboarding);
        hammertime.on('swipeleft', function (ev) {
            $(".crafted_bar").click();

        });
        hammertime.on('swiperight', function (ev) {
            $(".menu-btn").click();

        });
    }

    if (window.location.href.indexOf("www/index.php?section=craft") > -1) {
        var onboarding = document.getElementById("main-section");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $(".trade_bar").click();

        });
    }

    if (window.location.href.indexOf("www/account.php") > -1) {
        var onboarding = document.getElementById("account");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#account").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/createlisting.php") > -1) {
        var onboarding = document.getElementById("createlisting");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#createlisting").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/craftlisting.php") > -1) {
        var onboarding = document.getElementById("createlisting");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#createlisting").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/editlisting.php") > -1) {
        var onboarding = document.getElementById("createlisting");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#createlisting").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/viewlisting.php") > -1) {
        var onboarding = document.getElementById("viewlisting");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#viewlisting").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/viewcraftlisting.php") > -1) {
        var onboarding = document.getElementById("viewlisting");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#viewlisting").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=craft';

        });
    }

    if (window.location.href.indexOf("www/profile.php") > -1) {
        var onboarding = document.getElementById("profile");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#profile").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/favourites.php?section=trade") > -1) {
        var onboarding = document.getElementById("favourites");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#favourites").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
        hammertime.on('swipeleft', function (ev) {
            $(".crafted_bar").click();
        });
    }

    if (window.location.href.indexOf("www/favourites.php?section=craft") > -1) {
        var onboarding = document.getElementById("favourites");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $(".trade_bar").click();

        });
    }

    if (window.location.href.indexOf("www/sponsors.php") > -1) {
        var onboarding = document.getElementById("sponsors");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#sponsors").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/terms.php") > -1) {
        var onboarding = document.getElementById("terms");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#terms").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/more.php") > -1) {
        var onboarding = document.getElementById("more");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#more").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/viewchats.php?section=selling") > -1) {
        var onboarding = document.getElementById("viewchats");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#viewchats").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/chat.php") > -1) {
        var onboarding = document.getElementById("chats");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $("#chats").css("transform", "translateX(100%)");
            window.location.href = 'index.php?section=trade';

        });
    }

    if (window.location.href.indexOf("www/rewards.php?section=rewards") > -1) {
        var onboarding = document.getElementById("rewards_container");
        hammertime = new Hammer(onboarding);
        hammertime.on('swipeleft', function (ev) {
            $(".crafted_bar").click();

        });
        hammertime.on('swiperight', function (ev) {
            $(".menu-btn").click();

        });
    }

    if (window.location.href.indexOf("www/rewards.php?section=leaderboard") > -1) {
        var onboarding = document.getElementById("rewards_container");
        hammertime = new Hammer(onboarding);
        hammertime.on('swiperight', function (ev) {
            $(".trade_bar").click();

        });
        hammertime.on('swipeleft', function (ev) {
            $(".chat_btn").click();

        });
    }






















});