<?php
include "head.php";
session_start();
if (!isset($_SESSION["userid"])) {
    // header("Location: index.php");
} else if ($_GET['type'] == "trade") {
    // EDIT TRADE LISTING CODE
    // echo "Edit list id: <br>";
    $list_id = $_GET['id'];

    include "db_connect.php";
    $result = $conn->query("SELECT * from sp_listings WHERE list_id=$list_id");

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // Remove Edited Tag from user Front End
            $raw_list_title = $row['list_title'];
            $list_title = str_replace('<span>(edited)</span>', "", $raw_list_title);
?>

            <body id="createlisting">
                <a href="index.php" class="back_btn">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
                <h1 class="createlisting_headtitle headtitles">Edit Your Listing</h1>
                <form class="create_listing_form" method="POST" action="updatelisting_backend.php" enctype="multipart/form-data">
                    <div class="input_fields">
                        <label><strong>Listing Title</strong></label>
                        <input type="text" value="<?= $list_title ?>" name="list_title" id="list_title" class="inputForm" required>
                    </div>
                    <div class="input_fields">
                        <label><strong>Category</strong></label>
                        <input type="text" onclick="myFunction()" class="dropbtn inputForm" name="list_category" placeholder="Choose Category" required autocomplete="off" onkeypress="return false;" value="<?= $row['list_category'] ?>" readonly>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="#" class="dropdown-option" title="">-- Select an option --</a>
                            <a href="#" class="dropdown-option" title="Tops">Tops</a>
                            <a href="#" class="dropdown-option" title="Bottoms">Bottoms</a>
                            <a href="#" class="dropdown-option" title="Dresses">Dresses</a>
                            <a href="#" class="dropdown-option" title="Outerwear">Outerwear</a>
                        </div>
                    </div>

                    <div class="input_fields radio_box">
                        <label><strong>Listing Type</strong></label>
                        <div class="radio_fields radio_field1">
                            <input type="radio" class="radio_btns" id="trade" name="list_type" value="trade" required>
                            <label for="trade">Looking For Trade</label>
                        </div>
                        <div class="radio_fields radio_field2">
                            <input type="radio" class="radio_btns" id="free" name="list_type" value="free">
                            <label for="free">Free</label>
                        </div>
                    </div>

                    <div class="input_fields">
                        <label><strong>Image</strong></label>

                        <div class="listing_pic_container">
                            <input type="file" id="listing_pic_input" name="list_pic" required>

                        </div>
                    </div>

                    <div class="input_fields ">
                        <label><strong>Description</strong></label>

                        <textarea class="listing_description" placeholder="Write Something..." name="list_description"><?= $row['list_desc'] ?></textarea>

                    </div>

                    <div class="input_fields radio_box">
                        <label><strong>Dealing Method</strong></label>
                        <div class="radio_fields radio_field1">
                            <input type="radio" class="radio_btns" id="meet_up" name="list_dealing_method" value="Meet-Up" required>
                            <label for="meet_up">Meet-Up (eco-friendly)</label>
                        </div>
                        <div class="radio_fields radio_field2">
                            <input type="radio" class="radio_btns" id="delivery" name="list_dealing_method" value="Delivery">
                            <label for="delivery">Delivery</label>
                        </div>
                    </div>

                    <div class="input_fields input_checkbox">
                        <input type="checkbox" id="terms" name="terms" value="terms" class="terms" required>
                        <label for="terms">I agree to the <a href="terms.php">Terms & Conditions</a></label>
                    </div>
                    <br>
                    <br>
                    <input type="hidden" name="list_id" value="<?= $row['list_id'] ?>">

                    <input type="submit" value="Save Changes" class="onboarding_btn" id="register_btn">

                </form>

            </body>

    <?php


        }
    }

    ?>
    <?php
} else if ($_GET['type'] == "craft"){
    // EDIT CRAFT LISTING CODE
    // echo "Edit Craft!";
    $list_id = $_GET['id'];

    include "db_connect.php";
    $result = $conn->query("SELECT * from sp_craftlistings WHERE craftlist_id=$list_id");

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // Remove Edited Tag from user Front End
            $raw_list_title = $row['craftlist_title'];
            $list_title = str_replace('<span>(edited)</span>', "", $raw_list_title);
    ?>

            <body id="createlisting">
                <a href="index.php" class="back_btn">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
                <h1 class="createlisting_headtitle headtitles">Edit Your Listing</h1>
                <form class="create_listing_form" method="POST" action="updatecraftlisting_backend.php" enctype="multipart/form-data">
                    <div class="input_fields">
                        <label><strong>Listing Title</strong></label>
                        <input type="text" placeholder="Name Your Listing" name="list_title" value="<?= $list_title ?>" id="list_title" class="inputForm" required>
                    </div>
                    <div class="input_fields">
                        <label><strong>Price</strong></label>
                        <div class="input_price_container">
                            <input type="number" placeholder="0" name="list_price" id="list_price" class="inputForm" required min="10" max="10000" value="<?= $row['craftlist_price'] ?>">
                            <span class="input_price">POINTS</span>
                        </div>
                    </div>
                    <div class="input_fields_heading">
                        <h3>About The Item</h3>
                    </div>

                    <div class="input_fields">
                        <label><strong>Image</strong></label>

                        <div class="listing_pic_container">
                            <input type="file" id="listing_pic_input" name="list_pic" required>

                        </div>
                    </div>

                    <div class="input_fields ">
                        <label><strong>Description</strong></label>

                        <textarea class="listing_description" placeholder="Write Something..." name="list_description"><?= $row['craftlist_desc'] ?></textarea>

                    </div>

                    <div class="input_fields radio_box">
                        <label><strong>Dealing Method</strong></label>
                        <div class="radio_fields radio_field1">
                            <input type="radio" class="radio_btns" id="meet_up" name="list_dealing_method" value="Meet-Up" required>
                            <label for="meet_up">Meet-Up (eco-friendly)</label>
                        </div>
                        <div class="radio_fields radio_field2">
                            <input type="radio" class="radio_btns" id="delivery" name="list_dealing_method" value="Delivery">
                            <label for="delivery">Delivery</label>
                        </div>
                    </div>

                    <div class="input_fields input_checkbox">
                        <input type="checkbox" id="terms" name="terms" value="terms" class="terms" required>
                        <label for="terms">I agree to the <a href="terms.php">Terms & Conditions</a></label>
                    </div>
                    <br>
                    <br>

                    <input type="hidden" name="craftlist_id" value="<?= $row['craftlist_id'] ?>">

                    <input type="submit" value="Save Changes" class="onboarding_btn" id="register_btn">

                </form>

            </body>
<?php






        }
    }else{
        echo "Something went wrong";
    }
}
?>
<script>
    $("#listing_pic_input").change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var filepath = e.target.result
                // $('#blah').attr('src', e.target.result);
                $(".listing_pic_container").css("background", "url(" + filepath + ")");
                $(".listing_pic_container").css("border", "none");
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            // console.log("Droppeddown");
            var dropdowns = document.getElementsByClassName("dropdown-content");
            // console.log(dropdowns);
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    $('.dropdown-option').click(function() {
        var element = $(this).attr("title");
        console.log($(this).index());
        // console.log(test);
        $(".dropbtn").val(element)
    });

    $(".radio_fields").click(function() {
        $(this).find(".radio_btns").prop("checked", true);
        $(".radio_fields").css("background-color", "#F7F7F7");
        $(".radio_fields").css("border-left", "8px solid transparent");


        $(this).css("background-color", "#DDD");
        $(this).css("border-left", "8px solid #80A299");
    });
</script>