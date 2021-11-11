<?php
include "head.php";

if (!isset($_SESSION["userid"])) {
    header("Location: onboarding.php");
}
?>

<body id="more">
    <a href="index.php" class="back_btn">
        <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
    <h2 class="headtitles">More</h2>
    <div class="more_content_container">
        <img src="img/piechart_graph.png">
        <div class="more_content">
            <a href="https://www.commonobjective.co/article/what-are-our-clothes-made-from">
                https://www.commonobjective.co/article/what-are-our-clothes-made-from
            </a>
        </div>
        <div class="more_content">
            <a href="https://fairware.com/the-carbon-footprint-of-a-t-shirt/">
                https://fairware.com/the-carbon-footprint-of-a-t-shirt/
            </a>
            <p>
                By comparison, a study conducted by the UK’s Carbon Trust found that “a typical t-shirt [of conventionally produced cotton] sold today is expected to be responsible for around 15kg of CO2 over its lifetime”. The Trust’s in-depth study on the carbon impact of various kinds of clothing can be found here.
            </p>
        </div>
        <div class="more_content">
            <a href="https://www.ecotricity.co.uk/our-news/2018/the-carbon-footprint-of-getting-dressed">
                https://www.ecotricity.co.uk/our-news/2018/the-carbon-footprint-of-getting-dressed
            </a>
            <p>
                Link - a pair of Levi 501 jeans will use 33.4kgCO2 eq
                Link- it’s estimated that the carbon footprint of a typical pair of running shoes made of synthetic materials is 14kgCO2 eq
                Link - according to the Carbon Trust, the estimated carbon footprint of a pure cotton shirt over it's lifetime, is 15kgCO2 eq
                Link - from cradle to grave will use 18kgCO2 eq
                Link – even the smallest item has an impact of 1.9kgCO2 eq

            </p>
        </div>
        <div class="more_content">
            <a href="https://co2.myclimate.org/en/car_calculators/new">
                https://co2.myclimate.org/en/car_calculators/new
                <br>
                (AVERAGE 20km CAR TRIP IS 7KG (7000g) CARBON)
            </a>
            <p>
                To wear this simple combo, you’re looking at a total of 76kgCO2 eq – that’s almost the equivalent of driving from London to Paris!
            </p>
        </div>
    </div>
</body>