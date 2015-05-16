<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">

        <meta name="description" content="CompScience Student and Software Developer">
        <meta name="keywords" content="personal website, hubenschmid">
        <meta name="author" content="Sebastian Hubenschmid">


        <link rel="shortcut icon" type="image/ico" href="/img/favicon.ico">
        <title> Sebastian Hubenschmid | Personal website </title>


        <!-- Styles -->
        {{ assets.outputCss('css') }}
        <link type="text/css" rel="stylesheet" href="/libs/pure/pure-min.css">

        <!-- Fonts -->
        <link type="text/css" rel="stylesheet" media="all" href="/libs/open-sans-fontface/open-sans.css">
        <link type="text/css" rel="stylesheet" media="all" href="/libs/font-awesome/css/font-awesome.min.css">

        <noscript>
            <style>
                [data-ng-cloak], .show-noscript {
                    display: initial !important;
                }

                .nav-header.show-noscript {
                    display: block !important;
                }

                .nav-item.show-noscript {
                    display: block !important;
                }

                .icon.show-noscript {
                    display: table-cell !important;
                }


                .hide-noscript {
                    display: none !important;
                }
            </style>
        </noscript>
    </head>

    <body data-ng-app="SeHub" data-ng-controller="NavigationController" data-ng-cloak>

        <div class="layout">

            <!-- Menubar -->
            <div class="navbar transition" data-ng-class="{'navbar-hidden': !showMenu}">
                <!-- Menu items -->
                <div class="menu">
                    <div class="burgerwrapper noselect hide-noscript" data-ng-click="toggleMenu()" data-ng-class="{spin180: showMenu, spin360: !showMenu }" data-ng-if="burgerVisible" data-ng-cloak>
                        <div class="hamburger" data-ng-class="{spin: showMenu}">
                            <span></span>
                        </div>
                    </div>

                    <a href="/home" class="nav-header noselect show-noscript">Sebastian Hubenschmid</a>
                    <a data-ui-sref="home" class="nav-header noselect transition hide-noscript">Sebastian Hubenschmid</a>

                    <a href="/home" class="nav-item noselect show-noscript {{ home_class }}"> Home </a>
                    <a data-ui-sref="home" class="nav-item noselect transition hide-noscript" data-ui-sref-active="nav-item-selected"> Home </a>

                    <a href="/projects" class="nav-item noselect show-noscript {{ projects_class }}"> Projects </a>
                    <a data-ui-sref="projects" class="nav-item noselect transition hide-noscript" data-ui-sref-active="nav-item-selected"> Projects </a>

                    <a href="/CV" class="nav-item noselect show-noscript {{ cv_class }}"> CV </a>
                    <a data-ui-sref="CV" class="nav-item noselect transition hide-noscript" data-ui-sref-active="nav-item-selected"> CV </a>

                    <a href="/aboutme" class="nav-item noselect show-noscript {{ aboutme_class }}"> About me </a>
                    <a data-ui-sref="aboutme" class="nav-item noselect transition hide-noscript" data-ui-sref-active="nav-item-selected"> About me </a>

                    <div class="icon-panel noselect" ondragstart="return false;" ondrop="return false;">
                        <div class="noselect">
                            <div>
                                <a class="icon transition" href="https://www.facebook.com/SebastianHubenschmid" target="_blank">
                                    <p> <span class="fa fa-facebook icon"></span> <span class="text"> Find me on Facebook </span> </p>
                                </a>

                                <a class="icon transition" href="https://plus.google.com/+SebastianHubenschmid/" target="_blank">
                                    <p> <span class="fa fa-google-plus"></span> <span class="text"> Find me on Google+ </span>  </p>
                                </a>

                                <a class="icon transition" href="https://twitter.com/Sebi__H" target="_blank">
                                        <p> <span class="fa fa-twitter"></span> <span class="text"> Find me on Twitter </span> </p>
                                </a>

                                <a class="icon show-noscript" href="/contact" data-ui-sref-active="nav-item-selected">
                                    <span class="fa fa-envelope"></span> <span class="text"> Send me a message </span>
                                </a>
                                <a class="icon transition hide-noscript" data-ui-sref="contact" data-ui-sref-active="nav-item-selected">
                                    <span class="fa fa-envelope"></span> <span class="text"> Send me a message </span>
                                </a>
                            </div>

                            <div>
                                <a class="icon transition" href="https://github.com/SebiH" target="_blank">
                                    <p> <span class="fa fa-github"></span> <span class="text"> View GitHub Profile </span> </p>
                                </a>

                                <a class="icon transition" href="http://stackoverflow.com/users/4090817/sebih" target="_blank">
                                    <p> <span class="fa fa-stack-overflow"></span> <span class="text"> View StackOverflow Profile </span></p>
                                </a>

                                <a class="icon transition" href="https://www.linkedin.com/in/sebastianhubenschmid" target="_blank">
                                    <p> <span class="fa fa-linkedin"></span> <span class="text"> View LinkedIn Profile </span></p>
                                </a>

                                <a class="icon transition" href="http://hci.uni-konstanz.de/index.php?a=staff&amp;b=Hubenschmid&amp;c=contact&amp;lang=en" target="_blank">
                                    <p> <span class="fa fa-flask"></span><span class="text"> Academics </span> </p>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Content -->
            <div class="content transition" data-ng-class="{'content-extended': !showMenu}">
                <div data-ui-view class="ng-anim-fade transition" style="width: 100%; height: 100%;">
                    {{ content() }}
                    {#
                    <div class="loading-container">
                        <div class="animation">
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
                        <div class="text">
                            <p> Loading ... </p>
                            <p class="show-noscript"> (You must have JavaScript enabled) </p>
                        </div>
                    </div>
                    #}
                </div>

            </div>

        </div>


        <div class="show-noscript noscript-warning">
            Please enable JavaScript, as some things on this site rely on AngularJS.
        </div>


        <!-- AngularJS -->
        <script src="/libs/angular/angular.min.js"></script>
        <script src="/libs/angular-animate/angular-animate.min.js"></script>

        <!-- UI-Router -->
        <script src="/libs/ui-router/release/angular-ui-router.min.js"></script>

        <!-- Custom app -->
        {{ assets.outputJs('js') }}

    </body>
</html>

