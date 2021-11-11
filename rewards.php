<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
} else {
    include "db_connect.php";
    $userid = $_SESSION["userid"];

    // $results = $conn->query("SELECT * from sp_users where id = $userid");
    // $row = $results->fetch_assoc();

    $result = $conn->query("SELECT *, FIND_IN_SET( user_points, (
        SELECT GROUP_CONCAT( user_points
        ORDER BY user_points DESC ) 
        FROM sp_users )
        ) AS rank
        FROM sp_users
        WHERE id= $userid");

    $row = $result->fetch_assoc();
    $email = $row["s_Email"];
    $username = $row["s_Username"];
    $profile = $row["s_ProfileImg"];
    $points = $row["user_points"];
    $carbon = round($row["user_carbon"] / 1000, 1);
    $rank = $row["rank"];

    // echo $row['s_Username'];
}

?>

<body id="rewards">
    <?php include "header.php"; ?>

    <div class="main-filter"></div>
    <div class="home_section_bar_container">
        <div class="home_section_bar">
            <div class="active_bar section_bars"></div>
            <a href="rewards.php?section=rewards" class="trade_bar section_bars">
                Rewards
            </a>
            <a href="rewards.php?section=leaderboard" class="crafted_bar section_bars">
                Leaderboard
            </a>
        </div>
        <div class="user_info_container">
            <div class="user_info_cols user_info_col1">
                <p>RANK</p>
                <br>
                <h3>#<?= $rank ?></h3>
            </div>
            <div class="user_info_cols user_info_col2">
                <img src="<?= $profile ?>" alt="Profile Pic" class="user_info_img">
                <h4><?= $username ?></h4>
            </div>
            <div class="user_info_cols user_info_col3">
                <p>POINTS</p>
                <br>
                <h3><?= $points ?></h3>
            </div>
        </div>
        <div class="rewards_container" id="rewards_container">
            <?php
            // REDIRECT USER TO APPROPRIATE SECTION (DEFAULT IS TRADE)
            $section = $_GET['section'];

            if ($section == "rewards") {
            ?>
                <!-- REWARDS PAGE CODE HERE -->
                <div class="rewards_title">
                    <h3>Rewards</h3>
                </div>
                <a href="claimreward_backend.php?&itempoints=4500" class="rewards_item reward_item1" onclick="return confirm('Are you sure you want to spend points redeeming this item?')">
                    <img src="img/reward_item1.png" alt="Reward Item">
                    <div class="rewards_item_text">
                        <h3>Eco Mask (2pc)</h3>
                        <p>4,500 POINTS</p>
                    </div>
                </a>
                <a href="claimreward_backend.php?&itempoints=8000" class="rewards_item reward_item1" onclick="return confirm('Are you sure you want to spend points redeeming this item?')">
                    <img src="img/reward_item2.png" alt="Reward Item">
                    <div class="rewards_item_text">
                        <h3>Eco Totebag</h3>
                        <p>8,000 POINTS</p>
                    </div>
                </a>
                <a href="claimreward_backend.php?&itempoints=12000" class="rewards_item reward_item1" onclick="return confirm('Are you sure you want to spend points redeeming this item?')">
                    <img src="img/reward_item3.png" alt="Reward Item">
                    <div class="rewards_item_text">
                        <h3>Eco Hydro Flask</h3>
                        <p>12,000 POINTS</p>
                    </div>
                </a>
                <a href="claimreward_backend.php?&itempoints=16000" class="rewards_item reward_item1" onclick="return confirm('Are you sure you want to spend points redeeming this item?')">
                    <img src="img/reward_item4.png" alt="Reward Item">
                    <div class="rewards_item_text">
                        <h3>$5 NTUC Voucher</h3>
                        <p>16,000 POINTS</p>
                    </div>
                </a>
                <script>
                    $(".active_bar").css("transform", "translateX(-50%)");


                    $(".crafted_bar").click(function() {
                        $(".active_bar").css("transform", "translateX(50%)");
                        console.log("crafted section");
                        $("#rewards_container").css("transform", "translateX(-120%)");
                    });
                </script>
                <?php
            } else if ($section == "leaderboard") {
                $result2 = $conn->query("SELECT *, FIND_IN_SET( user_points, (
                    SELECT GROUP_CONCAT( user_points
                    ORDER BY user_points DESC ) 
                    FROM sp_users )
                    ) AS rank
                    FROM sp_users
                    ORDER BY rank ASC");


                while ($row2 = $result2->fetch_assoc()) {
                    // echo $row2['rank'];
                    // echo $row2['s_Username'] . "<br>";
                ?>
                    <!-- LEADERBOARD PAGE CODE HERE -->
                    <a href="profile.php?userid=<?= $row2['id'] ?>&section=trade" class="leaderboard_item">
                        <div>
                            <h2 class="leaderboard_rank">#<?= $row2['rank'] ?></h2>
                            <div>
                                <img src="<?= $row2['s_ProfileImg'] ?>" alt="Reward Item">
                                <h4><?= $row2['s_Username'] ?></h4>
                            </div>
                        </div>

                        <!-- <div class="rewards_item_text"> -->
                        <h3><?= $row2['user_points'] ?></h3>
                        <!-- </div> -->
                    </a>
                <?php
                }
                ?>

                <script>
                    $(".active_bar").css("transform", "translateX(50%)");
                    $(".trade_bar").click(function() {
                        $(".active_bar").css("transform", "translateX(-50%)");
                        console.log("trade section");
                        $("#rewards_container").css("transform", "translateX(120%)");

                    });
                </script>
            <?php
            } else {
            ?>
                <script>
                    window.location = 'rewards.php?section=rewards';
                </script>
            <?php
            }

            ?>
        </div>
    </div>

    <!-- <div class="rewards_container">
        
    </div> -->




    <?php include "navbar.php" ?>
    <?php include "footer.php"; ?>

</body>

<style>
</style>



<script>
    $(".btmnav2").addClass("active_btmnav");



    $('.section_bars').click(function(e) {
        e.preventDefault(); // prevent default anchor behavior
        var goTo = this.getAttribute("href"); // store anchor href

        // do something while timeOut ticks ... 

        setTimeout(function() {
            window.location = goTo;
        }, 300); // time in ms
    });
</script>