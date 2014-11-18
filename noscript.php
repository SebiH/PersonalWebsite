
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
        
        <!-- Try to switch back to javascript version -->
        <script>
            window.location.replace("/");
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
            <center>
                <h3> Please consider turning on JavaScript! </h3>
            </center>
        </div>

        <div id="layout" class="active">
            <div id="menuTitle" class="noselect menu-link active">
                <p class="selectable logo-text">Sebastian Hubenschmid</a>
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
                            <a class="noselect menu-item-link" href="?site=home" > Home </a>
                        </li>
                        <!--<li>
                            <a class="menu-item-link" href="#friends" 
                                onclick="loadContent('friend');">Friends</a>
                            <ul>-->
                                <li><a class="noselect menu-item-link" href="?site=minecraft" >Minecraft</a></li>
                                <li><a class="noselect menu-item-link" href="?site=files" >Files</a></li>
                            <!--</ul>
                        </li>-->
                        <li>
                            <a class="noselect menu-item-link" href="?site=projects">Past Projects</a>
                        </li>
                        <li>
                            <a class="noselect menu-item-link" href="?site=CV">CV</a>
                        </li>
                        <li>
                            <a class="noselect menu-item-link" href="?site=aboutme">About me</a>
                        </li>
                    </ul>

                </div>
            </div>

            <!-- ICONS -->
           <div id="iconPanel" class="noselect active">
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

                        <a class="icon" href="?site=contact" >
                            <p> <i class="fa fa-envelope"></i> </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- MAIN CONTAINER -->
        <div id="contentcontainer0">
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
{
    echo "<center><h1>An error has occured =(</h1></center>";
    exit();
}

$contentfile = fopen($filepath, "r");
$content = fread($contentfile, filesize($filepath));
fclose($contenfile);

echo($content);

?>
            </main>
        </div>

    </body>
</html>

