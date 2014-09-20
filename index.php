<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
        <title> Sebastian Hubenschmid | Personal website </title>

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="css/pure.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

        <noscript>
            <meta HTTP-EQUIV="REFRESH" content="0; url=http://www.sehub.de/content/noscript.html"> 
        </noscript>

        <!-- TODO REMOVE -->
<script>
var source = new EventSource('events.php');
source.onmessage = function(e) {
    location.reload();
};
</script>
<script type="text/javascript">
function loadContent(href)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "/content/" + href, false);
    xmlhttp.send();
    var element = document.getElementById("contentcontainer");
    element.innerHTML = xmlhttp.responseText;
}

function getAnchor()
{
    var anchor = window.location.hash;
    // to prevent tomfoolery
    anchor = anchor.replace(/\W/g, "").substring(0, 10);
    return anchor;
}

function loadContentFromAnchor()
{
    var anchor = getAnchor();
    if (anchor == "")
        loadContent("home.html");
    // TODO differentiate between PHP and HTML content
    //else
    //    loadContent(anchor);
}
</script>
    </head>

    <body onload="loadContentFromAnchor();">
        <main>

        <!-- MAIN MENU -->

        <div id="navigation" class="menu pure-menu pure-menu-open pure-menu-vertical">
            <ul class="menu-list">
                <li class="pure-menu-selected">
                <a class="menu-item-link" href="#home"
                    onclick="loadContent('home.html');">Home</a>
                </li>
                <li class="pure-menu-selected">
                <a class="menu-item-link" href="#projects" 
                    onclick="loadContent('projects.html');">Past Projects</a>
                </li>
<?php
// only display minecraft on the main server, not on the github page
// because content and access to minecraft server is only on main server
if (strpos($_SERVER['SERVER_NAME'], 'sehub') !== false) {
    echo "
        <li class=\"pure-menu-selected\">
        <a class=\"menu-item-link\" href=\"#minecraft\" 
        onclick=\"loadContent('minecraft.php');\">Minecraft</a>
        </li> ";
}
?>
                <li class="pure-menu-selected">
                <a class="menu-item-link" href="#aboutme"
                    onclick="loadContent('aboutme.html')">About me</a>
                </li>
            </ul>
        </div>


        <!-- MAIN CONTAINER -->

        <div id="contentcontainer" class="floatmiddle">
            <p class="header"> Loading... </p>
            <!-- TODO -->
            <!-- <p> If not, go to <a href="/content/noscript.html"> this site </a> for a javascript-free version of this site. </p> -->
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
        </main>
    </body>
</html>

