<?php
if(!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>ARISE Pharmacy Home</title>
    <link rel="stylesheet" type="text/css" href="https://www.wisc-online.com/ARISE_Files/CSS/AriseMainCSS.css?random=pasadsdsds25235h">
    <style>
        button {
            float: none;
        }
        .shelf {
            background: rgba(221, 227, 69, .5);
        }

        #tabAF {
            position: absolute;
            top: 786px;
            left: 8px;
            width: 165px;
            height: 347px;
            -webkit-clip-path:polygon(0 31px, 91px 31px, 165px 0px, 165px 269px, 91px 347px, 0px 347px);
            clip-path: polygon(0 31px, 91px 31px, 165px 0px, 165px 269px, 91px 347px, 0px 347px);
        }

        #tabGL {

            position: absolute;
            top: 497px;
            left: 8px;
            width: 165px;
            height: 318px;
            -webkit-clip-path:polygon(0 0, 91px 0, 165px 29px, 165px 287px, 91px 318px, 0px 318px);
            /*        clip-path: polygon(0 31px, 91px 31px, 165px 0px, 165px 269px, 91px 347px, 0px 347px);*/
        }
    </style>
</head>
<body id="body">

<img src="https://www.wisc-online.com/ARISE_Files/PharmTechCustomization/Pharmacy-Floorplan.png" width="100%">
<a href="https://www.wisc-online.com/ARISE_Files/Experimental/Hot%20Spot/Pharm_Tech/PharmTechShelfHotSpotCust_dev.php?random=sdlfksdfj" class="shelf" id="tabAF">&nbsp;</a>
<a href="https://www.wisc-online.com/ARISE_Files/Experimental/Hot%20Spot/Pharm_Tech/PharmTechShelfHotSpotCust_dev2.php?random=lsasdfkdjf" class="shelf" id="tabGL">&nbsp;</a>
<button class="submit" id="clear">Clear Cookie</button>
<button class="submit" id="verify">Verify Selections</button>
</body>
<script src="https://www.wisc-online.com/ARISE_Files/Experimental/js.cookie.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<script type="text/javascript">
    var ARIS = {};
    var shelves = document.querySelectorAll(".shelf");

    for (var i = 0; i < shelves.length; i++) {

        shelves[i].addEventListener("click", function() {
            this.style.background = "rgba(69, 183, 224, .5)";
        }, false);

    }

//    var verify = document.querySelector('#verify');
    ARIS.ready = function() {
        document.getElementById('verify').onclick = function (e) {

            e.preventDefault();

            var list = [];
            list = <?php echo json_encode($_SESSION['savedDrugs']); ?>;
            console.log(list);

            var test = false;
            console.log(list.a2fTabs);
            console.log(list.g2lTabs);

            if (list.a2fTabs == true && list.g2lTabs == true) {
                test = true;
            }

            console.log(test);


            if (test) {

                $confirmationPopOver = $('<div></div>');
                $('#body').append($confirmationPopOver);
                $confirmationPopOver.text("The ARISE Pharmacist has verified your order is correct. You will be progress automatically in a moment.");
                $confirmationPopOver.width(625).height(125).css({
                    backgroundColor: "white",
                    position: "absolute",
                    left: "170px",
                    top: "525px",
                    fontSize: "38px",
                    padding: "20px"
                }).hide().fadeIn(1500).delay(2000).fadeOut(3000, function() {

                    var passed = ARIS.cache.idForItemName('passed');
                    ARIS.setItemCount(passed, 1);
                    ARIS.exit();

                });


            } else {

                $incorrectPopOver = $('<div></div>');
                $('#body').append($incorrectPopOver);
                $incorrectPopOver.text("One or more of your selections was incorrect, please try again.");
                $incorrectPopOver.width(625).height(125).css({
                    backgroundColor: "white",
                    position: "absolute",
                    left: "170px",
                    top: "525px",
                    fontSize: "38px",
                    padding: "20px"
                }).hide().fadeIn(1500).delay(2000).fadeOut(3000);

            }


        };
    }

</script>
</html>