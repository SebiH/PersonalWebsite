<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache'); // recommended to prevent caching of event data.

/**
 * Constructs the SSE data format and flushes that data to the client.
 *
 * @param string $id Timestamp/id of this connection.
 * @param string $msg Line of text that should be transmitted.
 */
function sendMsg($id, $msg) {
  echo "id: $id" . PHP_EOL;
  echo "data: $msg" . PHP_EOL;
  echo "retry: 20" . PHP_EOL;
  echo PHP_EOL;
  ob_flush();
  flush();
}

// Report all PHP errors
error_reporting(-1);

// retrieve latest logged change
$cacheFile = "/var/www/lastModTime";
$lastLoggedModTime = file_get_contents($cacheFile);

$lastModifiedTime = $lastLoggedModTime;

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("."));
foreach($objects as $filename => $object){
    $fileModTime = date ("F d Y H:i:s", filemtime($filename));

    // get the most rectent file
    if ($fileModTime > $lastModifiedTime)
        $lastModifiedTime = date ("F d Y H:i:s", filemtime($filename));
}
//$filename = "index.html";

if (!empty($lastLoggedModTime) && $lastModifiedTime > $lastLoggedModTime)
    sendMsg(1, 'Doesnt matter what is sent here');

// log for next lookup
file_put_contents($cacheFile, $lastModifiedTime);
?>
