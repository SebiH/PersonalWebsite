<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
        <title> Sebastian Hubenschmid | Personal website </title>


        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link type="text/css" rel="stylesheet" href="css/sehub.css">
        <link type="text/css" rel="stylesheet" href="css/pure.css">
        <link type="text/css" rel="stylesheet" href="css/loadingbar.css">


        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <!-- http://fortawesome.github.io/Font-Awesome/icons/ -->
        <!-- not loading in FF :( <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">

        <!-- Scripts -->
        <script async type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script async  type="text/javascript" src="js/sehub.js"></script>

        <noscript>
            <meta http-equiv="refresh" content="0; url=/noscript.php" />
        </noscript>

    </head>

    <body>

        <div id="layout" class="active">
            <!-- TODO: http://codepen.io/sc8696/pen/xbKeGW -->
            <div id="menuTitle" class="noselect menu-link active">
                <p class="selectable logo-text">Sebastian Hubenschmid </p>
            </div>
            <a href="#menu" id="menuLink" class="noselect menu-link active"> 
                <span></span> 
            </a>
            <div id="menu-container">
                <div id="menu" class="noselect active">

                    <!-- MAIN MENU -->
                    <nav id="mainmenu">
                    <div class="noselect pure-menu pure-menu-open" id="menu-content" ondragstart="return false">
                        <a class="noselect pure-menu-heading" href="/">SSH</a>
                        <ul>
                            <li>
                                <a class="noselect menu-item-link" href="#home"
                                    onclick="loadContent('home');"> Home </a>
                            </li>
                            <li>
                                <a class="noselect menu-item-link" href="#projects" 
                                    onclick="loadContent('projects');">Past Projects</a>
                            </li>
                            <li>
                                <a class="noselect menu-item-link" href="#CV"
                                    onclick="loadContent('CV')">CV</a>
                            </li>
                            <li>
                                <a class="noselect menu-item-link" href="#aboutme"
                                    onclick="loadContent('aboutme')">About me</a>
                            </li>
                        </ul>

                    </div>
                    </nav>
                </div>

                <!-- ICONS -->
               <div id="iconPanel" class="noselect active" ondragstart="return false;" ondrop="return false;">
                    <div id="iconTable" class="noselect">
                        <div class="row">
                            <a class="icon" href="https://www.facebook.com/SebastianHubenschmid" target="_blank">
                                <p> <span class="fa fa-facebook icon"></span> </p>
                            </a>

                            <a class="icon" href="https://plus.google.com/+SebastianHubenschmid/" target="_blank">
                                <p> <span class="fa fa-google-plus"></span> </p>
                            </a>

                            <a class="icon" href="https://twitter.com/Sebi__H" target="_blank">
                                <p> <span class="fa fa-twitter"></span> </p>
                            </a>

                            <a class="icon" href="#contact" onclick="loadContent('contact');">
                                <p> <span class="fa fa-envelope"></span> </p>
                            </a>
                        </div>

                        <div class="row">
                            <a class="icon" href="https://github.com/SebiH" target="_blank">
                                <p> <span class="fa fa-github"></span> </p>
                            </a>

                            <a class="icon" href="http://stackoverflow.com/users/4090817/sebih" target="_blank">
                                <p> <span class="fa fa-stack-overflow"></span> </p>
                            </a>

                            <a class="icon" href="https://www.linkedin.com/in/sebastianhubenschmid" target="_blank">
                                <p> <span class="fa fa-linkedin"></span> </p>
                            </a>

                            <a class="icon" href="http://hci.uni-konstanz.de/index.php?a=staff&amp;b=Hubenschmid&amp;c=contact&amp;lang=en" target="_blank">
                            <p> <span class="fa fa-flask"></span> </p>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MAIN CONTAINER -->
        <div id="contentcontainer0">
        </div>

        <!-- MAIN CONTAINER -->
        <div id="contentcontainer1">
        </div>

        <div id="loadingcontainer">
            <div class="loadinganimation">
              <div class="circle">
                <div class="inner"></div>
              </div>
              <div class="circle">
                <div class="inner"></div>
              </div>
              <div class="circle">
                <div class="inner"></div>
              </div>
              <div class="circle">
                <div class="inner"></div>
              </div>
              <div class="circle-alt">
                <div class="inner"></div>
              </div>
            </div>
            <p> Loading ... </p>
        </div>

        <script async type="text/javascript" src="js/pure.js"></script>
        <script async type="text/javascript" src="js/lilithplugin.js"></script>
        <script async type="text/javascript" src="js/lilithmain.js"></script>
    </body>
</html>

