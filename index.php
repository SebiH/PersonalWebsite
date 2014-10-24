<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
        <title> Sebastian Hubenschmid | Personal website </title>

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="css/pure.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    </head>

    <body >

        <!-- MAIN MENU -->
<div id="layout">
<a href="#menu" id="menuLink" class="menu-link">
    <span></span>
</a>
<div id="menu">
<div class="pure-menu pure-menu-open">
    <a class="pure-menu-heading" href="/">SSH</a>
            <ul>
                <li>
                <a class="menu-item-link" href="#home"
                    onclick="loadContent('home');">
                    Home
                </a>
                </li>
                <li>
                <a class="menu-item-link" href="#projects" 
                    onclick="loadContent('projects');">Past Projects</a>
                </li>
<?php
// only display minecraft on the main server, not on the github page
// because content and access to minecraft server is only on main server
if (strpos($_SERVER['SERVER_NAME'], 'sehub') !== false) {
    echo "
        <li>
        <a class=\"menu-item-link\" href=\"#minecraft\" 
        onclick=\"loadContent('minecraft');\">Minecraft</a>
        </li> ";
}
?>
                <li>
                <a class="menu-item-link" href="#aboutme"
                    onclick="loadContent('aboutme')">About me</a>
                </li>
            </ul>
</div>
</div>

        <!-- MAIN CONTAINER -->

        <div id="contentcontainer" class="floatmiddle">
            <p class="header"> Work in progress </p>
            <!-- TODO -->
            <!-- <p> If not, go to <a href="/content/noscript"> this site </a> for a javascript-free version of this site. </p> -->
        </div>


        <!-- ICONS -->

        <div id="iconcontainer">
        <ul id="iconlist">
            <li>
            <a href="http://www.github.com/SebiH">
                <img class="cf icon bottom" src="/img/github_active.png"/>
                <img class="cf icon top" src ="/img/github_inactive.png"/>
            </a>
            </li>
            <li>
            <a href="https://www.google.com/+SebastianHubenschmid">
                <img class="cf icon bottom" src="/img/googleplus_active.png"/>
                <img class="cf icon top" src ="/img/googleplus_inactive.png"/>
            </a>
            </li>
            <li>
            <a href="https://de.linkedin.com/in/sebastianhubenschmid">
                <img class="cf icon bottom" src="/img/linkedin_active.png"/>
                <img class="cf icon top" src ="/img/linkedin_inactive.png"/>
            </a>
            </li>
            <li>
            <a href="http://www.facebook.com/SebastianHubenschmid">
                <img class="cf icon bottom" src="/img/facebook_active.png"/>
                <img class="cf icon top" src ="/img/facebook_inactive.png"/>
            </a>
            </li>

        </ul>
        </div>
</div>
    <script src="js/pure.js"></script>
    </body>
</html>

