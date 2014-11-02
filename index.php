<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
        <title> Sebastian Hubenschmid | Personal website </title>


        <!-- Styles -->
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="css/sehub.css">
        <link rel="stylesheet" href="css/pure.css">
        <link rel="stylesheet" href="css/dropzone.css">
        <link rel="stylesheet" href="css/loadingbar.css">


        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- http://fortawesome.github.io/Font-Awesome/icons/ -->
        <!-- not loading in FF :( <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">

        <!-- Scripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type='text/javascript' src='js/sehub.js'></script>
        <script> loadContentFromAnchor(); </script>

    </head>

    <body>

        <div id="layout" class="active">
            <div id="menuTitle" class="noselect menu-link active">
                <p class="selectable logo-text">Sebastian Hubenschmid</a>
            </div>
            <a href="#menu" id="menuLink" class="noselect menu-link active"> 
                <span></span> 
            </a>
        <div id="menu-container">
            <div id="menu" class="noselect active">

                <!-- MAIN MENU -->
                <div class="noselect pure-menu pure-menu-open" id="menu-content" ondragstart="return false">
                    <a class="noselect pure-menu-heading" href="/">SSH</a>
                    <ul>
                        <li>
                            <a class="noselect menu-item-link" href="#home"
                                onclick="loadContent('home');"> Home </a>
                        </li>
                        <!--<li>
                            <a class="menu-item-link" href="#friends" 
                                onclick="loadContent('friend');">Friends</a>
                            <ul>-->
                                <li><a class="noselect menu-item-link" href="#minecraft" onclick="loadContent('minecraft');">Minecraft</a></li>
                                <li><a class="noselect menu-item-link" href="#files" onclick="loadContent('files');">Files</a></li>
                            <!--</ul>
                        </li>-->
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
            </div>

            <!-- ICONS -->
           <div id="iconPanel" class="noselect active" ondragstart="return false;" ondrop="return false;">
                <div id="iconTable" class="noselect">
                    <div class="row">
                        <a class="icon" href="https://www.facebook.com/SebastianHubenschmid" target="_blank">
                            <p> <i class="fa fa-facebook icon"></i> </p>
                        </a>

                        <a class="icon" href="https://plus.google.com/+SebastianHubenschmid/" target="_blank">
                            <p> <i class="fa fa-google-plus"></i> </p>
                        </a>

                        <a class="icon" href="https://twitter.com/Sebi__H" target="_blank">
                            <p> <i class="fa fa-twitter"></i> </p>
                        </a>
                    </div>

                    <div class="row">

                        <a class="icon" href="https://github.com/SebiH" target="_blank">
                            <p> <i class="fa fa-github"></i> </p>
                        </a>

                        <a class="icon" href="https://www.linkedin.com/in/sebastianhubenschmid" target="_blank">
                            <p> <i class="fa fa-linkedin"></i> </p>
                        </a>

                        <a class="icon" href="#contact" onclick="loadContent('contact');">
                            <p> <i class="fa fa-envelope"></i> </p>
                        </a>
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
            <div class='loadinganimation'>
              <div class='circle'>
                <div class='inner'></div>
              </div>
              <div class='circle'>
                <div class='inner'></div>
              </div>
              <div class='circle'>
                <div class='inner'></div>
              </div>
              <div class='circle'>
                <div class='inner'></div>
              </div>
              <div class='circle-alt'>
                <div class='inner'></div>
              </div>
            </div>
            <p> Loading ... </p>
        </div>

        <script src="js/pure.js"></script>
        <script type='text/javascript' src='js/lilithplugin.js'></script>
        <script type='text/javascript' src='js/lilithmain.js'></script>
    </body>
</html>

