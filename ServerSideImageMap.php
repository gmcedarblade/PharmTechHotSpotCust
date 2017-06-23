<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Anterior Lungs HotSpot Plaque</title>
    <link rel="stylesheet" type="text/css" href="https://www.wisc-online.com/ARISE_Files/CSS/AriseMainCSS.css?random=pasadsdsds25235h">
</head>
<body>
<a href="PharmTechHotSpotCust_dev.php">
<img src="https://www.wisc-online.com/ARISE_Files/Images/Asthma_EMT_P_Files/00499-Anterior-Lung-Sounds.jpg" width="100%" class="map" ismap="ismap" >
</a>
<?php

 $_POST['img']

?>
<!--<map name="features">-->
<!--    <area id="anterior2" shape="rect" coords="240,250,360,355" data-maphilight='{"alwaysOn":false}'>-->
<!--    <area id="anterior3" shape="rect" coords="525,250,405,355" data-maphilight='{"alwaysOn":false}'>-->
<!--    <area id="anterior6" shape="rect" coords="205,550,340,415" data-maphilight='{"alwaysOn":false}'>-->
<!--    <area id="anterior7" shape="rect" coords="575,550,445,415" data-maphilight='{"alwaysOn":false}'>-->
<!--</map>-->
<audio class="lungAudio" id="sound1" controls preload="none" style="display: none">
    <source src="https://www.wisc-online.com/ARISE_Files/Audio_Files/EMT_Paramedic_Files/00334_Normal.mp3" type="audio/mpeg">
</audio>
<button class="submit" id="clear">Clear</button>
<button class="submit" id="add">Add</button>
<p style="text-align: center;">Tap on anatomical location(s) to listen to lung sounds</p>
</body>
<script type="text/javascript" src="http://www.ariseproject.com/customizations/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="http://www.ariseproject.com/customizations/js/jquery.maphilight.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-touch-events/1.0.9/jquery.mobile-events.js"></script>
<script type="text/javascript">

    //    var audioFile = document.getElementById('sound1');

    //    function playAudio(){
    //        if(audioFile.duration > 0 && !audioFile.paused) {
    //            audioFile.pause();
    //            audioFile.currentTime = 0;
    //            audioFile.play();
    //        } else {
    //            audioFile.play();
    //        }
    //    }

    $('.map').maphilight({
        fillColor: '579dce',
        strokeColor: '2c6197',
        neverOn: true
    });

    $("#anterior2").on('tap', function(e) {
        //e.preventDefault();

        $('#anterior2').data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');

    });

    $("#anterior3").on("tap", function(e) {

        e.preventDefault();

        $('#anterior3').data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');

    });

    $("#anterior6").mousedown(function(e) {

        e.preventDefault();
        $('#anterior6').data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');

    });

    $("#anterior7").mousedown(function(e) {

        e.preventDefault();
        $('#anterior7').data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');

    });



    $('#clear').click(function (e) {

        e.preventDefault();
        $('#anterior2,  #anterior3, #anterior6, #anterior7').data('maphilight', {alwaysOn: false}).trigger('alwaysOn.maphilight');

    });

    $('#add').click(function (e) {

        e.preventDefault();
        console.log($('#anterior2').data('maphilight'));
        console.log($('#anterior3').data('maphilight'));
        console.log($('#anterior6').data('maphilight'));
        console.log($('#anterior7').data('maphilight'));




    });

</script>
</html>