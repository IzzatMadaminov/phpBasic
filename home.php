<?php
include_once('dbFunction.php');
if($_POST['welcome']){
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}
if(!($_SESSION)){
    header("Location:index.php");
}
?>
<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - BBBootstrap</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <style>body {
            width: 100%;
            height: 100%;
            background: #B71C1C
        }</style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>$(document).ready(function(){

            var count_particles, stats, update;
            stats = new Stats;
            stats.setMode(0);
            stats.domElement.style.position = 'absolute';
            stats.domElement.style.left = '0px';
            stats.domElement.style.top = '0px';
            document.body.appendChild(stats.domElement);
            count_particles = document.querySelector('.js-count-particles');
            update = function() {
                stats.begin();
                stats.end();
                if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                    count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
                }
                requestAnimationFrame(update);
            };
            requestAnimationFrame(update);


        });</script>
</head>
<body oncontextmenu='return false' class='snippet-body'>
<div id="particles-js">
    <form name="login" method="post" action="">
        <div class="row justify-content-md-center">
            <div class="col-md6">
                <br><br><br>
                <h3>Siz tizimga kirdingiz!</h3>
                <p class="card-title"><?=$_SESSION['username']?></p>
                <p class="card-text"><?=$_SESSION['email']?></p>
                <input class="btn bnt-primary" type="submit" name="welcome" value="Logout" />
            </div>
        </div>
    </form>
</div>
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1561436720/particles.js"></script>
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1561436735/app.js"></script>
</body>
</html>