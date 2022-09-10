<?php

function html_pageHeader(){
    echo"<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Infrastruktur Team E</title>
        <link rel='icon' type='image/x-icon' href='./images/logo.png'>
        <link rel='stylesheet' type='text/css' href='./styles.css' />
        <script type='text/javascript' src='javaScript.js'> </script>
    </head>
    <body>
    <header class='header'>
        <div class='header-brand-wrapper'>
            <a class='header-brand' href='index.php'> <img src='./images/logo.png' alt='logo' id='logo'> </a>
        </div>
        <nav class='header-navbar'>
            <ul class='header-navbar-links'>
                <!--<li><a href='index.php'>STARTSEITE</a></li>
                <li><a>ÜBER UNS</a></li>
                <li><a>LEISTUNGEN</a></li>
                <li><a>PREISE</a></li>
                <li><a>REFERENZEN</a></li>
                <li><a>IMPRESSUM</a></li>
                <li><a href='mitarbeiterLogin.php'>login</a></li>-->
            </ul>
        </nav>
</header>";
}
function html_intern_pageHeader(){
    echo"<!DOCTYPE html>
<html class='intern'>
    <head>
        <meta charset='utf-8'>
        <title>Infrastruktur Team E</title>
        <link rel='icon' type='image/x-icon' href='./images/logo.png'>
        <link rel='stylesheet' type='text/css' href='./styles.css' />
        <script type='text/javascript' src='javaScript.js'> </script>
    </head>
    <body>
    <header class='header'>
        <div class='header-brand-wrapper'>
            <a class='header-brand' href='chat.php'> <img src='./images/logo.png' alt='logo' id='logo'> </a>
        </div>
        <nav class='header-navbar'>
            <ul class='header-navbar-links'>
                <!--<li><a href='dashboard.php'>DASHBOARD</a></li>
                <a href='kundenDatenbank.php'><li>KUNDEN</li></a>
                <a href='sprachmittlerDatenbank.php'><li>MITTLER</li></a>
                <a href='./testprototyp/osm.html'><li>KARTE</li></a>-->
                <a href='index.php'><li>logout</li></a>
            </ul>
        </nav>
</header>";
}

function html_footer(){
    include("db_connection.php");
    $conn = return_db_connection();
    echo"<footer class='footer'>
            <div class='container'>
                <p style='text-align:center;color:white;font-size:10px'>Made by: Team E in 2022<br>Module: Infrastruktur<br>University of Applied Sciences Bremerhaven</p>
            </div>
        </footer>    
    </body>
</html>";
}
?>


