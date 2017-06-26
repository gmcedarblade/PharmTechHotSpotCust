<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Tablets: A-F Page</title>
    <link rel="stylesheet" type="text/css" href="https://www.wisc-online.com/ARISE_Files/CSS/AriseMainCSS.css?random=pasadsdsds25235h">
</head>
<style>
    button {
        float: none;
    }
</style>
<body style="text-align: center;" id="body">
<p style="text-align: center;">Tap on the drugs you wish to select and when done selecting click "Add" to add to order</p>
<img src="https://www.wisc-online.com/ARISE_Files/Experimental/Hot%20Spot/Pharm_Tech/Pharmacy-Shelves-Example.png" width="100%" class="map" usemap="#features" id="drugShelfImage">
<map name="features" id="map">
    <area id="drug0" name="Flonase" shape="rect" coords="0,0,241,281">
    <area id="drug1" name="Aspirin" shape="rect" coords="241,0,482,281">
    <area id="drug2" name="Zyrtec" shape="rect" coords="482,0,723,281">
    <area id="drug3" name="Metropolol" shape="rect" coords="723,0,964,281">
    <area id="drug4" name="Claritin" shape="rect" coords="0,281,241,562">
    <area id="drug5" name="Albuterol" shape="rect" coords="241,281,482,562">
    <area id="drug6" name="Advair" shape="rect" coords="482,281,723,562">
    <area id="drug7" name="Peroxide" shape="rect" coords="723,281,964,562">
    <area id="drug8" name="Morphine" shape="rect" coords="0,562,241,843">
    <area id="drug9" name="Xanax" shape="rect" coords="241,562,482,843">
    <area id="drug10" name="Test1" shape="rect" coords="482,562,723,843">
    <area id="drug11" name="Test2" shape="rect" coords="723,562,964,843">
    <area id="drug12" name="Test3" shape="rect" coords="0,843,241,1124">
    <area id="drug13"  name="Test4" shape="rect" coords="241,843,482,1124">
    <area id="drug14" name="Test5" shape="rect" coords="482,843,723,1124">
    <area id="drug15" name="Test6" shape="rect" coords="723,843,964,1124">
</map>
<div style="height: 20px;">
    <button class="submit" id="clear">Clear Selections</button>
    <button type="button" class="submit" id="add" name="Add" value="Add">Add</button>
    <button class="submit" id="home">Home</button>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.wisc-online.com/ARISE_Files/JS/fastClickJS.js"></script>
