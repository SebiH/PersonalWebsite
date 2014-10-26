<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
        <title> Sebastian Hubenschmid | Personal website </title>

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="css/sehub.css">
        <link rel="stylesheet" href="css/dropzone.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type='text/javascript' src='js/sehub.js'></script>
        <script> loadContentFromAnchor(); </script>

    </head>

    <body>

        <div id="layout" class="active">
            <div id="menuTitle" class="menu-link active">
                <p class="logo-text">Sebastian Hubenschmid</a>
            </div>
            <a href="#menu" id="menuLink" class="menu-link active"> 
                <span></span> 
            </a>
        <div id="menu-container">
            <div id="menu" class="active">

                <!-- MAIN MENU -->
                <div class="pure-menu pure-menu-open" id="menu-content" ondragstart="return false">
                    <a class="pure-menu-heading" href="/">SSH</a>
                    <ul>
                        <li>
                            <a class="menu-item-link" href="#home"
                                onclick="loadContent('home');"> Home </a>
                        </li>
                        <!--<li>
                            <a class="menu-item-link" href="#friends" 
                                onclick="loadContent('friend');">Friends</a>
                            <ul>-->
                                <li><a class="menu-item-link" href="#minecraft" onclick="loadContent('minecraft');">Minecraft</a></li>
                                <li><a class="menu-item-link" href="#files" onclick="loadContent('files');">Files</a></li>
                            <!--</ul>
                        </li>-->
                        <li>
                            <a class="menu-item-link" href="#projects" 
                                onclick="loadContent('projects');">Past Projects</a>
                        </li>
                        <li>
                            <a class="menu-item-link" href="#publications"
                                onclick="loadContent('publications')">Publications</a>
                        </li>
                        <li>
                        <a class="menu-item-link" href="#CV"
                            onclick="loadContent('CV')">CV</a>
                        </li>
                        <li>
                        <a class="menu-item-link" href="#aboutme"
                            onclick="loadContent('aboutme')">About me</a>
                        </li>
                    </ul>

                </div>

                <!-- ICONS -->
               <!-- TODO <div id="icons"></div> -->

            </div>
        </div>

        <!-- MAIN CONTAINER -->
        <div id="contentcontainer">
        </div>


            <div id="iconcontainer" class="content">
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
                    <li>
                    <a href="https://twitter.com/Sebi__H">
                        <img class="cf icon bottom" src="/img/twitter_active.png"/>
                        <img class="cf icon top" src ="/img/twitter_inactive.png"/>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
        <script src="js/pure.js"></script>
        <script type='text/javascript' src='js/lilithplugin.js'></script>
        <script type='text/javascript' src='js/lilithmain.js'></script>
    </body>
</html>

