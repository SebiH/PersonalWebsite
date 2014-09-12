<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico">
        <title> Sebastian Hubenschmid | Error" </title>

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="../css/pure.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

        <style>
            .floatmiddle {
                height: 200px;
                width: 800px;

                position: fixed;
                top: 50%;
                left: 50%;
                margin-top: -100px;
                margin-left: -400px;
            }

            body {
                background-color: #222222;
                background: -moz-radial-gradient(center 45deg, circle closest-corner, #222222 0%, #333333 100%);
                background: -webkit-gradient(radial, center center, 500, center center, 2000, from(#222222), to(#2A2A2A));
            }

        </style>

    </head>

    <body class="homepage">
        <nav id="nav" class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul class="menu-list">
            <li class="pure-menu-selected">
                <a class="menu-item-link" href="http://www.sehub.de">Home</a>
            </li>
            <!-- TODO: links don't work yet -->
            <li class="pure-menu-selected">
                <a class="menu-item-link" href="http://www.sehub.de/#projects">Past Projects</a>
            </li>
            <li class="pure-menu-selected">
                <a class="menu-item-link" href="http://www.sehub.de/#aboutme">About me</a>
            </li>
        </ul>
        </nav>

        <div class="floatmiddle">
            <p style="font-family=Lato, sans-serif;">
            <font size="42">
                Error!
                <?php 
                switch($_SERVER["REDIRECT_STATUS"]){
                    case 400:
                        $title = "400 Bad Request";
                        $description = "The request can not be processed due to bad syntax";
                        break;

                    case 401:
                        $title = "401 Unauthorized";
                        $description = "The request has failed authentication";
                        break;

                    case 403:
                        $title = "403 Forbidden";
                        $description = "The server refuses to response to the request";
                        break;

                    case 404:
                        $title = "404 Not Found";
                        $description = "The resource requested can not be found.";
                        break;

                    case 500:
                        $title = "500 Internal Server Error";
                        $description = "There was an error which doesn't fit any other error message";
                        break;

                    case 502:
                        $title = "502 Bad Gateway";
                        $description = "The server was acting as a proxy and received a bad request.";
                        break;

                    case 504:
                        $title = "504 Gateway Timeout";
                        $description = "The server was acting as a proxy and the request timed out.";
                        break;
                }

                echo " " . $error . "</font> <font size=\"22\">" . $description;
                ?>
            </font>
            </p>
        </div>
    </body>

</html>
