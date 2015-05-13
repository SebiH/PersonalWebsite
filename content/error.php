<style scoped>
    .error-mainheader {
        font-size: 1000%;
        line-height: 0.2;
    }

    .error-subheader {
        font-size: 200%;
        line-height: 0;
    }

    .error-comment {
        padding-left: 12em;
    }
</style>


<div class="centeredcontainer">
    <div class="centered">
        <h1 class="error-mainheader"> Error =( </h1>
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

default:
    $title = "How did you get here?";
    $description = "This page is supposed to catch errors =(";
    break;
}

echo "<h2 class=\"error-subheader\">" . $title . "</h2> <p class=\"error-comment\">" . $description . "</p>";
?>
    </div>
</div>