<script type="text/javascript">

    var body = document.querySelector('#body');
    var map = document.querySelector('#map');

    var clearButton = document.querySelector('#clear');
    var addButton = document.querySelector('#add');

    var shelf = document.querySelector('#drugShelfImage');
    var shelfOffSetTop = shelf.offsetTop;

    const DRUG_WIDTH = shelf.width/4;
    const DRUG_HEIGHT = shelf.height/4;
    const COMMA = ',';

    var backgroundOff = true;

    for(var i = 0; i < 16; i++) {

        var drug = document.querySelector('#drug' + i)

        drug.addEventListener('click', function(e){

            e.preventDefault();

            if (backgroundOff) {

                if (this.id === 'drug0' || this.id === 'drug1' || this.id === 'drug2' || this.id === 'drug3'){

                    var coords = this.getAttribute('coords');
                    var coordSplit = coords.split(COMMA);
                    const ROW_ONE_X = coordSplit[0];
                    const ROW_ONE_Y = coordSplit[1] + shelfOffSetTop;

                    addOverlay(this.id, ROW_ONE_X, ROW_ONE_Y, DRUG_WIDTH, DRUG_HEIGHT);

                } else if (this.id === 'drug4' || this.id === 'drug5' || this.id === 'drug6' || this.id === 'drug7') {

                    var coords = this.getAttribute('coords');
                    var coordSplit = coords.split(COMMA);

                    const ROW_TWO_X = coordSplit[0];
                    const ROW_TWO_Y = DRUG_HEIGHT + shelfOffSetTop;

                    addOverlay(this.id, ROW_TWO_X, ROW_TWO_Y, DRUG_WIDTH, DRUG_HEIGHT);

                } else if (this.id === 'drug8' || this.id === 'drug9' || this.id === 'drug10' || this.id === 'drug11') {

                    var coords = this.getAttribute('coords');
                    var coordSplit = coords.split(COMMA);

                    const ROW_THREE_X = coordSplit[0];
                    const ROW_THREE_Y = (DRUG_HEIGHT * 2) + shelfOffSetTop;

                    addOverlay(this.id, ROW_THREE_X, ROW_THREE_Y, DRUG_WIDTH, DRUG_HEIGHT);

                } else if (this.id === 'drug12' || this.id === 'drug13' || this.id === 'drug14' || this.id === 'drug15') {

                    var coords = this.getAttribute('coords');
                    var coordSplit = coords.split(COMMA);

                    const ROW_FOUR_X = coordSplit[0];
                    const ROW_FOUR_Y = (DRUG_HEIGHT * 3) + shelfOffSetTop;

                    addOverlay(this.id, ROW_FOUR_X, ROW_FOUR_Y, DRUG_WIDTH, DRUG_HEIGHT);
                }

            }

        }, false);

    }

    function addOverlay(drug, x, y, width, height) {

        var overlay = document.createElement('div');

        overlay.id = drug;

        overlay.style.backgroundColor = "rgba(0, 150, 0, .5)";
        overlay.style.position = "absolute";
        overlay.style.left = x + 'px';
        overlay.style.top = y + 'px';
        overlay.style.width = width + 'px';
        overlay.style.height = height + 'px';

        overlay.dataset.overlayOn = true;

        overlay.addEventListener('click', function(e){

            e.preventDefault();
            overlay.dataset.overlayon = false;
            map.removeChild(overlay);

        }, false);

        map.appendChild(overlay);

        var checkMark = document.createElement('div');

        checkMark.style.backgroundImage = 'url("https://www.wisc-online.com/ARISE_Files/Experimental/Hot%20Spot/Pharm_Tech/check-mark_03.png")';
        checkMark.style.backgroundRepeat = 'no-repeat';
        checkMark.style.float = 'right';
        checkMark.style.width = 57 + 'px';
        checkMark.style.height = 50 + 'px';

        overlay.appendChild(checkMark);

    }

    clearButton.addEventListener('click', function(e) {
        e.preventDefault();
        var list = map.querySelectorAll('[data-overlay-on="true"]');
        for(var i = 0; i < list.length; i++){
            map.removeChild(list[i]);
        }
        backgroundOff = true;

    }, false);

    addButton.addEventListener('click', function(e){

        e.preventDefault();
        var results = [];
        var activeList = map.querySelectorAll('[data-overlay-on="true"]');

        var drugList = {drug0:"Aspirin",
            drug1:"Flonase",
            drug2:"Zytrec",
            drug3:"Metropolol",
            drug4:"Claritin",
            drug5:"Albuterol",
            drug6:"Advair",
            drug7:"Peroxide",
            drug8:"Morphine",
            drug9:"Xanax",
            drug10:"Test1",
            drug11:"Test2",
            drug12:"Test3",
            drug13:"Test4",
            drug14:"Test5",
            drug15:"Test6"};

        for(var i = 0; i < activeList.length; i++) {

            if(drugList.hasOwnProperty('' + activeList[i].id)) {

                if(activeList[i].id == "drug0") {
                    results.push(drugList.drug0);
                } else if (activeList[i].id == "drug1") {
                    results.push(drugList.drug1);
                } else if (activeList[i].id == "drug2") {
                    results.push(drugList.drug2);
                } else if (activeList[i].id == "drug3") {
                    results.push(drugList.drug3);
                } else if (activeList[i].id == "drug4") {
                    results.push(drugList.drug4);
                } else if (activeList[i].id == "drug5") {
                    results.push(drugList.drug5);
                } else if (activeList[i].id == "drug6") {
                    results.push(drugList.drug6);
                } else if (activeList[i].id == "drug7") {
                    results.push(drugList.drug7);
                } else if (activeList[i].id == "drug8") {
                    results.push(drugList.drug8);
                } else if (activeList[i].id == "drug9") {
                    results.push(drugList.drug9);
                } else if (activeList[i].id == "drug10") {
                    results.push(drugList.drug10);
                } else if (activeList[i].id == "drug11") {
                    results.push(drugList.drug11);
                } else if (activeList[i].id == "drug12") {
                    results.push(drugList.drug12);
                } else if (activeList[i].id == "drug13") {
                    results.push(drugList.drug13);
                } else if (activeList[i].id == "drug14") {
                    results.push(drugList.drug14);
                } else if (activeList[i].id == "drug15") {
                    results.push(drugList.drug15);
                }

            }

        }

        var mData = JSON.stringify(results);

        $.ajax({
//            url: "http://localhost:63342/PharmTechHotSpotCust/PharmTechShelfHotSpotCust_dev.php",
            type: "GET",
            data: {myData: mData},
            success: function (mData) {
                console.log("it worked" + mData);

                $confirmationPopOver = $('<div></div>');
                $('#map').append($confirmationPopOver);
                $confirmationPopOver.text("You have added the selected medications to the order.");
                $confirmationPopOver.width(625).height(80).css({
                    backgroundColor: "white",
                    position: "absolute",
                    left: "170px",
                    top: "525px",
                    fontSize: "38px",
                    padding: "20px"
                }).hide().fadeIn(1500).delay(2000).fadeOut(3000);


            },
            error: function (e) {
                console.log("Error: " + e.message);

            }

        });

    }, false);

//    alert(JSON.parse(sessionStorage.getItem('drugs')));

</script>
<?php

if(isset($_SESSION['savedDrugs'])) {
    //echo $_SESSION['savedDrugs'];
}
if(isset($_GET['myData'])) {
    $_SESSION['savedDrugs'] = $_GET['myData'];
    echo var_dump($_SESSION['savedDrugs']);
}
?>
<script type="text/javascript">
    var ARIS = {};
    ARIS.ready = function() {

        document.getElementById("home").onclick = function(){
            ARIS.exitToWebpage(137228);
        };

    }
</script>
</html>