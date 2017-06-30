<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Welcome Plaque HFRT1</title>
    <link rel="stylesheet" type="text/css" href="https://www.wisc-online.com/ARISE_Files/CSS/AriseMainCSS.css?random=Bd44fLAasdRdP">
    <style>
        #ariseSplashVideo {
            width: 100%;
        }

        #btnBegin {
            background: #fafafa;
            box-shadow: none;
            border-radius: 0;
            border-color: #dad6d3;
            border-width: 1px 0 0 0;
            color: #000;
            display:block;
            font-family: Helvetica Neue, Helvetica , Arial, sans-serif;
            font-size: 24px;
            font-weight: 200;
            margin: 0;
            position: absolute;
            bottom: -16px;
            right: -9px;
            text-align: right;
            width: 2000px;
            height: 60px;
        }

        .continueArrow {
            color: #106e9d;
            font-weight: bold;
        }

    </style>
</head>
<body class="ptntEducation" style="position:relative;">
<main>
    <video id = "ariseSplashVideo" autoplay loop>
        <source src="https://www.wisc-online.com/ARISE_Files/Images/00001b%20-%20ARISE%20Splash%20Screen%20600x700.mp4" type="video/mp4">
    </video>
    <button type="button" id="btnBegin">Continue <span class="continueArrow"> &rang; </span></button>
    <?php
    /*
     * This page is used for destroying a session when the user is inside
     * a simulation in order to use different Medication Reconciliation
     * forms at different levels.
     */

    // Initialize the session.
    // If you are using session_name("something"), don't forget it now!
    session_start();

    // Unset all of the session variables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
    ?>
</main>
<script type="text/javascript">
    var ARIS = {};

    ARIS.ready = function() {
        document.getElementById("btnBegin").onclick = function() {
            //var pulse_id = ARIS.cache.idForItemName('Pulse');
            //ARIS.setItemCount(pulse_id, 1);
            ARIS.exitToPlaque(137314);
        }
    }

</script>
</body>
</html>