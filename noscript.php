<?php
$filename = $_GET['site']; 

// load home if no site specified
if (empty($filename))
    $filename = "home";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">

        <meta name="description" content="CompScience student and Software Developer">
        <meta name="keywords" content="personal website, hubenschmid">
        <meta name="author" content="Sebastian Hubenschmid">


        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
        <title> Sebastian Hubenschmid | Personal website </title>


        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link type="text/css" rel="stylesheet" href="css/sehub.css">

        <!-- Noscript styles -->
        <style>

        #menu {
            z-index: 5;
        }
        </style>

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <!-- http://fortawesome.github.io/Font-Awesome/icons/ -->
        <!-- not loading in FF :( <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
        
        <!-- Try to switch back to javascript version -->
        <script>
            var currentUrl = window.location.href;
            var regex = /.*?\/.*?site=(.*)/;
            var jsUrl = currentUrl.replace(regex, "$1");
            if (!(regex.test(currentUrl)))
                jsUrl = "";
            window.location.replace("/#/" + jsUrl);
        </script>

    </head>

    <body>

    <div id="layout">
        <div id="javascript-notification">
            <h3> Please enable JavaScript! </h3>
            <p> This site was built with AngularJS in mind </p>
        </div> 

        <!-- Menubar -->
        <div id="navbar" class="transition">
            <!-- Menu items -->
            <div id="menu">
                <a href="/noscript.php" class="nav-header noselect transition">
                    Sebastian Hubenschmid
                </a>

                <a href="?site=home" class="nav-item noselect transition <?php if($filename === "home") echo 'nav-item-selected'; ?>">
                    Home
                </a>

                <a href="?site=projects" class="nav-item noselect transition <?php if($filename === "projects") echo 'nav-item-selected'; ?>">
                    Projects
                </a>

                <a href="?site=CV" class="nav-item noselect transition <?php if($filename === "CV") echo 'nav-item-selected'; ?>">
                    CV
                </a>

                <a href="?site=aboutme" class="nav-item noselect transition <?php if($filename === "aboutme") echo 'nav-item-selected'; ?>">
                    About me
                </a>

                <div id="iconPanel" class="noselect" ondragstart="return false;" ondrop="return false;">
                    <div id="iconTable" class="noselect">
                        <div>
                            <a class="icon transition" href="https://www.facebook.com/SebastianHubenschmid" target="_blank">
                                <p> <span class="fa fa-facebook icon"></span> </p>
                            </a>

                            <a class="icon transition" href="https://plus.google.com/+SebastianHubenschmid/" target="_blank">
                                <p> <span class="fa fa-google-plus"></span> </p>
                            </a>

                            <a class="icon transition" href="https://twitter.com/Sebi__H" target="_blank">
                                <p> <span class="fa fa-twitter"></span> </p>
                            </a>
                            <a class="icon transition <?php if ($filename === "contact") echo'nav-item-selected'; ?>" href="?site=contact">
                                <p> <span class="fa fa-envelope"></span> </p>
                            </a>

                        <div>
                            <a class="icon transition" href="https://github.com/SebiH" target="_blank">
                                <p> <span class="fa fa-github"></span> </p>
                            </a>

                            <a class="icon transition" href="http://stackoverflow.com/users/4090817/sebih" target="_blank">
                                <p> <span class="fa fa-stack-overflow"></span></p>
                            </a>

                            <a class="icon transition" href="https://www.linkedin.com/in/sebastianhubenschmid" target="_blank">
                                <p> <span class="fa fa-linkedin"></span> </p>
                            </a>

                            <a class="icon transition" href="http://hci.uni-konstanz.de/index.php?a=staff&amp;b=Hubenschmid&amp;c=contact&amp;lang=en" target="_blank">
                                <p> <span class="fa fa-flask"></span> </p>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MAIN CONTAINER -->
        <div id="contentcontainer">
            <main>
<?php


// prevent searching outside of the content folder
$filename = str_replace(".", "", $filename);
$filename = str_replace("/", "", $filename);
$filename = str_replace("~", "", $filename);

$filepath = "content/" . $filename;

if (file_exists($filepath . ".html"))
    $filepath .= ".html";
else if (file_exists($filepath . ".php"))
    $filepath .= ".php";
else
    echo "Not found?";

$contentfile = fopen($filepath, "r");

if ($contentfile === null) {
    echo "<div class=\"hcenter\"><h1>An error has occured =(</h1></div>";
}
else
{
    $content = fread($contentfile, filesize($filepath));
    fclose($contentfile);

    echo($content);
}

?>
            </main>
        </div>

    </body>
</html>

