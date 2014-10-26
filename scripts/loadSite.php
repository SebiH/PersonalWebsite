<?php
$aResult = array();
$filename = $_POST['sitename'];

// load home if no site specified
if (empty($filename))
    $filename = "home";

// prevent searching outside of the content folder
$filename = str_replace(".", "", $filename);
$filename = str_replace("/", "", $filename);
$filename = str_replace("~", "", $filename);

$filepath = "../content/" . $filename;

if (file_exists($filepath . ".html"))
    $filepath .= ".html";
else if (file_exists($filepath . ".php"))
    $filepath .= ".php";
else
{
    $aResult['error'] = "<center><p>No such file</p><center>";
    echo json_encode($aResult);
    return;
}

$contentfile = fopen($filepath, "r");
$aResult['result'] = fread($contentfile, filesize($filepath));
fclose($contenfile);


echo json_encode($aResult);
?>
