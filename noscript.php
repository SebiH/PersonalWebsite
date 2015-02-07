
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
        <title> Sebastian Hubenschmid | Personal website </title>


        <!-- Styles -->
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="css/sehub_noscript.css">
        <link rel="stylesheet" href="css/pure.css">
        <link rel="stylesheet" href="css/loadingbar.css">


        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
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

<?
$filename = $_GET['site'];

// load home if no site specified
if (empty($filename))
    $filename = "home";
?>

        <div id="javascript-notification">
            <h3> This site was built with AngularJS in mind </h3>
            <p> So please enable JavaScript? :) </p>
        </div>

        <div id="layout" class="active">
            <div id="menuTitle" class="noselect menu-link active">
                <p class="selectable logo-text"> Sebastian Hubenschmid </p>
            </div>
            <a id="menuLink" class="noselect menu-link active"> 
                <span></span> 
            </a>
            <div id="menu-container">
                <div id="menu" class="noselect active">

                    <!-- MAIN MENU -->
                    <div class="noselect pure-menu pure-menu-open" id="menu-content">
                        <a class="noselect pure-menu-heading" href="/">SSH</a>
                        <ul>
                            <li>
                            <a class="noselect menu-item-link <? if ($filename === "home") echo "pure-menu-selected" ?>" href="?site=home" > Home </a>
                            </li>
                            <li>
                                <a class="noselect menu-item-link <? if ($filename === "projects") echo "pure-menu-selected" ?>" href="?site=projects">Past Projects</a>
                            </li>
                            <li>
                                <a class="noselect menu-item-link <? if ($filename === "CV") echo "pure-menu-selected" ?>" href="?site=CV">CV</a>
                            </li>
                            <li>
                                <a class="noselect menu-item-link <? if ($filename === "aboutme") echo "pure-menu-selected" ?>" href="?site=aboutme">About me</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <!-- ICONS -->
               <div id="iconPanel" class="noselect active">
                    <div id="iconTable" class="noselect">
                    <div class='row'>
                        <a class='icon' href='https://www.facebook.com/SebastianHubenschmid' target='_blank'>
                            <p> <span class='fa fa-facebook icon'></span> </p>
                        </a>

                        <a class='icon' href='https://plus.google.com/+SebastianHubenschmid/' target='_blank'>
                            <p> <span class='fa fa-google-plus'></span> </p>
                        </a>

                        <a class='icon' href='https://twitter.com/Sebi__H' target='_blank'>
                            <p> <span class='fa fa-twitter'></span> </p>
                        </a>

                        <a class='icon' href='#contact'>
                            <p> <span class='fa fa-envelope'></span> </p>
                        </a>
                    </div>

                    <div class='row'>
                        <a class='icon' href='https://github.com/SebiH' target='_blank'>
                            <p> <span class='fa fa-github'></span> </p>
                        </a>

                        <a class='icon' href='http://stackoverflow.com/users/4090817/sebih' target='_blank'>
                            <p> <span class='fa fa-stack-overflow'></span> </p>
                        </a>

                        <a class='icon' href='https://www.linkedin.com/in/sebastianhubenschmid' target='_blank'>
                            <p> <span class='fa fa-linkedin'></span> </p>
                        </a>

                        <a class='icon' href='http://hci.uni-konstanz.de/index.php?a=staff&amp;b=Hubenschmid&amp;c=contact&amp;lang=en' target='_blank'>
                            <p> <span class='fa fa-flask'></span> </p>
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

