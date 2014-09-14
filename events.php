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

$serverTime = time();
$filename = "index.html";
$lastModifiedTime = date ("F d Y H:i:s", filemtime($filename));

$cacheFile = "/var/www/lastModTime";

$contents = file_get_contents($cacheFile);
echo "Contents: " . $contents . " lastModifiedTime is " . $lastModifiedTime;

if (!empty($contents) && $lastModifiedTime > $contents)
    sendMsg($serverTime, 'time: ' . date("h:i:s", time()));

file_put_contents($cacheFile, $lastModifiedTime);
?>
